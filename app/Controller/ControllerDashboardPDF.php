<?php

namespace App\Controller;
use Src\Classes\ClassToken;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassRecursos;
use App\Model\ClassProvincias;
use App\Model\ClassConcessoes;
session_start();

class ControllerDashboardPDF extends ClassUsuarios {
    use \Src\Traits\TraitUrlParser;
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
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $concessoes = new ClassConcessoes();
            $recursos   = new ClassRecursos();

            $Render->setTitle(TITULO." | Página Inicial");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("dashboardPDF");
            $result['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['provincias'] = $pro->listarProvincias();
            $result['concessoes'] = $concessoes->listarConcessoes();
            $result['recursos'] = $recursos->listarRecursos();
            $result['recursos'] = $recursos->listarRecursos();
            $result['breadcrumb'] = [
                'Dashboard'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'dashboard'
            ];
            $Render->renderLayout($result);
        }
    }

    public function provincia($nome)
    {
        if(count($this->parserUrl()) > 1)
        {
            $rota        = func_get_args();
            $Render      = new ClassRender();
            $concessoes  = new ClassConcessoes();
            $pro         = new ClassProvincias();
            $rec         = new ClassRecursos();

            $provincia   = base64_decode($nome);
            if(isset($rota[2])){$titulo_mineral  = base64_decode(func_get_args()[2]);}
            
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessoes'] = $concessoes->listarConcessoesPro($provincia);
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['proNome'   ] = $provincia;
            
            $Render->setTitle(TITULO." | Provincia ".$provincia);
            $Render->setDescription("Esse é o nosso website ".TITULO);
            $Render->setKeywords("");
            if(!isset($rota[1])){
                $Render->setDir("dashboard-provincia");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Província',
                    $provincia
                ];
            }elseif(isset($rota[1]) && $rota[1] == 'recurso') {
                if(isset($rota[2])){$recurso  = base64_decode(func_get_args()[2]);}
                $result['concessoes'] = $concessoes->listarConcessoesProRec($provincia, $recurso);
                $Render->setDir("dashboard-provincia-recurso");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Província',
                    $provincia,
                    'Exploção de '.$recurso
                ];
                $result['exploracao'] = 'Explorando: '.$recurso;
            }elseif(isset($rota[1]) && $rota[1] == 'titulo') {
                $result['concessoes'] = $concessoes->listarConcessoesProTM($provincia, $titulo_mineral);
                $Render->setDir("dashboard-provincia-titulo");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Província',
                    $provincia,
                    'Exploção com '.$titulo_mineral];
                $result['exploracao'] = $titulo_mineral;
            }else {
                header('location: '.DIRPAGE.'dashboard');
            }
            $result['active'] = [
                0 => 'dashboard',
                1 => $provincia
            ];
            $Render->renderLayout($result);
        }
    }

    public function recurso($nome)
    {
        if(count($this->parserUrl()) > 1)
        {
            $rota        = func_get_args();
            $Render      = new ClassRender();
            $concessoes  = new ClassConcessoes();
            $pro         = new ClassProvincias();
            $rec         = new ClassRecursos();

            $nome = base64_decode($nome);
            // var_dump($rota);
            
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessoes'] = $concessoes->listarConcessoesRec($nome);
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['proNome'] = $nome;
            
            $Render->setTitle(TITULO." | Provincia ".$nome);
            $Render->setDescription("Esse é o nosso website ".TITULO);
            $Render->setKeywords("");
            if(!isset($rota[1])){
                $Render->setDir("dashboard-recursos");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Recurso Mineral',
                    $nome
                ];
            }elseif(isset($rota[1]) && $rota[1] == 'provincia') {
                $Render->setDir("dashboard-recurso-provincia");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Recurso Mineral',
                    $nome,
                    'Exploção de '.base64_decode($rota[2])
                ];
                $result['exploracao'] = 'Explorando: '.base64_decode($rota[2]);
            }elseif(isset($rota[1]) && $rota[1] == 'titulo') {
                $Render->setDir("dashboard-provincia-titulo");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Província',
                    $nome,
                    'Exploção com '.base64_decode($rota[2])
                ];
                $result['exploracao'] = base64_decode($rota[2]);
            }else {
                header('location: '.DIRPAGE.'dashboard');
            }
            $result['active'] = [
                0 => 'dashboard',
                1 => $nome
            ];
            $Render->renderLayout($result);
            // var_dump($rota);
        }
    }

    public function titulo($nome)
    {
        if(count($this->parserUrl()) > 1)
        {
            $rota        = func_get_args();
            $Render      = new ClassRender();
            $concessoes  = new ClassConcessoes();
            $pro         = new ClassProvincias();
            $rec         = new ClassRecursos();

            $nome = base64_decode($nome);
            
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessoes'] = $concessoes->listarConcessoesLIKE($nome);
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['proNome'] = $nome;
            
            $Render->setTitle(TITULO." | Provincia ".$nome);
            $Render->setDescription("Esse é o nosso website ".TITULO);
            $Render->setKeywords("");
            if(!isset($rota[1])){
                $Render->setDir("dashboard-titulo");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Recurso Mineral',
                    $nome
                ];
            }elseif(isset($rota[1]) && $rota[1] == 'provincia') {
                $Render->setDir("dashboard-recurso-provincia");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Recurso Mineral',
                    $nome,
                    'Exploção de '.base64_decode($rota[2])
                ];
                $result['exploracao'] = 'Explorando: '.base64_decode($rota[2]);
            }elseif(isset($rota[1]) && $rota[1] == 'titulo') {
                $Render->setDir("dashboard-provincia-titulo");
                $result['breadcrumb'] = [
                    'Concessões',
                    'Província',
                    $nome,
                    'Exploção com '.base64_decode($rota[2])
                ];
                $result['exploracao'] = base64_decode($rota[2]);
            }else {
                header('location: '.DIRPAGE.'dashboard');
            }
            $result['active'] = [
                0 => 'dashboard',
                1 => $nome
            ];
            $Render->renderLayout($result);
            // var_dump($rota);
        }
    }

    public function search()
    {
        if(isset($_POST['search'])){
            $pesquisa = filter_var($_POST['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pesquisa = base64_encode($pesquisa);
            header('location: '.DIRPAGE.'dashboard/search/'.$pesquisa);
            exit();
        }
        if(count($this->parserUrl()) > 1)
        {
            $pesquisa = func_get_args()[0];
            $Render = new ClassRender();
            $minas  = new ClassConcessoes();
            $pro    = new ClassProvincias();

            $Render->setTitle(TITULO." | Ver Consseção");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("concessoes");
            
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessoes'] = $minas->listarConcessoesLIKE(base64_decode($pesquisa));
            $result['provincias'] = $pro->listarProvincias();
            $result['breadcrumb'] = [
                'Pesquisar Por:',
                base64_decode($pesquisa)
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'minas'
            ];
            $Render->renderLayout($result);
        }
    }
}