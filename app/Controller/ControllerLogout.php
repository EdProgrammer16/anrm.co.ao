<?php
namespace App\Controller;
session_start();

class ControllerLogout {

    public function __construct()
    {
        if(isset($_SESSION['ELToken']))
            {session_destroy();header("Location: ".DIRPAGE."sign-in");exit();}
        else 
            {header("Location: ".DIRPAGE);exit();}
    }
}