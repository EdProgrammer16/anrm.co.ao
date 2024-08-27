<?php

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes {
    #Propriedades
    private $Method;
    private $Param = [];
    private $Obj;

    // #Getters & Setters
    protected function getMethod() {return $this->Method;}
    public function setMethod($Method) {$this->Method = $Method;}

    protected function getParam() {return $this->Param;}
    public function setParam($Param) {$this->Param = $Param;}

    #Método Construtor
    public function __construct()
    {
        self::addController();
    }

    #Método de adição de controller
    private function addController(){
        $RotaController = $this->getRota();
        $NameS = "App\\Controller\\{$RotaController}";
        $this->Obj = new $NameS;
        if(isset($this->parserUrl()[1]) && $this->parserUrl()[1] != ''){
            self::addMethod();
        }
    }

    #Método de adição de método de controller
    private function addMethod() {
        if(method_exists($this->Obj, $this->parserUrl()[1])){
            $this->setmethod("{$this->parserUrl()[1]}");
            self::addParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
        }else {
            echo "Não";
        }
    }

    #Método de adição de paramentros do controller
    private function addParam() {
        $CountArray = count($this->parserUrl());
        if( $CountArray > 2){
            foreach ($this->parserUrl() as $key => $value){
                if($key > 1){
                    $this->setParam($this->Param += [($key-1) => $value]);
                }
            }
        }
    }
}