<?php
# Arquivos Diretorio raizes
define('PATH', "anrm.co.ao/");
define('TITULO'   , "ANRM"  );

$PastaInterna = PATH;

define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

if(substr($_SERVER['DOCUMENT_ROOT'], -1) == "/") 
    {define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");}
else 
    {define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");}

# Diretórios especificos
define('DIRIMG',DIRPAGE."public/img/"  );
define('DIRCSS',DIRPAGE."public/css/"  );
define('DIRJS' ,DIRPAGE."public/js/"   );
define('DIRAUD',DIRPAGE."public/audio/");
define('DIRDES',DIRPAGE."public/des/"  );
define('DIRFON',DIRPAGE."public/fonts/");
define('DIRVID',DIRPAGE."public/video/");
define('DIRARQ',DIRREQ."public/arquivos/");

# Acesso ao Banco de Dados
define('HOST', "localhost" );
define('USER', "root"      );
define('BANK', "gestoranrm");
define('PASS', ""          );

# Diretórios especificos
define('KEY', "-EDF3DD3EDQDDA2DT");