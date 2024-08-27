<?php

namespace App\Controller;

use App\Model\ClassUsuarios;
use Src\Classes\ClassRender;

class ControllerSingUp extends ClassUsuarios {

    protected $uNome;
    protected $uEmail;
    protected $uBI;
    protected $uPass;
    protected $uRem;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();
            $Render->setTitle(TITULO." | Sign-Up");
            $Render->setDescription("Esta é a página de cadastro do website ".TITULO);
            $Render->setKeywords("Página Cadastro, Cadastro, Cadastrar usuário, Registro, Sign-Up, Register");
            $Render->setDir("sign-up");
            $Render->renderLayout();
        }
    }
    private function recValues() {
        if(isset($_POST['uNome' ])) {$this->uNome  = filter_input(INPUT_POST, 'uNome' , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['uEmail'])) {$this->uEmail = filter_input(INPUT_POST, 'uEmail', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['uBI'   ])) {$this->uBI    = filter_input(INPUT_POST, 'uBI'   , FILTER_SANITIZE_SPECIAL_CHARS);}
    }
    public function register()
    {      
        if(isset($_POST['uSubmit']) && count($_POST) > 0 ){
            $this->recValues();
            $result = $this->signupUsuario(
                $this->uNome,
                $this->uEmail,
                $this->uBI
            );
            if($result['email'] != null AND $result['pass'] != null) {
                $duracao = time() + ( 60*60*24*3 );
                $result1 = $this->signinUsuario($result['email'], $result['pass'], $duracao);
                if($result1['usuario'] && $result1['pass']) {
                    $token_hash = $result['token'];
                    session_start();
                    $_SESSION['ELToken'] = $token_hash;
                    // setcookie('ELToken', $token_hash, $duracao);
                    header("Location: ".DIRPAGE."sign-up/registered");
                }
                else if(!$result1['usuario']) {header("Location: ".DIRPAGE."sign-up/error/usuario");}
                else if(!$result1['pass'   ]) {header("Location: ".DIRPAGE."sign-up/error/password");}
            }else {
                header("Location: ".DIRPAGE."sign-up/error/register");
            }
        }
        else{header("Location: ".DIRPAGE."sign-up");}
    }
    public function registered()
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();

            $Render->setTitle(TITULO." | Registrado");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("signed-up");
            
            $Render->renderLayout();
        }
    }
    public function error(){
        $Render = new ClassRender();
            $Render->setTitle(TITULO." | sign-up");
            $Render->setDescription("Esta é a página de cadastro do site MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco, cadastro");
            $Render->setDir("sign-up");
            $Render->renderLayout();
    }
}