<?php
require_once('views/View.php');
class ControllerGame
{
    private $_gameManager;

    private $_view;

    public function __construct($url)
    {
        $this->getGame($url[1]);
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
            $this->_view = new View("Game");
            $this->_view->generate(array('data'=>$data,));
        }
    }


}