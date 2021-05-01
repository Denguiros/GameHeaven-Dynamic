<?php 


class ControllerRetroheaven{
    private $_view;
    private $_retroManager;
    public function __construct()
    {
        $this->displayPage();
    }

    function displayPage(){
        $this->_retroManager= new RetroGameManager();
        $this->_view = new View("RetroHeaven");
        $arr = $this->_retroManager->getAllGames();
        $this->_view->generate(array("games"=>$arr));
    }
}


?>