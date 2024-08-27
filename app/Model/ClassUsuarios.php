<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassUsuarios extends ClassConexao {
    private $DB;
    public function signupUsuario($u_nome, $u_email, $u_bi) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `usuarios` WHERE `usuario_email` = :u_email OR `usuario_bi` = :u_bi");
        $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
        $this->DB->bindParam(":u_bi", $u_bi, \PDO::PARAM_STR);
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'     =>  $Fetch['usuario_id'     ],
                'usuario_email'  =>  $Fetch['usuario_email'  ],
                'usuario_nome'   =>  $Fetch['usuario_nome'   ],
                'usuario_bi'     =>  $Fetch['usuario_bi'     ],
            ];
            $i++;
        }
        if(count($Array) == 0){
            $u_pass = password_hash($u_bi, PASSWORD_BCRYPT);
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO `usuarios`(`usuario_email`, `usuario_nome`, `usuario_bi`, `usuario_pass`) 
            VALUES(:u_email, :u_nome, :u_bi, :u_pass)");
            $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_nome" , $u_nome , \PDO::PARAM_STR);
            $this->DB->bindParam(":u_bi"   , $u_bi   , \PDO::PARAM_STR);
            $this->DB->bindParam(":u_pass" , $u_pass , \PDO::PARAM_STR);
            $this->DB->execute();
            $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `usuarios` WHERE `usuario_nome` = :u_nome OR `usuario_email` = :u_email OR `usuario_bi` = :u_bi");
            $this->DB->bindParam(":u_nome", $u_nome, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_bi", $u_bi, \PDO::PARAM_STR);
            $this->DB->execute();
            $i = 0;
            $Array = [];
            while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
                $Array[$i] = [
                    'email' =>  $Fetch['usuario_email'],
                    'pass'  =>  $Fetch['usuario_bi'   ],
                ];
                $i++;
            }
            return $Array[0];
        }else {
            return [
                'email' =>  null,
                'pass'  =>  null,
            ];
        }
    }
    // ========================================================
    public function addUsuario($u_nome, $u_email, $u_bi, $u_perm, $u_pass){
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `usuarios` WHERE `usuario_nome` = :u_nome OR `usuario_email` = :u_email OR `usuario_bi` = :u_bi");
        $this->DB->bindParam(":u_nome", $u_nome, \PDO::PARAM_STR);
        $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
        $this->DB->bindParam(":u_bi", $u_bi, \PDO::PARAM_STR);
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'     =>  $Fetch['usuario_id'     ],
                'usuario_nome'   =>  $Fetch['usuario_nome'   ],
                'usuario_email'  =>  $Fetch['usuario_email'  ],
                'usuario_bi'     =>  $Fetch['usuario_bi'     ],
                'usuario_perm'   =>  $Fetch['usuario_perm'   ],
            ];
            $i++;
        }
        if(count($Array) == 0){
            $u_pass = password_hash($u_bi, PASSWORD_BCRYPT);
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO `usuarios`(`usuario_email`, `usuario_nome`, `usuario_bi`, `usuario_perm`, `usuario_pass`) 
            VALUES(:u_email, :u_nome, :u_bi, :u_perm, :u_pass)");
            $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_nome" , $u_nome , \PDO::PARAM_STR);
            $this->DB->bindParam(":u_bi"   , $u_bi   , \PDO::PARAM_STR);
            $this->DB->bindParam(":u_perm" , $u_perm   , \PDO::PARAM_STR);
            $this->DB->bindParam(":u_pass" , $u_pass , \PDO::PARAM_STR);
            $this->DB->execute();
            $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `usuarios` WHERE `usuario_nome` = :u_nome OR `usuario_email` = :u_email OR `usuario_bi` = :u_bi");
            $this->DB->bindParam(":u_nome", $u_nome, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_email", $u_email, \PDO::PARAM_STR);
            $this->DB->bindParam(":u_bi", $u_bi, \PDO::PARAM_STR);
            $this->DB->execute();
            $i = 0;
            $Array = [];
            while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
                $Array[$i] = [
                    'email'  =>  $Fetch['usuario_email'],
                    'pass'   =>  $Fetch['usuario_bi'   ],
                ];
                $i++;
            }
            return $Array;
        }else {
            return [];
        }
    }
    // ========================================================
    protected function signinUsuario($uEmail, $uPass, $duracao) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM `usuarios` WHERE usuario_email = :email LIMIT 1");
        $this->DB->bindParam(":email", $uEmail, \PDO::PARAM_STR);
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'     =>  $Fetch['usuario_id'     ],
                'usuario_email'  =>  $Fetch['usuario_email'  ],
                'usuario_nome'   =>  $Fetch['usuario_nome'   ],
                'usuario_bi'     =>  $Fetch['usuario_bi'     ],
                'usuario_dataCri'=>  $Fetch['usuario_dataCri'],
                'usuario_dataUpt'=>  $Fetch['usuario_dataUpt'],
                'usuario_pass'   =>  $Fetch['usuario_pass'   ],
            ];
            $i++;
        }
        $message = [
            'usuario' => false,
            'pass'    => false,
            'token'   => null
        ];
        if(count($Array) > 0):
            $message['usuario'] = true;
            if(password_verify($uPass, $Array[0]['usuario_pass'])){
                $token = new ClassToken();
                $result = $token->createToken([
                    'token_IdUser'   => $Array[0]['usuario_id'  ],
                    'token_LoginUser'=> $Array[0]['usuario_email'],
                    'token_duration' => $duracao
                ]);
                $message = [
                    'usuario' => true,
                    'pass'    => true,
                    'token'   => $result
                ];
                $duracao = date('Y-m-d H:i:s', $duracao);
                $id_user = intval($Array[0]['usuario_id']);
                $this->DB = $this->conexaoDB()->prepare("INSERT INTO `tokens`(`token_idUser`, `token_hash`, `token_status`, `token_expireDate`)VALUES(:token_idUser, :token_hash, '1', :duracao)");
                $this->DB->bindParam(":token_idUser", $id_user, \PDO::PARAM_INT);
                $this->DB->bindParam(":token_hash", $result, \PDO::PARAM_STR);
                $this->DB->bindParam(":duracao", $duracao, \PDO::PARAM_STR);
                $this->DB->execute();
            }else {
                $message['pass'] = false;
            }
        else:
            $message['usuario'] = false;
        endif;
        return $message;
    }
    // ========================================================
    protected function listarUsuariosExID() {
        $usuarioID = func_get_args()[0];
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT `usuario_id`, `usuario_email`, `usuario_nome`, `usuario_bi`, `usuario_dataCri`, `usuario_dataUpt`, a.`usuario_perm` FROM `usuarios` as u JOIN `admin` as a ON `usuario_id` = a.`admin_usuarioId` WHERE `usuario_id` <> :usuario_id ORDER BY `usuario_id` ASC");
        $this->DB->bindParam(":usuario_id", $usuarioID, \PDO::PARAM_INT);
        $this->DB->execute();    
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'      =>  $Fetch['usuario_id'     ],
                'usuario_email'   =>  $Fetch['usuario_email'  ],
                'usuario_nome'    =>  $Fetch['usuario_nome'   ],
                'usuario_bi'      =>  $Fetch['usuario_bi'     ],
                'usuario_perm'    =>  $Fetch['usuario_perm'   ],
                'usuario_dataCri' =>  $Fetch['usuario_dataCri'],
                'usuario_dataUpt' =>  $Fetch['usuario_dataUpt'],
            ];
            $i++;
        }
        return $Array;
    }
    // ========================================================
    protected function listarUsuarios() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT `usuario_id`, `usuario_email`, `usuario_nome`, `usuario_bi`, `usuario_dataCri`, `usuario_dataUpt`, `usuario_perm` FROM `usuarios` WHERE `usuario_perm` != 'superadmin' ORDER BY `usuario_id` ASC");
        $this->DB->execute();    
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'      =>  $Fetch['usuario_id'     ],
                'usuario_email'   =>  $Fetch['usuario_email'  ],
                'usuario_nome'    =>  $Fetch['usuario_nome'   ],
                'usuario_bi'      =>  $Fetch['usuario_bi'     ],
                'usuario_perm'    =>  $Fetch['usuario_perm'   ],
                'usuario_dataCri' =>  $Fetch['usuario_dataCri'],
                'usuario_dataUpt' =>  $Fetch['usuario_dataUpt'],
            ];
            $i++;
        }
        return $Array;
    }
    // ========================================================
    protected function listarUsuarioID() {
        $usuarioID = func_get_args()[0];
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT `usuario_id`, `usuario_email`, `usuario_nome`, `usuario_bi`, `usuario_dataCri`, `usuario_dataUpt`, `usuario_perm` FROM `usuarios` WHERE `usuario_id` = :usuario_id LIMIT 1");
        $this->DB->bindParam(":usuario_id", $usuarioID, \PDO::PARAM_INT);
        $BFetch->execute();
        $i = 0;
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                'usuario_id'      =>  $Fetch['usuario_id'     ],
                'usuario_email'   =>  $Fetch['usuario_email'  ],
                'usuario_nome'    =>  $Fetch['usuario_nome'   ],
                'usuario_bi'      =>  $Fetch['usuario_bi'     ],
                'usuario_perm'    =>  $Fetch['usuario_perm'   ],
                'usuario_dataCri' =>  $Fetch['usuario_dataCri'],
                'usuario_dataUpt' =>  $Fetch['usuario_dataUpt']
            ];
            $i++;
        }
        return $Array;
    }
    // ========================================================
    public function deletarUsuario($usuarioID) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `usuarios` WHERE `usuario_id` = :usuario_id");
        $this->DB->bindParam(":usuario_id", $usuarioID, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    // ========================================================
    protected function atualizarUsuario( $id, $nome, $email, $bi, $perm ) {  
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `usuarios` SET 
            `usuario_nome`  = :nome,
            `usuario_email` = :email,
            `usuario_bi`    = :bi,
            `usuario_perm`  = :perm,
            `usuario_dataUpt` = current_timestamp()
            WHERE `usuario_id` = :id");
        $this->DB->bindParam(":nome" , $nome , \PDO::PARAM_STR);
        $this->DB->bindParam(":email", $email, \PDO::PARAM_STR);
        $this->DB->bindParam(":perm" , $perm , \PDO::PARAM_STR);
        $this->DB->bindParam(":bi"   , $bi   , \PDO::PARAM_STR);
        $this->DB->bindParam(":id"   , $id   , \PDO::PARAM_INT);
        $this->DB->execute();
    }
    // ========================================================
    protected function alterarPassword($u_id, $u_pass) {
        $u_pass = password_hash($u_pass, PASSWORD_DEFAULT);
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `usuarios` SET 
            `usuario_pass` = :uPass,
            `usuario_dataUpt` = current_timestamp()
            WHERE `usuario_id` = :id");
        $this->DB->bindParam(":uPass", $u_pass, \PDO::PARAM_STR);
        $this->DB->bindParam(":id"   , $u_id  , \PDO::PARAM_INT);
        $this->DB->execute();
    }
}