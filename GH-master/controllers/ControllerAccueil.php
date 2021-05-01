<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('views/View.php');


class ControllerAccueil
{
    private $_gameManager;

    private $_view;

    public function __construct($url)
    {
        if (isset($url) && is_countable($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->games();
        }
    }
    private function games()
    {
        $games = [];
        $this->_gameManager = new GameManager();
        $gamesArr["recommendedGames"] = $this->_gameManager->getRecommendedGames("Game");
        $gamesArr["featuredGames"] = $this->_gameManager->getFeaturedGames("Game");
        $gamesArr["upcomingGames"] = $this->_gameManager->getUpcomingGames("Game");
        $gamesArr["discountedGames"] = $this->_gameManager->getDiscountedGames("Game");
        $gamesArr["newGames"] = $this->_gameManager->getNewGames("Game");
        $gamesArr["topSellingGames"] = $this->_gameManager->getTopSellerGames("Game");

        $this->_view = new View("Accueil");

       
        $lredirect = null;
        $sredirect = null;
        if(isset($_SESSION["loginRedirect"])) {
            $lredirect=1;
            unset($_SESSION["loginRedirect"]);
        }
        if(isset($_SESSION["signupRedirect"])){
            $sredirect=1;
            unset($_SESSION["signupRedirect"]);
        } 
        $this->_view->generate(array('games' => $gamesArr,"loginRedirect"=>$lredirect,"signupRedirect"=>$sredirect));
    }
}
