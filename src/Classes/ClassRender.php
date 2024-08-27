<?php

namespace Src\Classes;

class ClassRender {
    #Propriedades
    private $Dir;
    private $Title;
    private $Description;
    private $Keywords;

    public function getDir() { return $this->Dir; }
    public function setDir($Dir) { $this->Dir = $Dir; }
    // =================================================
    public function getTitle() { return $this->Title; }
    public function setTitle($Title) { $this->Title = $Title; }
    // =================================================
    public function getDescription() { return $this->Description; }
    public function setDescription($Description) { $this->Description = $Description; }
    // =================================================
    public function getKeywords() { return $this->Keywords; }
    public function setKeywords($Keywords) { $this->Keywords = $Keywords; }

    #Método responsável por renderrizar todos o layoot
    public function renderLayout(array $params = null)
    {
        include_once(DIRREQ."app/view/layout.php");
    }
    #Adiciona caracteristicas esoecficas no head
    public function addHead(array $params = null)
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/head.php")) 
            {include_once(DIRREQ."app/view/{$this->getDir()}/head.php");}
    }

    #Adiciona caracteristicas esoecficas no header
    public function addHeader(array $params = null)
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/header.php")) 
            {include_once(DIRREQ."app/view/{$this->getDir()}/header.php");}
    }
    #Adiciona caracteristicas esoecficas no main
    public function addMain(array $params = null)
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/main.php")) 
            {include_once(DIRREQ."app/view/{$this->getDir()}/main.php");}
    }
    #Adiciona caracteristicas esoecficas no Footer
    public function addFooter(array $params = null)
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/footer.php")) 
            {include_once(DIRREQ."app/view/{$this->getDir()}/footer.php");}
    }
        #Adiciona caracteristicas esoecficas no Footer
        public function addFoot(array $params = null)
        {
            if(file_exists(DIRREQ."app/view/{$this->getDir()}/foot.php")) 
                {include_once(DIRREQ."app/view/{$this->getDir()}/foot.php");}
        }
}