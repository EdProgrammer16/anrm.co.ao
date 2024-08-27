<?php

namespace App\Controller;
use Src\Classes\ClassRender;
use App\Model\ClassConcessoes;
use App\Model\ClassProvincias;
use App\Model\ClassRecursos;
use App\Model\ClassUsuarios;
use Src\Classes\ClassToken;
use Dompdf\Dompdf;
use Stringable;

use function PHPSTORM_META\type;

session_start();

class ControllerGerar  extends ClassUsuarios {
    use \Src\Traits\TraitUrlParser;
    private static $data;
    private $auth;
    public function __construct()
    {
        if(isset($_SESSION['ELToken'])){
            $token = new ClassToken();
            $cookie = $_SESSION['ELToken'];
            if($token->readToken( $cookie )['validation']){
                $this->auth = $token->readToken( $cookie )['values'];
            }else {
                $Render = new ClassRender();
                $Render->setTitle("Não Autenticado");
                $Render->setDescription("Esse é o nosso site de MVC");
                $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
                $Render->setDir("noAuth");
                $Render->renderLayout();
                exit();
            }
        }else {
            $Render = new ClassRender();
            $Render->setTitle("Não Autenticado");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("noAuth");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
        }
    }

    public function PDF(){

        $pro      = new ClassProvincias();
        $pesquisa =       func_get_args();
        $concessao = new ClassConcessoes();
        
        $params['concessao'] = $concessao->listarConcessaoID($pesquisa[1]);
        $params['provincias'] = $pro->listarProvincias();

        self::$data = $this->preparePDF($params);
        echo self::$data;
        echo '
            <div class="container">
                <div class="row">
                <div class="col-lg-2 col-md-3 col-auto m-auto py-5">
                        <a href="'.DIRPAGE.'concessoes/ver/'.$pesquisa[1].'" class="btn w-100 btn-outline-primary shadow-sm btn-lg rounded-5">Voltar ao Início</a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-auto m-auto py-5">
                        <a href="'.DIRPAGE.'gerar/downloadPDF/concessao/'.$pesquisa[1].'" class="btn w-100 bg-gradient-primary shadow-sm btn-lg rounded-5">Baixar Agora</a>
                    </div>
                </div>
            </div>
        ';
    }

