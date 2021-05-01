<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('views/View.php');
class ControllerGame
{
    private $_gameManager;

    private $_view;

    public function __construct($url,$data=null,$action=null)
    {
        
        if($action===null){
            if(!is_numeric($url[1])){
            
                throw new Exception('Game not found , please check your link ');
            }
            $this->getGame($url[1]);
        } 
        if($action==="Report"){
            $this->reportGame($data[0],$data[1]);
        }
    }

    function getGame($id){
        $data = [];
        $this->_gameManager = new GameManager();
        $data["game"] = $this->_gameManager->getGame($id,"Game")[0];
        $data["pegi_rating"] = $this->_gameManager->getPegiRating($data["game"]->pegi_rating_id,"PegiRating")[0];
        $data["publisher"] = $this->_gameManager->getPublisher($data["game"]->game_publisher_id,"Publisher")[0];
        $data["game"]->game_genres = explode(",",$data["game"]->game_genres);
        $data["game"]->game_platforms = explode(",",$data["game"]->game_platforms);
        $data["similar_games"] = $this->_gameManager->getSimilarGames($data["game"]->game_genres[0],$data["game"]->game_id,"Game");
        if(!$data["game"]){
            throw new Exception('Game not found , please check your link');
        }else{

            if($data["game"]->game_verified==0){
                header("location:".GameHeaven);
            }
           

            $user = $_SESSION["user"]?? null;


            $_SESSION["currentGame"]=$data["game"];
            $this->_view = new View("Game");
            $this->_view->generate(array('data'=>$data,"user"=>$user));
        }
    }

    function reportGame($reason,$desc){
        $id = $_SESSION["currentGame"]->game_id;
        $uid = $_SESSION["user"]->user_id;
        $this->_gameManager = new GameManager();
        $this->_gameManager->reportGame($uid,$id,$reason,$desc);
    }


}