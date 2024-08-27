<?php

namespace App\Controller;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassProvincias;
use Src\Classes\ClassToken;
session_start();

class ControllerIndex extends ClassUsuarios {
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
            $Render->setTitle(TITULO." | Página Inicial");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("index");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
            header('location: '.DIRPAGE.'dashboard');
        }
    }
}