<?php

namespace Src\Classes;

class ClassbreadCrumb {
    use \Src\Traits\TraitUrlParser;

    #Cria os breadcrumbs do site
    public function addBreadCrumb()
    {
        $Contador = count($this->parserUrl());
        $ArrayLink[0] = "";
        for ($i=0; $i < $Contador; $i++) { 
            $ArrayLink[0] .= $this->parserUrl()[$i].'/';
            
            echo "<a href=".DIRPAGE.$ArrayLink[0].">".$this->parserUrl()[$i]."</a>";
            if($i < $Contador - 1) 
                {echo " > ";}
        }
    }
}