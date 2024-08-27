<?php

namespace Src\Classes;

class ClassToken {
    static public function createToken( array $array) {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        $header = json_encode($header);
        $header = base64_encode($header);
        // ==================================
        $payload = [
            // 'iss'          => 'localhost',
            // 'aud'          => 'localhost',
            'token_IdUser'    => $array['token_IdUser'   ],
            'token_LoginUser' => $array['token_LoginUser'],
            'token_exp'       => $array['token_duration']
        ];
        // ==================================
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
        // ==================================
        $signature = hash_hmac('sha256', "$header.$payload", KEY, true);
        $signature = base64_encode($signature);

        return "$header.$payload.$signature";
        
    }
    static public function readToken( $cookie ) {
        if($cookie !== null){
            $cookie = explode('.', $cookie);
            $header    = $cookie[0];
            $payload   = $cookie[1];
            $signature = $cookie[2];
            $chave = KEY;
        
            $validar_assinatura = hash_hmac('sha256', "$header.$payload", $chave, true);
            $validar_assinatura = base64_encode($validar_assinatura);
        
            if($signature == $validar_assinatura){
                $dados_token = base64_decode($payload);
                $dados_token = json_decode($dados_token);

                if($dados_token->token_exp > time()){
                    return [
                        'validation' => true,
                        'message' => 'token valido',
                        'values' => [
                            'usuario_id'    => $dados_token->token_IdUser,
                            'usuario_login' => $dados_token->token_LoginUser
                        ]
                    ];
                }else {
                    return [
                        'validation' => false,
                        'message'    => 'token exirado',
                        'values'     => null
                    ];
                }
                
            }else {
                return [
                        'validation' => true,
                        'message'    => 'token invalido',
                        'values'     => null
                    ];
            }
        }
    }
}