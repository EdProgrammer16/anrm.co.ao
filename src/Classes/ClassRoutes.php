<?php
namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes {
    use TraitUrlParser;
    
    private $Rota;
    
    #Metodo de retorno da rota
    public function getRota(){
        $url = $this->parserUrl();
        $I = $url[0];

        $this->Rota = array(
            "novo"        => "ControllerNovo",
            "index"       => "ControllerIndex",
            ""            => "ControllerIndex",
            "gerar"       => "ControllerGerar",
            "perfil"      => "ControllerPerfil",
            "sign-in"     => "ControllerSingIn",
            "sign-up"     => "ControllerSingUp",
            "logout"      => "ControllerLogout",
            "usuarios"    => "ControllerUsuarios",
            "dashboard"   => "ControllerDashboard",
            "concessoes"  => "ControllerConcessoes",
            "painel-admin"=> "ControllerPainelAdmin"

        );

        if(array_key_exists($I, $this->Rota)) {
            if(file_exists(DIRREQ."app/Controller/{$this->Rota[$I]}.php")) {
                return $this->Rota[$I];
            }else {
                return "ControllerDashboard";    
            }
        }else {
            return "Controller404";
        }
    }
}