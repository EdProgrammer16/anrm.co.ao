<?php

namespace App\Controller;

use App\Model\ClassUsuarios;
use Src\Classes\ClassRender;

class ControllerSingIn extends ClassUsuarios {

    protected $uEmail;
    protected $uPass;
    protected $uRem;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        if(count($this->parserUrl()) == 1)
        {
            $Render = new ClassRender();
            $Render->setTitle(TITULO." | sign-in");
            $Render->setDescription("Esta é a página de cadastro do site MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco, cadastro");
            $Render->setDir("sign-in");
            $Render->renderLayout();
        }
    }
    private function recValues() {
        if(isset($_POST['uEmail'])) {$this->uEmail = filter_input(INPUT_POST, 'uEmail', FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['uPass' ])) {$this->uPass  = filter_input(INPUT_POST, 'uPass' , FILTER_SANITIZE_SPECIAL_CHARS);}
        if(isset($_POST['uRem'  ])) {$this->uRem   = filter_input(INPUT_POST, 'uRem'  , FILTER_SANITIZE_SPECIAL_CHARS);}
    }
    public function auth()
    {      
        if(isset($_POST['uSubmit']) && count($_POST) > 0 ){
            $this->recValues();
            $duracao = time() + ( 60*60*3*24 );
            $result = $this->signinUsuario($this->uEmail, $this->uPass, $duracao);
            if($result['usuario'] && $result['pass']) {
                $token_hash = $result['token'];
                session_start();
                $_SESSION['ELToken'] = $token_hash;
                // setcookie('ELToken', $token_hash, $duracao);
                
                header("Location: ".DIRPAGE."dashboard");
            }
            else if(!$result['usuario']) {header("Location: ".DIRPAGE."sign-in/error/usuario");}
            else if(!$result['pass'   ]) {header("Location: ".DIRPAGE."sign-in/error/password");}
        }
        else{header("Location: ".DIRPAGE."sign-in");}
    }

    public function error(){
        $Render = new ClassRender();
            $Render->setTitle(TITULO." | sign-in");
            $Render->setDescription("Esta é a página de cadastro do site MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco, cadastro");
            $Render->setDir("sign-in");
            $Render->renderLayout();
    }
}