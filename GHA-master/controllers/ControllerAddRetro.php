<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    class ControllerAddRetro{
        private $_view;
        private $_retroManager;
        public function __construct($url,$data=null,$files=null)
        {
            
            if(!isset($_SESSION["admin"])) header("location:".AdminPanel);

            if($data===null){
                $this->_view = new View("AddRetro");
                $this->_view->generate(array());
            }else{
                $this->addGame($data,$files);
            }
            
        }

        private function addGame($data,$files){
            $this->_retroManager = new RetroGamesManager();
            $this->_retroManager->addGame($data["retroGameName"],$data["retroGameDescription"],$files["retroGameFile"],$files["retroGamePicture"]);
        }
    }
?>