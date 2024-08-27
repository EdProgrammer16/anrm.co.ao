<?php

namespace App\Controller;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassProvincias;
use App\Model\ClassConcessoes;
use App\Model\ClassRecursos;
use Src\Classes\ClassToken;
session_start();

class ControllerNovo extends ClassUsuarios {
    use \Src\Traits\TraitUrlParser;
    private   $auth,
        $id,
        $n_processo,
        $data_entrada_processo,
        $denominacao,
        $representante_legal,
        $nif_denominacao,
        $data_criacao_denomicao,
        $email,
        $contacto,
        $provincia,
        $municipio,
        $area_ocupada,
        $socio1,
        $socio2,
        // =======================
        $titulo_mineral,
        $n_mineral,
        $data_emissao_mineral,
        $data_validade_mineral,
        $estado_projecto,
        $codigo_n,
        $data_emissao_codigo,
        $data_caducidade_codigo,
        $recursos_exploracao,
        // =======================
        $data_inicio_negociacoes,
        $data_rubrica_contratos,
        $caucao,
        $valor_investimento,
        $homens_nacionais,
        $homens_estrangeiros,
        $mulheres_nacionais,
        $mulheres_estrangeiros,
        // =======================
        $prestacao_1,
        $prestacao_2,
        $prestacao_3,
        $prestacao_4,
        $prestacao_5,
        // =======================
        $pagamento_taxa_superfice_1,
        $pagamento_taxa_superfice_2,
        $pagamento_taxa_superfice_3,
        $pagamento_taxa_superfice_4,
        $pagamento_taxa_superfice_5,
        $pagamento_taxa_superfice_6,
        $pagamento_taxa_superfice_7;
        


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
            $Render->setTitle(TITULO. " | Não Autenticado");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("noAuth");
            $Render->renderLayout();
            exit();
        }
        $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
        if($result['usuario'][0]['usuario_perm'] != 'admin'){
            $Render = new ClassRender();
            $Render->setTitle("Não Autorizado");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("noPerm");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();

            $Render->setTitle(TITULO." | Painel Admin");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("painel-admin");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $Render->renderLayout($result);
        }
    }

    protected function recValues() {
        if(isset($_POST['id'                    ])) {$this->id                     = $_POST['id'];}
        if(isset($_POST['n_processo'            ])) {$this->n_processo             = filter_input(INPUT_POST, 'n_processo'            , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_entrada_processo' ])) {$this->data_entrada_processo  = filter_input(INPUT_POST, 'data_entrada_processo' , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['denominacao'            ])) {$this->denominacao             = filter_input(INPUT_POST, 'denominacao'            , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['representante_legal'   ])) {$this->representante_legal    = filter_input(INPUT_POST, 'representante_legal'   , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['nif_denominacao'       ])) {$this->nif_denominacao        = filter_input(INPUT_POST, 'nif_denominacao'       , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_criacao_denomicao'])) {$this->data_criacao_denomicao = filter_input(INPUT_POST, 'data_criacao_denomicao', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['email'                 ])) {$this->email                  = filter_input(INPUT_POST, 'email'                 , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['contacto'              ])) {$this->contacto               = filter_input(INPUT_POST, 'contacto'              , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['provincia'             ])) {$this->provincia              = filter_input(INPUT_POST, 'provincia'             , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['municipio'             ])) {$this->municipio              = filter_input(INPUT_POST, 'municipio'             , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['area_ocupada'          ]) & $_POST['area_ocupada'] != '') {$this->area_ocupada           = filter_input(INPUT_POST, 'area_ocupada'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'area_ocupada_unidade'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['socio1'                ])) {$this->socio1                 = filter_input(INPUT_POST, 'socio1'                , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['socio2'                ])) {$this->socio2                 = filter_input(INPUT_POST, 'socio2'                , FILTER_SANITIZE_SPECIAL_CHARS);}
        // ================================================================================================================
        if(isset($_POST['titulo_mineral'        ])) {$this->titulo_mineral         = filter_input(INPUT_POST, 'titulo_mineral'        , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['n_mineral'             ])) {$this->n_mineral              = filter_input(INPUT_POST, 'n_mineral'             , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_emissao_mineral'  ])) {$this->data_emissao_mineral   = filter_input(INPUT_POST, 'data_emissao_mineral'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_validade_mineral' ])) {$this->data_validade_mineral  = filter_input(INPUT_POST, 'data_validade_mineral' , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['estado_projecto'       ])) {$this->estado_projecto        = filter_input(INPUT_POST, 'estado_projecto'       , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['codigo_n'              ])) {$this->codigo_n               = filter_input(INPUT_POST, 'codigo_n'              , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_emissao_codigo'   ])) {$this->data_emissao_codigo    = filter_input(INPUT_POST, 'data_emissao_codigo'   , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_caducidade_codigo'])) {$this->data_caducidade_codigo = filter_input(INPUT_POST, 'data_caducidade_codigo', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['recursos_exploracao'   ])) {$this->recursos_exploracao    = filter_input(INPUT_POST, 'recursos_exploracao'   , FILTER_SANITIZE_SPECIAL_CHARS);}
        // ================================================================================================================
        if(isset($_POST['data_inicio_negociacoes'])) {$this->data_inicio_negociacoes = filter_input(INPUT_POST, 'data_inicio_negociacoes', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['data_rubrica_contratos' ])) {$this->data_rubrica_contratos  = filter_input(INPUT_POST, 'data_rubrica_contratos' , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['caucao'                 ])) {$this->caucao                  = filter_input(INPUT_POST, 'caucao'                 , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'caucao_moeda'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['valor_investimento'     ])) {$this->valor_investimento      = filter_input(INPUT_POST, 'valor_investimento'     , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'valor_investimento_moeda'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['homens_nacionais'       ])) {$this->homens_nacionais        = filter_input(INPUT_POST, 'homens_nacionais'       , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['homens_estrangeiros'    ])) {$this->homens_estrangeiros     = filter_input(INPUT_POST, 'homens_estrangeiros'    , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['mulheres_nacionais'     ])) {$this->mulheres_nacionais      = filter_input(INPUT_POST, 'mulheres_nacionais'     , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['mulheres_estrangeiros'  ])) {$this->mulheres_estrangeiros   = filter_input(INPUT_POST, 'mulheres_estrangeiros'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        // ================================================================================================================
        if(isset($_POST['prestacao_1'            ]) & $_POST['prestacao_1'] != '') {$this->prestacao_1           = filter_input(INPUT_POST, 'prestacao_1'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'prestacaoMoeda_1'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['prestacao_2'            ]) & $_POST['prestacao_2'] != '') {$this->prestacao_2           = filter_input(INPUT_POST, 'prestacao_2'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'prestacaoMoeda_2'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['prestacao_3'            ]) & $_POST['prestacao_3'] != '') {$this->prestacao_3           = filter_input(INPUT_POST, 'prestacao_3'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'prestacaoMoeda_3'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['prestacao_4'            ]) & $_POST['prestacao_4'] != '') {$this->prestacao_4           = filter_input(INPUT_POST, 'prestacao_4'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'prestacaoMoeda_4'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['prestacao_5'            ]) & $_POST['prestacao_5'] != '') {$this->prestacao_5           = filter_input(INPUT_POST, 'prestacao_5'          , FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'prestacaoMoeda_5'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        // ================================================================================================================
        if(isset($_POST['pagamento_taxa_superfice_1']) & $_POST['pagamento_taxa_superfice_1'] != '') {$this->pagamento_taxa_superfice_1 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_1', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_1'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_2']) & $_POST['pagamento_taxa_superfice_2'] != '') {$this->pagamento_taxa_superfice_2 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_2', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_2'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_3']) & $_POST['pagamento_taxa_superfice_3'] != '') {$this->pagamento_taxa_superfice_3 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_3', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_3'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_4']) & $_POST['pagamento_taxa_superfice_4'] != '') {$this->pagamento_taxa_superfice_4 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_4', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_4'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_5']) & $_POST['pagamento_taxa_superfice_5'] != '') {$this->pagamento_taxa_superfice_5 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_5', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_5'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_6']) & $_POST['pagamento_taxa_superfice_6'] != '') {$this->pagamento_taxa_superfice_6 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_6', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_6'  , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['pagamento_taxa_superfice_7']) & $_POST['pagamento_taxa_superfice_7'] != '') {$this->pagamento_taxa_superfice_7 = filter_input(INPUT_POST, 'pagamento_taxa_superfice_7', FILTER_SANITIZE_SPECIAL_CHARS).' '.filter_input(INPUT_POST, 'pagamentoUnidade_7'  , FILTER_SANITIZE_SPECIAL_CHARS);}
    }

    public function addconcessao(){
        $this->recValues();
        if(isset($_POST)){
            // echo "<pre>";
            // var_dump($_POST);
            // echo '<br><br>';
            // echo $_POST['recursos_exploracao'];
            // echo $this->pagamento_taxa_superfice_1;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_2;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_3;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_4;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_5;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_6;echo '<br/>';
            // echo $this->pagamento_taxa_superfice_7;echo '<br/>';

            // echo "<br/><br/>ARQUIVOS<br/>";
            // var_dump($_FILES);

            $con = new ClassConcessoes();
            // mkdir(DIRARQ.'denominacao-'.$this->id);
            $res = $con->registroConcessao(
                $this->denominacao,
                $this->representante_legal, $this->provincia, $this->area_ocupada, $this->socio1, $this->socio2,
                $this->titulo_mineral, $this->n_mineral, $this->data_emissao_mineral, $this->data_validade_mineral, $this->estado_projecto,
                $this->codigo_n, $this->recursos_exploracao);
            if($res){
                header("location: ".DIRPAGE.'novo/concessao/success');
            }else {
                rmdir(DIRARQ.'denominacao-'.$this->id);
                header("location: ".DIRPAGE.'novo/concessao/error');
            }
            exit();
        }
    }

    public function addcsv(){
        // $this->recValues();
        $res = false;
        if(isset($_POST)){

            // echo "<br/><br/>ARQUIVOS<br/>";

            $arquivo = $_FILES['archive'];

            // Validar a extensão do arquivo 
            if ($arquivo['type'] == "text/csv") {

                $con = new ClassConcessoes();
                // Ler os dados do arquivo
                $dados_arquivo = fopen($arquivo['tmp_name'], "r");

                // Percorrer o array de dados do arquivo
                while($linha = fgetcsv($dados_arquivo, $arquivo['size'], ";")){
                    // echo "<br/>";
                    // Converter para utf-8 para imprimir corretamente os caracteres especiais
                    $linha = array_map('utf8_encode', $linha);

                    // Imprimir as informações de cada linha
                    // echo "DENOMINAÇÃO: " . ($linha[0] ?? null) . "<br>";
                    // echo "REPRESENTANTE LEGAL: " . ($linha[1] ?? null) . "<br>";
                    // echo "RECURSOS DE EXPLORAÇÃO: " . ($linha[2] ?? null) . "<br>";
                    // echo "PROVÍNCIA: " . ($linha[3] ?? null) . "<br>";
                    // echo "MUNICÍPIO: " . ($linha[4] ?? null) . "<br>";
                    // echo "TITULO MINERAL: " . ($linha[5] ?? null) . "<br>";
                    // echo "N° DO TITULO: " . ($linha[6] ?? null) . "<br>";
                    // echo "CÓDIGO N°: " . ($linha[7] ?? null) . "<br>";
                    // echo "ÁREA OCUPADA: " . ($linha[8] ?? null) . "<br>";
                    // echo "DATA DE EMISSÃO DO TITULO: " . ($linha[9] ?? null) . "<br>";
                    // echo "DATA DE CADUCIDADE DO TITULO: " . ($linha[10] ?? null) . "<br>";
                    
                    $this->denominacao =           ($linha[0] ?? null);
                    $this->representante_legal =   ($linha[1] ?? null);
                    $this->recursos_exploracao =   ($linha[2] ?? null); 
                    $this->provincia =             ($linha[3] ?? null);
                    $this->municipio =             ($linha[4] ?? null); 
                    $this->titulo_mineral =        ($linha[5] ?? null); 
                    $this->n_mineral =             ($linha[6] ?? null); 
                    $this->codigo_n =              ($linha[7] ?? null);
                    $this->area_ocupada =          ($linha[8] ?? null);
                    $this->data_emissao_mineral =  ($linha[9] ?? null); 
                    $this->data_validade_mineral = ($linha[10] ?? null);

                    $this->area_ocupada = $this->area_ocupada." Km²";

                    $this->data_emissao_mineral = date('Y-m-d', strtotime($this->data_emissao_mineral)); 
                    $this->data_validade_mineral = date('Y-m-d', strtotime( $this->data_validade_mineral));

                    // echo  $this->area_ocupada;
                    // echo "<br>";
                    // echo  $this->data_emissao_mineral;
                    // echo "<br>";
                    // echo  $this->data_validade_mineral;
                    // echo "<br>";
                    $res = $con->registroConcessao(
                        $this->denominacao,
                        $this->representante_legal,
                        $this->recursos_exploracao, 
                        $this->provincia,
                        $this->municipio, 
                        $this->titulo_mineral, 
                        $this->n_mineral, 
                        $this->codigo_n,
                        $this->area_ocupada, 
                        $this->data_emissao_mineral, 
                        $this->data_validade_mineral
                    );
                    // echo "<hr>";
                }
            } else {
                rmdir(DIRARQ.'denominacao-'.$this->id);
                header("location: ".DIRPAGE.'novo/csv/error');
            }
            // if($res) 
            //     {header("location: ".DIRPAGE.'novo/csv/success');}
            // else {
            //     rmdir(DIRARQ.'denominacao-'.$this->id);
            //     header("location: ".DIRPAGE.'novo/csv/error');
            // }
            header("location: ".DIRPAGE.'novo/csv/success');
            exit();
        }
    }

    public function csv(){
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $rec    = new ClassRecursos();

            $Render->setTitle(TITULO." | Nova Concessão");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("novo-csv");

            $result['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['breadcrumb'] = [
                'Painel de Administrador',
                'Novo',
                'Concessão Mineral'
            ];
            $result['active'   ] = [
                0 => 'painel-admin'
            ];
            $result['addConcessao'] = (isset(func_get_args()[0])) ? func_get_args()[0]: '';
            $Render->renderLayout($result);
        }
    }

    public function concessao()
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $rec    = new ClassRecursos();
            $Render->setTitle(TITULO." | Nova Concessão");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("novo-concessao");
            $result['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['breadcrumb'] = [
                'Painel de Administrador',
                'Novo',
                'Concessão Mineral'
            ];
            $result['active'   ] = [
                0 => 'painel-admin'
            ];
            $result['addConcessao'] = (isset(func_get_args()[0])) ? func_get_args()[0]: '';
            $Render->renderLayout($result);
        }
    }

    public function usuario()
    {
        if(count($this->parserUrl()) > 1)
        {
            if(isset($_POST['uSubmit'])){
                echo "<pre>";
                var_dump($_POST);
                $res = $this->addUsuario($_POST['uNome'], $_POST['uEmail'], $_POST['uBI'], strtolower($_POST['uPerm']), $_POST['uPass']);
                if(count($res) > 0){
                    header('location: '.DIRPAGE.'painel-admin/usuarios');
                }else {
                    header('location: '.DIRPAGE.'novo/error/usuario');
                }
                exit();

            }
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $Render->setTitle(TITULO." | Novo Usuário");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("novo-usuario");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['provincias'] = $pro->listarProvincias();
            $result['breadcrumb'] = [
                'Painel de Administrador',
                'Novo',
                'Usuário'
            ];
            $result['active'   ] = [
                0 => 'painel-admin',
                1 => 'novo'
            ];
            $Render->renderLayout($result);
        }
    }

    public function error($type)
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $Render->setTitle(TITULO. " | Erro Cadastro Concessão");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("error-mina");
            $Render->renderLayout();
            exit();
            $Render->renderLayout();
        }
    }

    private function uploadArquivo ( $arquivo, $pasta ) {
        if(isset($arquivo) && $arquivo['tmp_name'] != '')
        {
            if(mkdir($pasta)){
                $pasta .= '/';
                $nomeOriginal = explode('.', $arquivo["name"])[0];
                $nomeFinal = $nomeOriginal.date("_d_m_Y");
                $tipo = strrchr($arquivo["name"],".");
                $tamanho = $arquivo["size"];

                // for($i = 0; $i < count($tipos); $i++){if($tipos[$i] == $tipo){$arquivoPermitido=true;}}
                // if($arquivoPermitido==false){echo "Extensão de arquivo não permitido!!";exit;}

                if (move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeFinal.$tipo)){
                    // $this->nome=$pasta .$nomeFinal. $tipo;$this->tipo=$tipo;$this->tamanho=number_format($arquivo["size"]/1024, 2) . "KB";
                    return $nomeFinal.$tipo;
                }else{
                    return '';
                }
            }
        }else {
            return '';
        }
    }
}