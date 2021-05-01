<?php 

class ControllerBrowse{
    private $_view;
    private $_browseManager;
    private $_wantedGames;
    private $filter ;
    function __construct($action=null,$name=null,$price=null,$discounted=null,$genres=null,$platforms=null){
        if(strtoLower($action[0]) == "browse")
        {
            if(isset($action[1]) && strpos($action[1],"=")==true)
            {
                $this->filter = explode("=",$action[1]);
                if(strtoLower($this->filter[0]!="franchise"))
                {   
                    $_GET[strtoLower($this->filter[0])]=$this->filter[1];
                    $this->displayPage($action[1]);
                }
                else
                {
                    $_GET[strtoLower($this->filter[0])]=$this->filter[1];
                    $this->getFranchiseGames($this->filter[1]);
                }
            }
            else
            {
                $this->displayPage($action);
            }
        }
        else if($action==1)
        {
            $this->getFilteredGames($price,$discounted,$genres,$platforms);
        }
        else
        {
            $this->getWantedGamesLike($name);
        }
    }
    function getFranchiseGames($franchise_id)
    {
        $this->_browseManager  = new BrowseManager();
        $games = $this->_browseManager->getFranchiseGames($franchise_id);
        foreach ($games as $game) {
            $game->game_genres = explode(",", $game->game_genres);
            $game->game_platforms = explode(",", $game->game_platforms);
        }
        $this->_view = new View("Browse");
        $this->_view->generate(array("games"=>$games));
        
    }
    function getWantedGamesLike($name)
    {
        $this->_browseManager  = new BrowseManager();
        $games = $this->_browseManager->getWantedGamesLike($name);
        
        foreach($games as $game)
        {
            $this->_wantedGames[] = (array)$game;
        }   
        $json = json_encode($this->_wantedGames, JSON_UNESCAPED_SLASHES);
        echo $json;
    }
    function getFilteredGames($price,$discounted,$genres,$platforms)
    {
        $this->_browseManager  = new BrowseManager();
        $games = $this->_browseManager->getWantedGames($price,$discounted,$genres,$platforms);
        $gameImages=[];
        foreach($games as $game)
        {
            foreach($game->getImages() as $image)
                $gameImages[] = GameHeaven.$image;
            $game->game_images = $gameImages;
            $game->game_release_date = $game->releaseDate();
            $gameImages=[];
            $this->_wantedGames[] = (array)$game;
        }  
        $json = json_encode($this->_wantedGames, JSON_UNESCAPED_SLASHES);
        echo $json;
    }
    function displayPage($action)
    {
        $this->_view = new View("Browse");
        if(isset($action[1]))
        {
            $this->_view->generate(["filter"=>$action[1]]);
        }
        else
        {
            $this->_view->generate([]);
        }
    }

    
}

?>