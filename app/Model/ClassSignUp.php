<?php

namespace App\Model;

class ClassSignUp extends ClassConexao {
    private $DB;
    protected function cadastroClientes($nome, $sexo, $cidade) {
        $id = 0;
        $this->DB = $this->conexaoDB()->prepare("INSERT INTO teste VALUES(:id, :nome, :sexo, :cidade)");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->DB->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $this->DB->bindParam(":cidade", $cidade, \PDO::PARAM_STR);
        $this->DB->execute();
    }
    protected function listarClientes() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM teste WHERE 1 ORDER BY id ASC");
        $BFetch->execute();
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'    =>  $Fetch['id'   ],
                'nome'  =>  $Fetch['nome' ],
                'sexo'  =>  $Fetch['sexo' ],
                'cidade'=> $Fetch['cidade']
            ];
            $i++;
        }
        return $Array;
    }
    protected function listarClienteID() {
        $id = func_get_args();
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM teste WHERE id = :id ORDER BY id ASC");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $BFetch->execute();
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'id'    =>  $Fetch['id'   ],
                'nome'  =>  $Fetch['nome' ],
                'sexo'  =>  $Fetch['sexo' ],
                'cidade'=> $Fetch['cidade']
            ];
            $i++;
        }
        return $Array;
    }
    protected function deletarClientes($id) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `teste` WHERE id = :id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    protected function atualizarClientes($id, $nome, $sexo, $cidade) {  
        $this->DB = $this->conexaoDB()->prepare("UPDATE `teste` SET `id`=:id,`nome`=:nome,`sexo`=:sexo,`cidade`=:cidade WHERE `id`=:id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->DB->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $this->DB->bindParam(":cidade", $cidade, \PDO::PARAM_STR);
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->execute();
    }
}