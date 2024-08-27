<?php

namespace App\Model;
use Src\Classes\ClassToken;
class ClassConcessoes extends ClassConexao {
    private $DB;
    public function registrarConcessao(  
        $n_processo, $data_entrada_processo, $denominacao,
        $representante_legal, $nif_denominacao, $data_criacao_denominacao,
        $email, $contacto, $provincia, $area_ocupada, $socio1, $socio2,
        $titulo_mineral, $n_mineral, $data_emissao_mineral, $data_validade_mineral, $estado_projecto,
        $codigo_n, $data_emissao_codigo, $data_caducidade_codigo, $recursos_exploracao,
        $data_inicio_negociacoes, $data_rubrica_contratos, $caucao, $valor_investimento, $homens_nacionais, 
        $homens_estrangeiros, $mulheres_nacionais, $mulheres_estrangeiros,
        $prestacao_1,  $prestacao_2, $prestacao_3, $prestacao_4, $prestacao_5,
        $pagamento_taxa_superfice_1, $pagamento_taxa_superfice_2, $pagamento_taxa_superfice_3, $pagamento_taxa_superfice_4, 
        $pagamento_taxa_superfice_5, $pagamento_taxa_superfice_6, $pagamento_taxa_superfice_7,
        $capacidade_tecnica, $capacidade_financeira, $documento_legal, $carta_ministro, $carta_conforto_anrm,
        $croquis_localizacao, $declaracao_capacidade_empresa, $relatorio_contas_economico, $programa_trabalho_investimentos
    ) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE denominacao = '$denominacao' or nif_denominacao = '$nif_denominacao'");
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"             => $Fetch['denominacao'            ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        if(count($Array) == 0){
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO `concessoes`(
                    `n_processo`,
                    `data_entrada_processo`,
                    `denominacao`,
                    `representante_legal`,
                    `nif_denominacao`,
                    `data_criacao_denominacao`,
                    `email`,
                    `contacto`,
                    `provincia`,
                    `area_ocupada`,
                    `socio1`,
                    `socio2`,
                    `titulo_mineral`, 
                    `n_mineral`, 
                    `data_emissao_mineral`, 
                    `data_validade_mineral`, 
                    `estado_projecto`,
                    `codigo_n`, 
                    `data_emissao_codigo`, 
                    `data_caducidade_codigo`, 
                    `recursos_exploracao`,
                    `data_inicio_negociacoes`, 
                    `data_rubrica_contratos`, 
                    `caucao`, 
                    `valor_investimento`, 
                    `homens_nacionais`, 
                    `homens_estrangeiros`, 
                    `mulheres_nacionais`, 
                    `mulheres_estrangeiros`,
                    `prestacao_1`,
                    `prestacao_2`, 
                    `prestacao_3`, 
                    `prestacao_4`, 
                    `prestacao_5`,
                    `pagamento_taxa_superfice_1`, 
                    `pagamento_taxa_superfice_2`, 
                    `pagamento_taxa_superfice_3`, 
                    `pagamento_taxa_superfice_4`, 
                    `pagamento_taxa_superfice_5`, 
                    `pagamento_taxa_superfice_6`, 
                    `pagamento_taxa_superfice_7`,
                    `capacidade_tecnica`, 
                    `capacidade_financeira`, 
                    `documento_legal`,
                    `carta_ministro`,
                    `carta_conforto_anrm`,
                    `croquis_localizacao`,
                    `declaracao_capacidade_empresa`, 
                    `relatorio_contas_economico`, 
                    `programa_trabalho_investimentos`) VALUES 
                ('$n_processo', '$data_entrada_processo', '$denominacao','$representante_legal', '$nif_denominacao', '$data_criacao_denominacao','$email', '$contacto', '$provincia', '$area_ocupada', '$socio1', '$socio2', '$titulo_mineral', '$n_mineral', '$data_emissao_mineral', '$data_validade_mineral', '$estado_projecto', '$codigo_n', '$data_emissao_codigo', '$data_caducidade_codigo', '$recursos_exploracao', '$data_inicio_negociacoes', '$data_rubrica_contratos', '$caucao', '$valor_investimento', '$homens_nacionais', '$homens_estrangeiros', '$mulheres_nacionais', '$mulheres_estrangeiros', '$prestacao_1',  '$prestacao_2', '$prestacao_3', '$prestacao_4', '$prestacao_5', '$pagamento_taxa_superfice_1', '$pagamento_taxa_superfice_2', '$pagamento_taxa_superfice_3', '$pagamento_taxa_superfice_4', '$pagamento_taxa_superfice_5', '$pagamento_taxa_superfice_6', '$pagamento_taxa_superfice_7', '$capacidade_tecnica', '$capacidade_financeira', '$documento_legal', '$carta_ministro', '$carta_conforto_anrm', '$croquis_localizacao', '$declaracao_capacidade_empresa', '$relatorio_contas_economico', '$programa_trabalho_investimentos')"
            );
            // ========================================================
            $this->DB->execute();

            $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE denominacao = '$denominacao' or nif_denominacao = '$nif_denominacao'");
            $this->DB->execute();
            foreach($BFetch->fetch(\PDO::FETCH_ASSOC) as $Fetch );
            if($Fetch > 0){
                return true;
            }else {
                return false;    
            }
        }else {
            return false;
        }
    }

    public function registroConcessao(  
        $denominacao,
        $representante_legal,
        $recursos_exploracao, 
        $provincia,
        $municipio, 
        $titulo_mineral, 
        $n_mineral, 
        $codigo_n,
        $area_ocupada, 
        $data_emissao_mineral, 
        $data_validade_mineral
    ) {
        // echo  $data_validade_mineral;
        // echo "<br/>";
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE denominacao = '$denominacao'");
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "provincia"              => $Fetch['provincia'             ],
                "municipio"              => $Fetch['municipio'             ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ]
            ];
            $i++;
        }

        if(count($Array) == 0){
            $this->DB = $this->conexaoDB()->prepare(
                "INSERT INTO `concessoes`(
                    `denominacao`,
                    `representante_legal`,
                    `recursos_exploracao`,
                    `provincia`,
                    `municipio`,
                    `titulo_mineral`, 
                    `n_mineral`, 
                    `area_ocupada`,
                    `codigo_n`, 
                    `data_emissao_mineral`, 
                    `data_validade_mineral`) VALUES 
                ('$denominacao','$representante_legal', '$recursos_exploracao', '$provincia', '$municipio', '$titulo_mineral', '$n_mineral', '$area_ocupada', '$codigo_n', '$data_emissao_mineral', '$data_validade_mineral')"
            );
            // ========================================================
            $this->DB->execute();

            $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE denominacao = '$denominacao'");
            $this->DB->execute();
            foreach($BFetch->fetch(\PDO::FETCH_ASSOC) as $Fetch );
            if($Fetch > 0){
                return true;
            }else {
                return false;    
            }
        }else {
            return false;
        }
    }

    public function listarConcessoes() {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes");
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "municipio"              => $Fetch['municipio'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function listarConcessaoID($id) {
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE id = $id; LIMIT 1");
        $this->DB->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "municipio"              => $Fetch['municipio'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function listarConcessoesLIKE($pesquisa) {
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE `denominacao` LIKE '%$pesquisa%'  
        or `representante_legal` LIKE '%$pesquisa%' 
        or `nif_denominacao`     LIKE '%$pesquisa%' 
        or `email`               LIKE '%$pesquisa%' 
        or `provincia`           LIKE '%$pesquisa%' 
        or `socio1`              LIKE '%$pesquisa%' 
        or `socio2`              LIKE '%$pesquisa%' 
        or `titulo_mineral`      LIKE '%$pesquisa%' 
        or `estado_projecto`     LIKE '%$pesquisa%' 
        or `recursos_exploracao` LIKE '%$pesquisa%'
        ORDER BY `denominacao` ASC");
        $BFetch->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function listarConcessoesProRec($provincia, $recurso){
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM concessoes WHERE `provincia` = '$provincia'  
        AND `recursos_exploracao` LIKE '%$recurso%'
        ORDER BY `denominacao` ASC");
        $BFetch->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function listarConcessoesProTM($provincia, $titulo_mineral){
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare(
            "SELECT * FROM concessoes WHERE `provincia` = '$provincia'  
        AND `titulo_mineral` LIKE '%$titulo_mineral%'
        ORDER BY `denominacao` ASC");
        $BFetch->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    } 
    public function listarConcessoesPro($pesquisa) {
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE `provincia` = '$pesquisa' ORDER BY `denominacao` ASC");
        $BFetch->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function listarConcessoesRec($pesquisa) {
        
        $BFetch = $this->DB = $this->conexaoDB()->prepare("SELECT * FROM concessoes WHERE `recursos_exploracao` LIKE '%$pesquisa%' ORDER BY `denominacao` ASC");
        $BFetch->execute();
        $i = 0;
        $Array = [];
        while($Fetch = $BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$i] = [
                "id"                     => $Fetch['id'                    ],
                "n_processo"             => $Fetch['n_processo'            ],
                "data_entrada_processo"  => $Fetch['data_entrada_processo' ],
                "denominacao"            => $Fetch['denominacao'           ],
                "representante_legal"    => $Fetch['representante_legal'   ],
                "nif_denominacao"        => $Fetch['nif_denominacao'       ],
                "data_criacao_denominacao" => $Fetch['data_criacao_denominacao'],
                "email"                  => $Fetch['email'                 ],
                "contacto"               => $Fetch['contacto'              ],
                "provincia"              => $Fetch['provincia'             ],
                "area_ocupada"           => $Fetch['area_ocupada'          ],
                "socio1"                 => $Fetch['socio1'                ],
                "socio2"                 => $Fetch['socio2'                ],
                "titulo_mineral"         => $Fetch['titulo_mineral'        ],
                "n_mineral"              => $Fetch['n_mineral'             ],
                "data_emissao_mineral"   => $Fetch['data_emissao_mineral'  ],
                "data_validade_mineral"  => $Fetch['data_validade_mineral' ],
                "estado_projecto"        => $Fetch['estado_projecto'       ],
                "codigo_n"               => $Fetch['codigo_n'              ],
                "data_emissao_codigo"    => $Fetch['data_emissao_codigo'   ],
                "data_caducidade_codigo" => $Fetch['data_caducidade_codigo'],
                "recursos_exploracao"    => $Fetch['recursos_exploracao'   ],
                "data_inicio_negociacoes"=> $Fetch['data_inicio_negociacoes'],
                "data_rubrica_contratos" => $Fetch['data_rubrica_contratos' ],
                "caucao"                 => $Fetch['caucao'                 ],
                "valor_investimento"     => $Fetch['valor_investimento'     ],
                "homens_nacionais"       => $Fetch['homens_nacionais'       ],
                "homens_estrangeiros"    => $Fetch['homens_estrangeiros'    ],
                "mulheres_nacionais"     => $Fetch['mulheres_nacionais'     ],
                "mulheres_estrangeiros"  => $Fetch['mulheres_estrangeiros'  ],
                "prestacao_1"            => $Fetch['prestacao_1'            ],
                "prestacao_2"            => $Fetch['prestacao_2'            ], 
                "prestacao_3"            => $Fetch['prestacao_3'            ], 
                "prestacao_4"            => $Fetch['prestacao_4'            ],
                "prestacao_5"            => $Fetch['prestacao_5'            ],
                "pagamento_taxa_superfice_1" => $Fetch['pagamento_taxa_superfice_1'], 
                "pagamento_taxa_superfice_2" => $Fetch['pagamento_taxa_superfice_2'], 
                "pagamento_taxa_superfice_3" => $Fetch['pagamento_taxa_superfice_3'], 
                "pagamento_taxa_superfice_4" => $Fetch['pagamento_taxa_superfice_4'], 
                "pagamento_taxa_superfice_5" => $Fetch['pagamento_taxa_superfice_5'], 
                "pagamento_taxa_superfice_6" => $Fetch['pagamento_taxa_superfice_6'], 
                "pagamento_taxa_superfice_7" => $Fetch['pagamento_taxa_superfice_7'],
                "capacidade_tecnica"         => $Fetch['capacidade_tecnica'        ],
                "capacidade_financeira"      => $Fetch['capacidade_financeira'     ],
                "documento_legal"            => $Fetch['documento_legal'           ],
                "carta_ministro"             => $Fetch['carta_ministro'            ],
                "carta_conforto_anrm"        => $Fetch['carta_conforto_anrm'       ],
                "croquis_localizacao"        => $Fetch['croquis_localizacao'       ],
                "declaracao_capacidade_empresa"  => $Fetch['declaracao_capacidade_empresa'  ], 
                "relatorio_contas_economico"     => $Fetch['relatorio_contas_economico'     ],
                "programa_trabalho_investimentos"=> $Fetch['programa_trabalho_investimentos']
            ];
            $i++;
        }
        return $Array;
    }
    public function deletarConcessao($id) {
        $this->DB = $this->conexaoDB()->prepare("DELETE FROM `concessoes` WHERE `id` = :id");
        $this->DB->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->execute();
    }
    public function atualizarConcessao(
        $mDEP, $mPB, $mRL, $mEmail, $mCont, $mDen , $mNIF   , $mDCD, $mSocio1, $mSocio2,
        $mEM , $mIN, $mRC, $mArea , $mPro , $mBA  , $mCaucao, $mVI , $mPT    , $mCF    ,
        $mCT , $mNT, $mTM, $mGEO  , $mCN  , $mDE  , $mDC    , $mVT , $mPTS1  , $mPTS2  , $mID
    ) {
        // $params = func_get_args();
        // echo "<pre>";
        // var_dump($params);
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `minerais` 
            SET `mDEP`   = ?,
                `mPB`    = ?,
                `mRL`    = ?,
                `mEmail` = ?,
                `mCont`  = ?,
                `mDen`   = ?,
                `mNIF`   = ?,
                `mDCD`   = ?,
                `mSocio1`= ?,
                `mSocio2`= ?,
                `mEM`    = ?,
                `mIN`    = ?,
                `mRC`    = ?,
                `mArea`  = ?,
                `mPro`   = ?,
                `mBA`    = ?,
                `mCaucao`= ?,
                `mVI`    = ?,
                `mPT`    = ?,
                `mCF`    = ?,
                `mCT`    = ?,
                `mNT`    = ?,
                `mTM`    = ?,
                `mGEO`   = ?,
                `mCN`    = ?,
                `mDE`    = ?,
                `mDC`    = ?,
                `mVT`    = ?,
                `mPTS1`  = ?,
                `mPTS2`  = ?
                 WHERE `mID` = ?"
            );
        
        $this->DB->execute(
            [
                $mDEP, $mPB, $mRL, $mEmail, $mCont, $mDen , $mNIF   , $mDCD, $mSocio1, $mSocio2,
                $mEM , $mIN, $mRC, $mArea , $mPro , $mBA  , $mCaucao, $mVI , $mPT    , $mCF    ,
                $mCT , $mNT, $mTM, $mGEO  , $mCN  , $mDE  , $mDC    , $mVT , $mPTS1  , $mPTS2  , $mID
            ]
        );
    }

    public function atualizarArqNome( $name, $value , $mID) {
        // $params = func_get_args();
        // echo "<pre>";
        // var_dump($params);
        $this->DB = $this->conexaoDB()->prepare(
            "UPDATE `minerais` 
            SET `$name`   = ?
                 WHERE `mID` = ?"
            );
        
        $this->DB->execute(
            [
                $value, $mID
            ]
        );
    }
}