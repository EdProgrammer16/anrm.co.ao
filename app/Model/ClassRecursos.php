<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassRecursos extends ClassConexao {
    private $DB;
    public function registarRecurso($nome_mineral, $tipo_mineral, $cor_mineral) {
        $id = 0;
        $this->DB = $this->conexaoDB()->prepare("INSERT INTO `recursos_minerais`(`nome_mineral`, `tipo_mineral`, `cor_mineral`) VALUES(:nome_mineral, :tipo_mineral, :cor_mineral)");
        $this->DB->bindParam(":tipo_mineral", $tipo_mineral, \PDO::PARAM_STR);
        $this->DB->bindParam(":nome_mineral", $nome_mineral, \PDO::PARAM_STR);
        $this->DB->bindParam(":cor_mineral" , $cor_mineral,  \PDO::PARAM_STR);
        $this->DB->execute();
    }
    public function listarRecursos() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM recursos_minerais ORDER BY nome_mineral ASC");
        $this->DB->execute();    
        $i = 0;
        $Array[$i] = [
            "id_mineral"   => 0,
            "tipo_mineral" => 'Sem Resultado',
            "nome_mineral" => 'Sem Resultado',
        ];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id_mineral"    => $Fetch['id_mineral'  ],
                "tipo_mineral"  => $Fetch['tipo_mineral'],
                "nome_mineral"  => $Fetch['nome_mineral'],
                "cor_mineral"   => $Fetch['cor_mineral' ]
            ];
            $i++;
        }
        return $Array;
    }
    public function deletarRecurso($munID) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `Recursos` WHERE `mun_id` = :mun_id");
        $this->DB->bindParam(":mun_id", $munID, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    public function atualizarRecursoID($munID, $munNome) {
        $this->DB = $this->conexaoDB()->prepare("UPDATE `Recursos` SET `mun_nome`= :munNome WHERE `mun_id` = :munID");
        $this->DB->bindParam(":munID", $munID, \PDO::PARAM_INT);
        $this->DB->bindParam(":munNome", $munNome, \PDO::PARAM_STR);
        $this->DB->execute();
    }
}