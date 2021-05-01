<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerGames
{
    
    private $_view;
    private $_gameManager;
    public function __construct($url, $data = null, $action = null)
    {
        if(!isset($_SESSION["admin"])) header("location:".AdminPanel);
        if ($action == null) {
            $count = 0;
            $validURLs = ["All Games", "Approved Games", "Requested Games", "Reported Games", "Recommended Games", "Featured Games", "Retro Games"];
            for ($i = 0; $i < count($validURLs); $i++) {
                if (strToLower($url[1]) == strToLower($validURLs[$i])) {
                    if (strToLower($url[1]) != "retro games" && strToLower($url[1]) !="reported games") {
                        $this->_view = new View("Games");
                        $this->_gameManager = new GameManager();
                        $action = explode(" ", $validURLs[$i]);
                        $action = "get" . $action[0] . "Games";
                        $games = $this->_gameManager->$action();
                        foreach ($games as $game) {
                            $publisher = $this->_gameManager->getPublisher($game->game_publisher_id, "Publisher")[0];
                            $game->isRecommended = $this->_gameManager->isRecommended($game->game_id);
                            $game->isFeatured = $this->_gameManager->isFeatured($game->game_id);
                            $game->publisher_name = $publisher->publisher_name;
                        }
                        $this->_view->generate(array("curr" => $url[1], "games" => $games));
                        break;
                    } else if(strToLower($url[1]) === "reported games")
                    {
                        $this->_view = new View("Games");
                        $this->_gameManager = new GameManager();
                        $games = $this->_gameManager->getReportedGames();
                        foreach ($games as $game) {
                            $row =$this->_gameManager->getReportedGameDetails($game->game_id);
                            $game->game_report_reason=$row["report_reason"];
                            $game->game_report_description=$row["report_description"];
                        }
                        $this->_view->generate(array("curr" => $url[1], "games" => $games));
                        break;
                    }
                    else {
                        $this->_view = new View("Games");
                        $this->_gameManager = new GameManager();
                        $games = $this->_gameManager->getRetroGames();
                        $this->_view->generate(array("curr" => $url[1], "games" => $games));
                        break;
                    }
                }

                $count++;
            }

            if ($count == count($validURLs)) {
                throw new Exception("Invalid URL");
            }
        }
        if ($action === "Approve") {

            $this->approveGame($data["gid"]);
        }
        if ($action === "Dissaprove") {
            $this->dissaproveGame($data["gid"]);
        }
        if ($action === "removeFromFeatured") {
            $this->removeFromFeatured($data["gid"]);
        }
        if ($action === "removeFromRec") {
            $this->removeFromRec($data["gid"]);
        }
        if ($action === "addToRec") {
            $this->addToRec($data["gid"]);
        }
        if ($action === "addToFeatured") {
            $this->addToFeatured($data["gid"]);
        }
        if ($action === "Delete") {
            $this->deleteGame($data["gid"],$data["gfolder"]);
        }
    }
    private function approveGame($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->approveGame($gid);
    }
    private function deleteGame($gid,$gfolder)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->deleteGame($gid,$gfolder);
    }

    private function dissaproveGame($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->disapproveGame($gid);
    }

    private function addToRec($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->addToRec($gid);
    }

    private function removeFromRec($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->removeFromRec($gid);
    }

    private function removeFromFeatured($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->removeFromFeatured($gid);
    }

    private function addToFeatured($gid)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->addToFeatured($gid);
    }
}
