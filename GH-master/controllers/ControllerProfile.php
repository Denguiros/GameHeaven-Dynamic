<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerProfile
{


    private $_gameManager;
    private $_userManager;

    private $_view;

    public function __construct($url)
    {

        if(!isset($_SESSION["user"])){

            $_SESSION["errorFromProfile"]=1;
            header("Location: ".GameHeaven);
            exit();

        }else{
            $this->profile();
        }

    }







    private function profile()
    {
        $this->_userManager = new UserManager();
        $user = $this->_userManager->getUserInfo(null,$_SESSION["user"]->user_email);
        $user[0]->games = $this->_userManager->getUserOwnedGames($user[0]->user_id,"Game");
        foreach ($user[0]->games as $game) {
            $game->game_genres = explode(",", $game->game_genres);
            $game->game_platforms = explode(",", $game->game_platforms);
        }
        $_SESSION["user"] = $user[0];
        $user=$_SESSION["user"];
        $this->_view = new View("Profile");
        $this->_view->generate(array('user'=>$user));
    }
}