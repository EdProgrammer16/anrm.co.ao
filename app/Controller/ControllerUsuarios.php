<?php

namespace App\Controller;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassProvincias;
use Src\Classes\ClassToken;
session_start();

class ControllerUsuarios extends ClassUsuarios {
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

            $Render->setTitle(TITULO." | Lista de Usuarios");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("usuarios");
            $result['usuario' ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['usuarios'] = $this->listarUsuarioS();
            
            $result['breadcrumb'] = [
                'Lista dos Usuários'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'painel-admin'
            ];
            $Render->renderLayout($result);
        }
    }
    public function ver($id)
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $Render->setTitle(TITULO." | Ver Usuário");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("ver-usuario");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['ver_usuario'] = $this->listarUsuarioID($id);
            $result['provincias'] = $pro->listarProvincias();
            $result['usuarioid'] = $id;
            $result['breadcrumb'] = [
                'Usuários',
                'Visualizar'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'painel-admin'
            ];
            $Render->renderLayout($result);
        }
    }
    public function edit($id)
    {
        $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
        $result['ver_usuario'] = $this->listarUsuarioID($id);

        if($result['usuario'][0]['usuario_perm'] != 'admin' or $result['usuario'][0]['usuario_perm'] == 'admin' && $result['usuario'][0]['usuario_perm'] == $result['ver_usuario'][0]['usuario_perm']){
            $Render = new ClassRender();
            $Render->setTitle("Não Autorizado");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("noPerm");
            $Render->renderLayout();
            exit();
        }
        if(isset($_POST['uSubmit'])){
            // echo '<pre>';
            // var_dump($_POST);
            $this->atualizarUsuario( $id, $_POST['uNome'], $_POST['uEmail'], $_POST['uBI'], $_POST['uPerm'] );
            header('location: '.DIRPAGE.'usuarios/edit/'.$id);
            exit();
        }
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $Render->setTitle(TITULO." | Ver Usuário");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("edit-usuario");
            $result['provincias'] = $pro->listarProvincias();
            $result['usuarioid'] = $id;
            $result['breadcrumb'] = [
                'Usuários',
                'Editar'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'painel-admin'
            ];
            $Render->renderLayout($result);
        }
    }

    public function password($id)
    {
        $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
        $result['ver_usuario'] = $this->listarUsuarioID($id);

        if($result['usuario'][0]['usuario_perm'] != 'admin' or $result['usuario'][0]['usuario_perm'] == 'admin' && $result['usuario'][0]['usuario_perm'] == $result['ver_usuario'][0]['usuario_perm']){
            $Render = new ClassRender();
            $Render->setTitle("Não Autorizado");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("noPerm");
            $Render->renderLayout();
            exit();
        }
        if(isset($_POST['uSubmit'])){
            echo '<pre>';
            var_dump($_POST);
            // $this->atualizarUsuario( $id, $_POST['uNome'], $_POST['uEmail'], $_POST['uBI'], $_POST['uPerm'] );
            // header('location: '.DIRPAGE.'usuarios/edit/'.$id);
            exit();
        }
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $pro    = new ClassProvincias();
            $Render->setTitle(TITULO." | Ver Usuário");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("alter-password");
            $result['provincias'] = $pro->listarProvincias();
            $result['usuarioid' ] = $id;
            $result['breadcrumb'] = [
                'Usuários',
                'Alter Password'
            ];
            $result['active'   ] = [
                0 => 'dashboard',
                1 => 'painel-admin'
            ];
            $Render->renderLayout($result);
        }
    }

    public function delete($id)
    {
        if(count($this->parserUrl()) > 1)
        {
           
            $result['usuario'    ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['del_usuario'] = $this->listarUsuarioID($id);
            if($result['usuario'][0]['usuario_perm'] != 'admin' && $result['del_usuario'][0]['usuario_perm'] == 'admin'){
                $Render = new ClassRender();
                $Render->setTitle("Não Autorizado");
                $Render->setDescription("");
                $Render->setKeywords("");
                $Render->setDir("noPerm");
                $Render->renderLayout();
                exit();
            }else {
                $this->deletarUsuario($id);
                header('location: '.DIRPAGE.'usuarios');
            }
        }
    }
}