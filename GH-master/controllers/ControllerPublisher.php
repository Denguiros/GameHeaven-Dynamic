<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerPublisher

{
    private $_view;
    private $_publisherManager;
    private $_gameManager;
    public function __construct($url,$data=null)
    {
        if($data===null){
            $this->getPublisher($url[1]);
        }else{
            $this->removeFranchise($data["franchise_id"]);
        }
        
    }


    private function removeFranchise($id){
        $this->_publisherManager = new PublisherManager();
        $res = $this->_publisherManager->removeFranchise($id);
    }

    private function getPublisher($url)
    {
        $data = [];
        $games = [];
        $this->_publisherManager = new PublisherManager();
        $data['publisher'] = $this->_publisherManager->getPublisher($url, "Publisher");
        if (!$data['publisher']) {
            throw new Exception('Publisher not found , please check your link');
        } else {
            $data['publisher'] = $data['publisher'][0];
            $data['franchises'] = $this->_publisherManager->getFranchises($data['publisher']->publisher_id, "Franchise");
            $games["publisherGames"] = $this->_publisherManager->getPublisherGames($data['publisher']->publisher_id, "Game");
            $games["publisherUnverifiedGames"] = $this->_publisherManager->getPublisherUnverifiedGames($data['publisher']->publisher_id, "Game");
            foreach ($data['franchises'] as $franchise) {
                $franchise->games = $this->_publisherManager->getFranchiseGames($franchise->franchise_id, "Game");
            }
            $this->_gameManager = new GameManager();
            $games["publisherUpcomingGames"] = $this->_publisherManager->getPublisherUpcomingGames($data['publisher']->publisher_id, "Game");
            $games["publisherDiscountedGames"] = $this->_publisherManager->getPublisherDiscountedGames($data['publisher']->publisher_id, "Game");
            $games["publisherTopSellingGames"] = $this->_publisherManager->getPublisherTopSellingGames($data['publisher']->publisher_id, "Game");
            
            foreach ($games as $gameArr) {
                foreach ($gameArr as $game) {
                    $game->game_genres = explode(",", $game->game_genres);
                    $game->game_platforms = explode(",", $game->game_platforms);
                }
            }
        }
        $this->_view = new View("Publisher");
        $this->_view->generate(array("data" => $data, "games" => $games));
    }
}
