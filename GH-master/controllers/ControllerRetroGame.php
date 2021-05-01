
<?php 

class ControllerRetroGame{
    private $_view;
    private $_retroManager;
    public function __construct($url)
    {
        if(isset($url[1]) && is_numeric($url[1])){
            $this->displayGame($url[1]);
        }else{
            header("location:".GameHeaven."RetroHeaven");
        }
        
    }

    function displayGame($id){
        $this->_retroManager= new RetroGameManager();
        $game = $this->_retroManager->getGame($id);
        if(count($game)==0){
            header("location:".GameHeaven."RetroHeaven");
        }
        $this->_view = new View("RetroGame");
        $this->_view->generate(array("game"=>$game[0]));
    }
}


?>