<?php

namespace App\Controller;
use Src\Classes\ClassToken;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassRecursos;
use App\Model\ClassProvincias;
use App\Model\ClassConcessoes;
session_start();

class ControllerPainelAdmin extends ClassUsuarios {
    use \Src\Traits\TraitUrlParser;
    private $auth,
    $nome_mineral,
    $tipo_mineral,
    $cor_mineral;

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
            $Render      = new ClassRender();
            $concessoes  = new ClassConcessoes();
            $pro         = new ClassProvincias();
            $rec         = new ClassRecursos();

            $Render->setTitle(TITULO." | Painel Admin");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("painel-admin");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['usuarios'] = $this->listarUsuarios();
            $result['concessoes'] = $concessoes->listarConcessoes();
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['breadcrumb'] = [
                'Painel de Administrador'
            ];
            $result['active'   ] = [
                0 => 'painel-admin'
            ];
            $Render->renderLayout($result);
        }
    }

    public function recursos()
    {
        if(count($this->parserUrl()) > 1)
        {
            $rota        = func_get_args();
            $Render      = new ClassRender();
            $concessoes  = new ClassConcessoes();
            $pro         = new ClassProvincias();
            $rec         = new ClassRecursos();

            if(isset($_POST['submit_novo'])){
                if(isset($_POST['nome_mineral'])) {$this->nome_mineral = filter_input(INPUT_POST, 'nome_mineral', FILTER_SANITIZE_SPECIAL_CHARS);}
                if(isset($_POST['tipo_mineral'])) {$this->tipo_mineral = filter_input(INPUT_POST, 'tipo_mineral', FILTER_SANITIZE_SPECIAL_CHARS);}
                if(isset($_POST['cor_mineral' ])) {$this->cor_mineral  = filter_input(INPUT_POST, 'cor_mineral',  FILTER_SANITIZE_SPECIAL_CHARS);}
                $rec->registarRecurso(
                    $this->nome_mineral,
                    $this->tipo_mineral,
                    $this->cor_mineral
                );
                echo 'true';
                exit();
            }

            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessoes'] = $concessoes->listarConcessoes();
            $result['provincias'] = $pro->listarProvincias();
            $result['recursos'  ] = $rec->listarRecursos();
            
            $Render->setTitle(TITULO." | Painel Admin - Recursos");
            $Render->setDescription("Esse é o nosso website ".TITULO);
            $Render->setKeywords("");
            if(!isset($rota[1])){
                $Render->setDir("painel-admin-recursos");
                $result['breadcrumb'] = [
                    'Painel de Administrador',
                    'Recursos Minerais'
                ];
            }elseif(isset($rota[0]) && $rota[0] == 'edit') {
                $Render->setDir("painel-admin-recursos");
                $result['breadcrumb'] = [
                    'Painel de Administrador',
                    'Recursos Minerais',
                    'Editar Recurso'
                ];
                $result['exploracao'] = 'Explorando: '.base64_decode($rota[1]);
            }elseif(isset($rota[0]) && $rota[0] == 'delete') {
                $Render->setDir("painel-admin-recursos");
                $result['breadcrumb'] = [
                    'Painel de Administrador',
                    'Recursos Minerais',
                    'Editar Recurso'
                ];
            }else {
                header('location: '.DIRPAGE.'dashboard');
            }
            $result['active'] = [
                0 => 'painel-admin',
                1 => 'recursos'
            ];
            $Render->renderLayout($result);
            // var_dump($rota);
        }
    }
    public function usuarios()
    {
        if(count($this->parserUrl()) > 1)
        {
            $pro    = new ClassProvincias();
            $Render = new ClassRender();
            
            $Render->setTitle(TITULO." | Ver Usuarios");
            $Render->setDescription("Esse é o nosso site ",TITULO);
            $Render->setKeywords("");
            $Render->setDir("usuarios");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['usuarios'] = $this->listarUsuarios();
            $result['provincias'] = $pro->listarProvincias();
            $result['breadcrumb'] = [
                'Painel de Administrador',
                'Lista dos Usuários'
            ];
            $result['active'   ] = [
                0 => 'painel-admin',
                1 => 'usuarios'
            ];
            $Render->renderLayout($result);
        }
    }
}