    public function relatorio(){

        $pro    = new ClassProvincias();
        $concessoes = new ClassConcessoes();
        $recursos   = new ClassRecursos();
        $concessoes = new ClassConcessoes();

        $values = func_get_args();

        $params['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
        $params['provincias'] = $pro->listarProvincias();
        $params['recursos'] = $recursos->listarRecursos();
        $params['concessoes'] = [];

        if($values[0] == 'geral'){
          $params['concessoes'] = $concessoes->listarConcessoes();
          $params['area_total'] = 1246700;
        }else if($values[0] == 'provincia'){
          $provincia = base64_decode($values[1]);
          $params['concessoes'] = $concessoes->listarConcessoesPro($provincia);
          
          foreach( $params['provincias'] as $key )
          { if($key['pro_titulo'] == $provincia) 
              { $params['area_total'] = $key['pro_area'];break; } }
        }
        echo $this->prepareRelatorio($params);
        $url = $_GET['url'];
        $url = str_replace('gerar/relatorio', '', $url);

        echo '
            <div class="container">
                <div class="row">
                <div class="col-lg-2 col-md-3 col-auto m-auto py-5">
                        <a href="'.DIRPAGE.'dashboard" class="btn w-100 btn-outline-primary shadow-sm btn-lg rounded-5">Voltar ao Início</a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-auto m-auto py-5">
                        <a href="'.DIRPAGE.'gerar/downloadRelatorio'.$url.'" class="btn w-100 bg-gradient-primary shadow-sm btn-lg rounded-5">Baixar Agora</a>
                    </div>
                </div>
            </div>
        ';
    }

    public function downloadPDF(){
        $pesquisa = func_get_args();
        $concessoes = new ClassConcessoes();

        $params['concessao'] = $concessoes->listarConcessaoID($pesquisa[1]);
        self::$data = $this->preparePDF($params);
        // Instanciar e usar a classe dompdf
        $dompdf = new Dompdf(['enable_remote' => true]);
        // $dompdf = new Dompdf();
        // Instanciar o metodo loadHtml e enviar o conteudo do PDF
        $dompdf->loadHtml(self::$data);
        // $dompdf->loadHtmlFile('http://localhost/escolas_'.PROVINCIA.'_v2/gerarpdf', 'enable');
        // Configurar o tamanho e a orientacao do papel
        // landscape - Imprimir no formato paisagem
        //$dompdf->setPaper('A4', 'landscape');
        // portrait - Imprimir no formato retrato
        $dompdf->setPaper('A4', 'portrait'); //landscape
        // Renderizar o HTML como PDF
        $dompdf->render();
        // Gerar o PDF
        $dompdf->stream('concessao_da_'.$params['concessao'][0]['denominacao'].date(" - d_m_Y"));
        // header("Location: ".DIRPAGE."home");
    }

    public function downloadRelatorio(){

        $pro    = new ClassProvincias();
        $concessoes = new ClassConcessoes();
        $recursos   = new ClassRecursos();
        $concessoes = new ClassConcessoes();

        $values = func_get_args();

        $params['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
        $params['provincias'] = $pro->listarProvincias();
        $params['recursos'] = $recursos->listarRecursos();
        $params['concessoes'] = [];

        if($values[0] == 'geral'){
          $params['concessoes'] = $concessoes->listarConcessoes();
          $params['area_total'] = '1246700';
        }else if($values[0] == 'provincia'){
          $provincia = base64_decode($values[1]);
          $params['concessoes'] = $concessoes->listarConcessoesPro($provincia);
          
          foreach( $params['provincias'] as $key )
          { if($key['pro_titulo'] == $provincia) 
              { $params['area_total'] = $key['pro_area'];break; } }
        }

        self::$data = $this->prepareRelatorio($params);
        // Instanciar e usar a classe dompdf
        $dompdf = new Dompdf(['enable_remote' => true]);
        // $dompdf = new Dompdf();
        // Instanciar o metodo loadHtml e enviar o conteudo do PDF
        $dompdf->loadHtml(self::$data);
        // $dompdf->loadHtmlFile('http://localhost/escolas_'.PROVINCIA.'_v2/gerarpdf', 'enable');
        // Configurar o tamanho e a orientacao do papel
        // landscape - Imprimir no formato paisagem
        //$dompdf->setPaper('A4', 'landscape');
        // portrait - Imprimir no formato retrato
        $dompdf->setPaper('A4', 'portrait'); //landscape
        // Renderizar o HTML como PDF
        $dompdf->render();
        // Gerar o PDF
        $dompdf->stream('Relatorio_Geral'.date(" - d_m_Y"));
        // header("Location: ".DIRPAGE."home");
    }

    private function formatar_data($data) {
        if(strtotime($data) < 0){ return 'Indisponivel';}
        $meses = [
          'Janeiro',
          'Fevereiro',
          'Março',
          'Abril',
          'Maio',
          'Junho',
          'Julho',
          'Agosto',
          'Setembro',
          'Outubro',
          'Novembro',
          'Dezembro'
        ];
      
        $array_data = explode('-', $data);
        $ano        = $array_data[0];
        $mes        = $array_data[1];
        $dia        = $array_data[2];
      
        return $dia."/".$meses[$mes-1]."/".$ano;
      
    }

    protected function preparePDF($params){
        // HEADER
        self::$data = '
            <!DOCTYPE html>
            <html lang="pt">
            <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <link rel="apple-touch-icon" sizes="76x76" href="'.DIRIMG.'apple-icon.png">
            <link rel="icon" type="image/png" href="'.DIRIMG.'arnm1.png">
            <title>Concessão</title>
            <!--     Fonts and icons     -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
            <!-- Nucleo Icons -->
            <link href="'.DIRCSS.'nucleo-icons.css" rel="stylesheet" />
            <link href="'.DIRCSS.'nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <!-- Material Icons -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
            <!-- CSS Files -->
            <link id="pagestyle" href="'.DIRCSS.'material-dashboard.min.css" rel="stylesheet" />
            </head>
            <body class="">
        ';
        // BODY
        self::$data .= '
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 mx-auto mt-lg-0">
                        <div class="card shadow-none" id="basic-info">';
                        foreach($params['concessao'] as $key): 
                            self::$data .= '
                            <div class="card-header text-center">
                                <img src="'.DIRIMG.'arnm2.png" style="width: 120px;height: 90px" alt="main_logo">
                                <h3 class="" style="color: black!important;">Ficha de Concessão '.$key['denominacao'].'</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">
                                                    Processo N°
                                                </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['n_processo'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">
                                                    Data de Entrada Do Processo
                                                </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_entrada_processo']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">
                                                Denominação
                                                </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['denominacao'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">
                                                Representante Legal
                                                </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['representante_legal'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">NIF da Denominação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['nif_denominacao'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Criação da Denominação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_criacao_denominacao']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">E-mail da Denominação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['email'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Contacto</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['contacto'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Província</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['provincia'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Área Total Ocupada</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['area_ocupada'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">1° Socio</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['socio1'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">2° Socio</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['socio2'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Titúlo Mineral</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['titulo_mineral'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">N° De Titulo</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['n_mineral'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Emissão do Título</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_emissao_mineral']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Validade do Titulo</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_validade_mineral']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Código N°</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['codigo_n'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Emissão do Código</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_emissao_codigo']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data De Caducidade do Código</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_caducidade_codigo']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Estado do Projecto</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['estado_projecto'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Recursos Mineiro Solicitados</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['recursos_exploracao'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Inicio das Negociações</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_inicio_negociacoes']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Data de Rublica Dos Contratos</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$this->formatar_data($key['data_rubrica_contratos']).'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Caução</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['caucao'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Valor do Investimento</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['valor_investimento'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Postos de Trabalho Homens </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">Nacionais '.$key['homens_nacionais'].' / Estrangeiros '.$key['homens_estrangeiros'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Postos de Trabalho Mulheres </div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">Nacionais '.$key['mulheres_nacionais'].' / Estrangeiros '.$key['mulheres_estrangeiros'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Bónus - 1ª Prestação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['prestacao_1'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Bónus - 2ª Prestação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['prestacao_2'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Bónus - 3ª Prestação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['prestacao_3'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Bónus - 4ª Prestação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['prestacao_4'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Bónus - 5ª Prestação</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['prestacao_5'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 1° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_1'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 2° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_2'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 3° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_3'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 4° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_4'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 5° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_5'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 6° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_6'].'</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border w-50 px-3 py-1">
                                                <div class="mb-0 h6" style="font-size: .876rem">Pagamento de Taxa<br/>de Superficie - 7° Ano</div>
                                            </td>
                                            <td class="border px-3 py-1">
                                                <h6 class="mb-0 fw-normal" style="font-size: .876rem">'.$key['pagamento_taxa_superfice_7'].'</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            ';
                        endforeach;
                        self::$data .= '
                        </div>
                    </div>
                </div>
            </div>
        ';
        // FOOTER
        self::$data .= '
            <script src="'.DIRJS.'core/popper.min.js"></script>
            <script src="'.DIRJS.'core/bootstrap.min.js"></script>
            <script src="'.DIRJS.'plugins/perfect-scrollbar.min.js"></script>
            <script src="'.DIRJS.'plugins/smooth-scrollbar.min.js"></script>
            <script>
                var win = navigator.platform.indexOf("Win") > -1;
                if (win && document.querySelector("#sidenav-scrollbar")) {
                    var options = {
                    damping: "0.5"
                    }
                    Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
                }
            </script>
            <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="'.DIRJS.'material-dashboard.min.js"></script>
            </body>
        ';
        return self::$data;
    } 

    protected function prepareRelatorio($params){
        // HEADER
        self::$data = '
            <!DOCTYPE html>
            <html lang="pt">
            <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <link rel="apple-touch-icon" sizes="76x76" href="'.DIRIMG.'apple-icon.png">
            <link rel="icon" type="image/png" href="'.DIRIMG.'arnm1.png">
            <title>Relatório Geral</title>
            <!--     Fonts and icons     -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
            <!-- Nucleo Icons -->
            <link href="'.DIRCSS.'nucleo-icons.css" rel="stylesheet" />
            <link href="'.DIRCSS.'nucleo-svg.css" rel="stylesheet" />
            <!-- Font Awesome Icons -->
            <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
            <!-- Material Icons -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
            <!-- CSS Files -->
            <link id="pagestyle" href="'.DIRCSS.'material-dashboard.min.css" rel="stylesheet" />
            </head>
            <body class="">
        ';
        // BODY
        self::$data .= '
          <div class="container-fluid pr-3">
            <div class="row">
                <div class="col text-center">
                    <img src="'.DIRIMG.'arnm2.png" style="width: 120px;height: 90px" alt="main_logo">
                    <h3 class="" style="color: black!important;">RELATÓRIO ANRM</h3>
                </div>
            </div>
            
            <table class="table mt-5">
              <tbody>
                <tr>
                  <td class="pe-2">
                        <div class="card border rounded-2" >
                          <div class="card-body text-center py-2 px-3">
                            <h4 class="text-gradient text-primary">
                              <span id="status1" countto="'.count($params["concessoes"]).'">
                                '.count($params['concessoes']).'
                              </span>
                            </h4>
                            <h6 class="mb-0 font-weight-bolder text-xs text-uppercase">Total de Concessões</h6>
                          </div>
                        </div>
                  </td>
                  <td class="px-2">
                        <div class="card border rounded-2" >
                          <div class="card-body text-center py-2 px-3">';
                            $num_postos = 0;
                            
                            foreach($params['concessoes'] as $key){
                              $num_postos += $key['homens_nacionais'     ];
                              $num_postos += $key['homens_estrangeiros'  ];
                              $num_postos += $key['mulheres_nacionais'   ];
                              $num_postos += $key['mulheres_estrangeiros'];
                            }
                            self::$data .= '
                              <h4 class="text-gradient text-primary">
                                <span id="status2" countto="'. $num_postos.'">'. $num_postos.'</span>
                              </h4>
                              <h6 class="mb-0 font-weight-bolder text-xs text-uppercase">Postos de Trabalho</h6>
                          </div>
                        </div>
                  </td>
                  <td class="px-2">
                        <div class="card border rounded-2" >
                          <div class="card-body text-center py-2 px-3">';
                            $area_ocupada = 0;
                            foreach($params['concessoes'] as $key){
                              $key['area_ocupada'] =  explode(' ', $key['area_ocupada']);
                              $area_ocupada += intval($key['area_ocupada'][0]);
                            }
                              self::$data .= '
                                <h4 class="text-gradient text-primary">
                                  <span id="status3" countto="'.$area_ocupada.'">'.$area_ocupada.'</span> 
                                  <span class="text-lg">Km²</span>
                                </h4>
                                <h6 class="mb-0 font-weight-bolder text-xs text-uppercase">Área Total Ocupada</h6>
                          </div>
                        </div>
                  </td>';
                  if($params['area_total'] == 1246700):
                    $recursos = count($params['recursos']);
                  else:
                    $recursos = 0; 
                    foreach($params['recursos'] as $key):
                      $recurso = 0;
                      foreach($params['concessoes'] as $sub_key){
                        if (strpos($sub_key['recursos_exploracao'], $key['nome_mineral']) !== false) {
                          $recurso++;
                        }
                      }
                      if($recurso > 0):
                        $recursos++;
                      endif; 
                    endforeach;
                  endif;
                  self::$data .= '
                  <td class="ps-2">
                        <div class="card border rounded-2">
                          <div class="card-body text-center py-2 px-3">
                            <h4 class="text-gradient text-primary">
                              <span id="status4" countto="'.$recursos.'">
                                '.$recursos.'
                              </span>
                            </h4>
                            <h6 class="mb-0 font-weight-bolder text-xs text-uppercase">Recursos Mineiros<br/> Solicitados</h6>
                          </div>
                        </div>
                  </td>
                </tr>
              </tbody>
            </table>
            
            <div class="row">
              <div class="col">
                
              </div>
              <div class="col-auto text-center">
                
              </div>
            </div>
            
            <table class="table align-items-center mb-0 mt-5">
              <tbody>
                <tr class="text-uppercase">
                  <td>
                    <h5 class="text-md" style="color: black!important;">Províncias</h5>
                  </td>
                  <td>
                    <h5 class="text-md text-end" style="color: black!important;">N° Concessões</h5>
                  </td>
                </tr>';
                $a = 0;
                foreach($params['provincias'] as $key):
                  self::$data .= '
                  <tr class="border-bottom '.($a % 2 == 0 ? '' : 'bg-light').'">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">'.$key['pro_titulo'].'</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-end text-sm pe-3">';

                        $total_concessoes = 0;
                        foreach($params['concessoes'] as $sub_key){
                            if($key['pro_titulo'] == $sub_key['provincia']){
                              $total_concessoes++; 
                            }
                        }
                      self::$data .= '
                      <span class="font-weight-bold text-sm" style="color: black!important;">'.$total_concessoes.'</span>
                    </td>
                  </tr>';
                  $a++;
                endforeach;
                self::$data .= '
              </tbody>
            </table>

            <table class="table align-items-center mb-0 mt-7" style="overflow: hidden">
              <tbody>
                <tr class="text-uppercase">
                  <td>
                    <h5 class="text-md" style="color: black!important;">Recursos Explorados</h5>
                  </td>
                  <td>
                    <h5 class="text-md text-end" style="color: black!important;">N° Concessões</h5>
                  </td>
                </tr>';
                foreach($params['recursos'] as $key):
                  self::$data .= '
                  <tr class="border-bottom '.($a % 2 == 0 ? '' : 'bg-light').'">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">'.$key['nome_mineral'].'</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-end text-sm pe-3">
                      <span class="font-weight-bold text-sm" style="color: black!important;">';
                        $recursos = 0;
                        foreach($params['concessoes'] as $sub_key){
                          if (strpos($sub_key['recursos_exploracao'], $key['nome_mineral']) !== false) {
                            $recursos++;
                          }
                        }
                        self::$data .= $recursos;
                        self::$data .= '
                      </span>
                    </td>
                  </tr>';
                  $a++;
                endforeach;
                self::$data .= ' 
              </tbody>
            </table>

            <table class="table align-items-center mb-0 mt-7" style="overflow: hidden;">
              <tbody>
                <tr class="text-uppercase">
                  <td>
                    <h5 class="text-md" style="color: black!important;">Tipologia do Título Mineiro</h5>
                  </td>
                  <td>
                    <h5 class="text-md text-end" style="color: black!important;">N° Concessões</h5>
                  </td>
                </tr>
                <tr class="border-bottom">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Título de Exploração</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;">';

                        $titulo_mineral = 0;
                        foreach($params['concessoes'] as $sub_key){
                          if (strpos($sub_key['titulo_mineral'], 'Título de Exploração') !== false) {
                            $titulo_mineral++;
                          }
                        }
                        self::$data .= $titulo_mineral;
                        self::$data .= '
                    </span>
                  </td>
                </tr>
                <tr class="border-bottom bg-light">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Título de Prospecção</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;"> ';
                        $titulo_mineral = 0;
                        foreach($params['concessoes'] as $sub_key){
                          if (strpos($sub_key['titulo_mineral'], 'Título de Prospecção') !== false) {
                            $titulo_mineral++;
                          }
                        }
                        self::$data .= $titulo_mineral;
                        self::$data .= '
                    </span>
                  </td>
                </tr>
                <tr class="border-bottom">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Alvará Mineral de Exploração</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;">';
                        $titulo_mineral = 0;
                        foreach($params['concessoes'] as $sub_key){
                          if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Exploração') !== false) {
                            $titulo_mineral++;
                          }
                        }
                        self::$data .= $titulo_mineral;
                        self::$data .= '
                    </span>
                  </td>
                </tr>
                <tr class="border-bottom bg-light">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Alvará Mineral de Prospecção</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;">';

                        $titulo_mineral = 0;
                        foreach($params['concessoes'] as $sub_key){
                          if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Prospecção') !== false) {
                            $titulo_mineral++;
                          }
                        }
                        self::$data .= $titulo_mineral;
                      self::$data .= '
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="table align-items-center mb-0 mt-7" style="overflow: hidden;">
              <tbody>
                <tr class="text-uppercase">
                  <td>
                    <h5 class="text-md" style="color: black!important;">Área Total Ocupada</h5>
                  </td>
                </tr>
                <tr class="border-bottom">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Total</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;">';
                      $turn = 1;  
                      $new_area = '';
                      $area  = '';
                      $area_total = strval($params['area_total']);
                      for($i = strlen( $params['area_total'])-1; $i >= 0; $i--){
                        if($turn == 3){
                          $new_area .=  $area_total[$i].' ';
                          $turn = 1;
                        }else {
                          $new_area .=  $area_total[$i];
                          $turn++;
                        }
                      }
                      for($i = strlen($new_area)-1; $i >= 0; $i--){
                        $area .= $new_area[$i];
                      }
                      self::$data .= $area.' Km²</span>
                  </td>
                </tr>
                <tr class="border-bottom bg-light">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;">Ocupada pelas Concessões</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;"> ';
                        self::$data .= $area_ocupada.' Km²';
                        self::$data .= '
                    </span>
                  </td>
                </tr>
                <tr class="border-bottom">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-uppercase" style="color: black!important;"> Diferencial das áreas</h6>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-end text-sm pe-3">
                    <span class="font-weight-bold text-sm" style="color: black!important;">'; 
                    $num_dif = ($params['area_total'] - $area_ocupada); 
                    $str_dif = strval($num_dif);
                    $new_dif = '';
                    $dif     = '';
                    $turn = 1;
                    for($i = strlen($str_dif)-1; $i >= 0; $i--){
                      if($turn == 3){
                        $new_dif .= $str_dif[$i].' ';
                        $turn = 1;
                      }else {
                        $new_dif .= $str_dif[$i];
                        $turn++;
                      }
                    }
                    for($i = strlen($new_dif)-1; $i >= 0; $i--){
                      $dif .= $new_dif[$i];
                    }
                    self::$data .= $dif.' Km²';
                        self::$data .= '
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        ';
        // FOOTER
        self::$data .= '
          <!--   Core JS Files   -->
          <script src="'.DIRJS.'core/popper.min.js"></script>
          <script src="'.DIRJS.'core/bootstrap.min.js"></script>
          <script src="'.DIRJS.'plugins/perfect-scrollbar.min.js"></script>
          <script src="'.DIRJS.'plugins/smooth-scrollbar.min.js"></script>
          <script src="'.DIRJS.'plugins/choices.min.js"></script>
          <script src="'.DIRJS.'plugins/dragula/dragula.min.js"></script>
          <script src="'.DIRJS.'plugins/jkanban/jkanban.js"></script>
          <script src="'.DIRJS.'plugins/countup.min.js"></script>
          <script src="'.DIRJS.'plugins/chartjs.min.js"></script>
          <script>
              // Rounded slider
              const setValue = function(value, active) {
                document.querySelectorAll("round-slider").forEach(function(el) {
                  if (el.value === undefined) return;
                  el.value = value;
                });
                const span = document.querySelector("#value");
                span.innerHTML = value;
                if (active)
                  span.style.color = "red";
                else
                  span.style.color = "black";
              }
          
              document.querySelectorAll("round-slider").forEach(function(el) {
                el.addEventListener("value-changed", function(ev) {
                  if (ev.detail.value !== undefined)
                    setValue(ev.detail.value, false);
                  else if (ev.detail.low !== undefined)
                    setLow(ev.detail.low, false);
                  else if (ev.detail.high !== undefined)
                    setHigh(ev.detail.high, false);
                });
          
                el.addEventListener("value-changing", function(ev) {
                  if (ev.detail.value !== undefined)
                    setValue(ev.detail.value, true);
                  else if (ev.detail.low !== undefined)
                    setLow(ev.detail.low, true);
                  else if (ev.detail.high !== undefined)
                    setHigh(ev.detail.high, true);
                });
              });
          
              // Count To
              if (document.getElementById("status1")) {
                const countUp = new CountUp("status1", document.getElementById("status1").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
              if (document.getElementById("status2")) {
                const countUp = new CountUp("status2", document.getElementById("status2").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
              if (document.getElementById("status3")) {
                const countUp = new CountUp("status3", document.getElementById("status3").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
              if (document.getElementById("status4")) {
                const countUp = new CountUp("status4", document.getElementById("status4").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
              if (document.getElementById("status5")) {
                const countUp = new CountUp("status5", document.getElementById("status5").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
              if (document.getElementById("status6")) {
                const countUp = new CountUp("status6", document.getElementById("status6").getAttribute("countTo"));
                if (!countUp.error) {
                  countUp.start();
                } else {
                  console.error(countUp.error);
                }
              }
          </script>        
          <script async defer src="https://buttons.github.io/buttons.js"></script>
          <script src="'.DIRJS.'material-dashboard.min.js"></script>
          </body>
        ';
        return self::$data;
    } 
}