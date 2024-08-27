<?php

namespace App\Controller;
use Src\Classes\ClassRender;
use App\Model\ClassUsuarios;
use App\Model\ClassProvincias;
use App\Model\ClassConcessoes;
use App\Model\ClassRecursos;
use Src\Classes\ClassToken;
session_start();

class ControllerConcessoes extends ClassUsuarios {
    use \Src\Traits\TraitUrlParser;
    private   $auth,
        $id;
        
        // =======================
    public function __construct()
    {
        if(isset($_SESSION['ELToken'])){
            $token = new ClassToken();
            $cookie = $_SESSION['ELToken'];
            if($token->readToken( $cookie )['validation']){
                $this->auth = $token->readToken( $cookie )['values'];
            }else {
                $Render = new ClassRender();
                $Render->setTitle("Não Autenticado");
                $Render->setDescription("Esse é o nosso site de MVC");
                $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
                $Render->setDir("noAuth");
                $Render->renderLayout();
                exit();
            }
        }else {
            $Render = new ClassRender();
            $Render->setTitle("Não Autenticado");
            $Render->setDescription("Esse é o nosso site de MVC");
            $Render->setKeywords("mvc completo, curso de mvc, webdesign em foco");
            $Render->setDir("noAuth");
            $Render->renderLayout();
            exit();
        }
        if(count($this->parserUrl()) == 1)
        {
            $pro    = new ClassProvincias();
            $Render = new ClassRender();
            $concessoes = new ClassConcessoes();
            $rec    = new ClassRecursos();

            $Render->setTitle(TITULO." | Concessões");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("concessoes");
            $result['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['provincias'] = $pro->listarProvincias();
            $result['concessoes'] = $concessoes->listarConcessoes();
            $result['recursos'  ] = $rec->listarRecursos();
            $result['breadcrumb'] = [
                'Lista das Concessôes'
            ];
            $result['active'   ] = [
                0 => 'concessoes'
            ];
            $Render->renderLayout($result);
        }
    }
    // ====================================================
    // ====================================================
    public function ver($id)
    {
        if(count($this->parserUrl()) > 1)
        {
            $Render = new ClassRender();
            $concessao  = new ClassConcessoes();
            $pro    = new ClassProvincias();
            $Render->setTitle(TITULO." | Ver Concessão");
            $Render->setDescription("Esse é o nosso site ".TITULO);
            $Render->setKeywords("");
            $Render->setDir("concessoes-ver");
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['concessao'] = $concessao->listarConcessaoID($id);
            $result['provincias'] = $pro->listarProvincias();
            $result['concesssao_id'] = $id;
            $result['breadcrumb'] = [
                'Concessão',
                $result['concessao'][0]['denominacao']
            ];
            $result['active'   ] = [
                0 => 'concessoes',
                1 => 'ver'
            ];
            $Render->renderLayout($result);
        }
    }
    // ====================================================
    // ====================================================
    public function edit($id)
    {
        $result['usuario'   ] = $this->listarUsuarioID($this->auth['usuario_id']);
        if($result['usuario'][0]['usuario_perm'] == 'superadmin' || $result['usuario'][0]['usuario_perm'] == 'admin' || $result['usuario'][0]['usuario_perm'] == 'moder'){
            if(count($this->parserUrl()) > 1)
            {
                if(isset($_POST['mSubmit'])){
                    // echo "<pre>";
                    // var_dump($_POST);
                    // echo "<br/><br/>ARQUIVOS<br/>";
                    // var_dump($_FILES);
                    // $this->recValues();
                    $concessao = new ClassConcessoes();
                    // $concessao->atualizarConcessao(
                    //     $this->mDEP,
                    //     $this->mPB,
                    //     $this->mRL,
                    //     $this->mEmail,
                    //     $this->mCont,
                    //     $this->mDen,
                    //     $this->mNIF,
                    //     $this->mDCD,
                    //     $this->mSocio1,
                    //     $this->mSocio2,
                    //     // ==============
                    //     $this->mEM,
                    //     $this->mIN,
                    //     $this->mRC,
                    //     $this->mArea,
                    //     $this->mPro,
                    //     $this->mBA,
                    //     $this->mCaucao,
                    //     $this->mVI,
                    //     $this->mPT,
                    //     $this->mCF,
                    //     // ==============
                    //     $this->mCT,
                    //     $this->mNT,
                    //     $this->mTM,
                    //     $this->mGEO,
                    //     $this->mCN,
                    //     $this->mDE,
                    //     $this->mDC,
                    //     $this->mVT,
                    //     $this->mPTS1,
                    //     $this->mPTS2,
                    //     // ==============
                    //     $id
                    // );

                    $mDL = $this->uploadArquivo($_FILES['mDL'  ], DIRREQ.'public/arquivos/mDL/' );
                    if( $mDL != '' ){$concessao->atualizarArqNome( 'mDL', $mDL, $id );}
                    // ===========================================================
                    $mCM = $this->uploadArquivo($_FILES['mCM'  ], DIRREQ.'public/arquivos/mCM/' );
                    if( $mCM != '' ){$concessao->atualizarArqNome( 'mCM', $mCM, $id );}
                    // ===========================================================
                    $mCL = $this->uploadArquivo($_FILES['mCL'  ], DIRREQ.'public/arquivos/mCL/' );
                    if( $mCL != '' ){$concessao->atualizarArqNome( 'mCL', $mCL, $id );}
                    // ===========================================================
                    $mDOC = $this->uploadArquivo($_FILES['mDOC'  ], DIRREQ.'public/arquivos/mDOC/' );
                    if( $mDOC != '' ){$concessao->atualizarArqNome( 'mDOC', $mDOC, $id );}
                    // ===========================================================
                    $mDCFE = $this->uploadArquivo($_FILES['mDCFE'  ], DIRREQ.'public/arquivos/mDCFE/' );
                    if( $mDCFE != '' ){$concessao->atualizarArqNome( 'mDCFE', $mDCFE, $id );}
                    // ===========================================================
                    $mRCEE = $this->uploadArquivo($_FILES['mRCEE'  ], DIRREQ.'public/arquivos/mRCEE/' );
                    if( $mRCEE != '' ){$concessao->atualizarArqNome( 'mRCEE', $mRCEE, $id );}
                    // ===========================================================
                    $mCCRA = $this->uploadArquivo($_FILES['mCCRA'  ], DIRREQ.'public/arquivos/mCCRA/' );
                    if( $mCCRA != '' ){$concessao->atualizarArqNome( 'mCCRA', $mCCRA, $id );}
                    // ===========================================================
                    $mPTPI = $this->uploadArquivo($_FILES['mPTPI'  ], DIRREQ.'public/arquivos/mPTPI/' );
                    if( $mPTPI != '' ){$concessao->atualizarArqNome( 'mPTPI', $mPTPI, $id );}
                    // ===========================================================
                    header('location: '.DIRPAGE.'minas/edit/'.$id);
                    exit();

                }
                $Render    = new ClassRender();
                $concessao = new ClassConcessoes();
                $pro       = new ClassProvincias();

                $Render->setTitle(TITULO." | Editar Consseção");
                $Render->setDescription("Esse é o nosso site ".TITULO);
                $Render->setKeywords("");
                $Render->setDir("concessoes-editar");

                $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
                $result['concessao'] = $concessao->listarConcessaoID($id);
                $result['provincias'] = $pro->listarProvincias();
                $result['minaid'] = $id;
                $result['breadcrumb'] = [
                    'Concessões',
                    'Editar'
                ];
                $result['active'   ] = [
                    0 => 'tipos-minas',
                    1 => 'ver'
                ];
                $Render->renderLayout($result);
            }
        }else { 
            $Render = new ClassRender();
            $Render->setTitle("Não Autorizado");
            $Render->setDescription("");
            $Render->setKeywords("");
            $Render->setDir("noPerm");
            $Render->renderLayout();
            exit();
        }
    }
    // ====================================================
    // ====================================================
    public function delete($id)
    {
        if(count($this->parserUrl()) > 1)
        {
            $concessoes  = new ClassConcessoes();
           
            $result['usuario'] = $this->listarUsuarioID($this->auth['usuario_id']);
            $result['minaid'] = $id;
            if($result['usuario'][0]['usuario_perm'] == 'superadmin' || $result['usuario'][0]['usuario_perm'] == 'admin' || $result['usuario'][0]['usuario_perm'] == 'moder'){
                $concessoes->deletarConcessao($id);
                header('location: '.DIRPAGE.'concessoes');
                exit();
            }else {
                $Render = new ClassRender();
                $Render->setTitle("Não Autorizado");
                $Render->setDescription("");
                $Render->setKeywords("");
                $Render->setDir("noPerm");
                $Render->renderLayout();
                exit();
            }
        }
    }
    // ====================================================
    // ====================================================
    private function uploadArquivo ( $arquivo, $pasta ) {
        if(isset($arquivo) && $arquivo['tmp_name'] != '')
        {
                $nomeOriginal = explode('.', $arquivo["name"])[0];
                $nomeFinal = $nomeOriginal.date("_d_m_Y");
                $tipo = strrchr($arquivo["name"],".");
                $tamanho = $arquivo["size"];

                // for($i = 0; $i < count($tipos); $i++){if($tipos[$i] == $tipo){$arquivoPermitido=true;}}
                // if($arquivoPermitido==false){echo "Extensão de arquivo não permitido!!";exit;}

                if (move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeFinal.$tipo)){
                    // $this->nome=$pasta .$nomeFinal. $tipo;$this->tipo=$tipo;$this->tamanho=number_format($arquivo["size"]/1024, 2) . "KB";
                    return $nomeFinal;
                }else{
                    return '';
                }
        }
    }
}