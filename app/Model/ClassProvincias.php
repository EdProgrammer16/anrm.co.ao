<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassProvincias extends ClassConexao {
    private $DB;
    public function registerProvincia($provincia) {
        $id = 0;
        $this->DB = $this->conexaoDB()->prepare("INSERT INTO `provincias`(`pro_id`, `pro_nome`) VALUES(:pro_id, :pro_nome)");
        $this->DB->bindParam(":pro_id", $id, \PDO::PARAM_INT);
        $this->DB->bindParam(":pro_nome", $provincia, \PDO::PARAM_STR);
        $this->DB->execute();
    }
    public function listarProvincias() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM provincias ORDER BY pro_id ASC");
        $this->DB->execute();    
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "pro_id"    => $Fetch['pro_id'    ],
                "pro_nome"  => $Fetch['pro_nome'  ],
                "pro_titulo"=> utf8_encode($Fetch['pro_titulo']),
                "pro_area"  => utf8_encode($Fetch['pro_area'  ])
            ];
            $i++;
        }
        return $Array;
    }
    public function deletarProvincia($munID) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `provincias` WHERE `mun_id` = :mun_id");
        $this->DB->bindParam(":mun_id", $munID, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    public function atualizarProvinciaID($munID, $munNome) {
        $this->DB = $this->conexaoDB()->prepare("UPDATE `provincias` SET `mun_nome`= :munNome WHERE `mun_id` = :munID");
        $this->DB->bindParam(":munID", $munID, \PDO::PARAM_INT);
        $this->DB->bindParam(":munNome", $munNome, \PDO::PARAM_STR);
        $this->DB->execute();
    }
}