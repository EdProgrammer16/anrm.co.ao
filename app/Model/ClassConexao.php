<?php
namespace App\Model;

abstract class ClassConexao {
    #Realiza a conexão com o banco de dados
    public function conexaoDB()
    {
        try {
            $con = new \PDO("mysql:host=".HOST.";dbname=".BANK."", USER, PASS);
            return $con;
        }catch(\PDOException $erro){
            return $erro->getMessage();
        }
    }
}