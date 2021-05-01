<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerEditGame
{


    private $_view;
    private $_gameManager;
    private $_publisherManager;
    public function __construct($url, $data = null, $action = null, $game_folder = null)
    {

        if (!isset($_SESSION["publisher"])) {
            header("location:" . GameHeaven);
            exit();
        }

        if ($action === null) {
            $this->displayPage($url[1]);
        } else {


            if ($action === "updateDiscount") {
                $this->updateDiscount($data);
            }
            if ($action === "EditBasicInfo") {
                $this->editBasicInfo($data);
            }
            if ($action === "CreateFranchise") {
                $this->createFranchise($data);
            }
            if ($action === "EditFranchise") {
                $this->editFranchise($data);
            }
            if ($action === "EditMedia") {
                $this->editMedia($data, $game_folder);
            }
            if ($action === "updateRequirments") {
                $this->editRequirments($data);
            }
            if ($action === "editSocialLinks") {
                $this->editSocialLinks($data);
            }

            if ($action === "deleteGame") {
                $this->deleteGame($data["delete_id"], $data["game_folder"]);
            }
            $_SESSION["gameEdited"] = "Game edited successfully";
        }
    }

    function deleteGame($id, $folder)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->deleteGame($id, $folder);
        header("location:" . GameHeaven . "publisher/" . $_SESSION["publisher"]->publisher_id);
        exit();
    }
    function updateDiscount($data)
    {
        $this->_gameManager = new GameManager();
        $this->_gameManager->updateDiscount($data);
        
    }
    function editSocialLinks($data)
    {
        $arr = array(
            "website" => $data["website"],
            "facebook" => $data["facebook"],
            "twitter" => $data["twitter"],
            "youtube" => $data["youtube"],
            "twitch" => $data["twitch"],
            "game_id" => $data["game_id"]
        );
        $this->_gameManager = new GameManager();
        $res = $this->_gameManager->editSocialLink($arr);
    }

    function editRequirments($data)
    {
        $game = array(
            "game_min_os" => $data["osMin"],
            "game_min_processor" => $data["processorMin"],
            "game_min_memory" => $data["ramMin"],
            "game_min_graphics" => $data["graphicsMin"],
            "game_min_directx" => $data["directxMin"],
            "game_min_storage" => $data["storage"],
            "game_recommended_os" => $data["osRec"],
            "game_recommended_processor" => $data["processorRec"],
            "game_recommended_memory" => $data["ramRec"],
            "game_recommended_graphics" => $data["graphicsRec"],
            "game_recommended_directx" => $data["directxRec"],
            "game_recommended_storage" => $data["storage"],
            "game_additional_notes" => $data["additionalNotes"],
            "game_id" => $data["game_id"]
        );
        $game = array_map(function ($value) {
            return $value === "" ? NULL : $value;
        }, $game);

        $this->_gameManager = new GameManager();

        $res = $this->_gameManager->editRequirments($game);
    }

    function editMedia($data, $game_folder)
    {
        $this->_gameManager = new GameManager();
        $res = $this->_gameManager->editMedia($data["images"], $data["video"], $game_folder);
    }

    function editFranchise($data)
    {
        $this->_gameManager = new GameManager();
        if ($data["franchise_id"] == -1)  $res = $this->_gameManager->editFranchise($data["game_id"], "NULL");
        else $res = $this->_gameManager->editFranchise($data["game_id"], $data["franchise_id"]);
    }

    function createFranchise($data)
    {
        $this->_publisherManager = new PublisherManager();
        $arr = array(
            "franchise_name" => $data["franchise_name"],
            "franchise_publisher_id" => $_SESSION["publisher"]->publisher_id
        );
        $fid = $this->_publisherManager->addFranchise($arr);
        $this->_gameManager = new GameManager();
        $this->_gameManager->editFranchise($data["game_id"], $fid);
    }

    function editBasicInfo($data)
    {
        $tags = $data["input"];
        $tags = substr($tags, 1, -1);
        $tags = explode(",", $tags);
        $genres = "";
        foreach ($tags as $tag) {
            $t = substr($tag, 1, -1);
            $t = explode(":", $t);
            $genres .= substr($t[1], 1, -1) . ",";
        }
        $genres = substr($genres, 0, -1);

        $platforms = implode(",", $data["platforms"]);

        $arr = array(
            "game_name" => $data["title"],
            "game_release_date" => $data["releaseDate"],
            "game_genres" => $genres,
            "game_price" => $data["price"],
            "pegi_rating_id" => $data["pegi"],
            "game_description" => $data["description"],
            "game_platforms" => $platforms,
            "game_id" => $data["game_id"]
        );


        $this->_gameManager = new GameManager();
        $res = $this->_gameManager->editBasicGameInfo($arr);
    }

    function displayPage($id)
    {
        if (!is_numeric($id)) throw new Exception('Page not found');
        $this->_view = new View("EditGame");
        $this->_gameManager = new GameManager();
        $game = $this->_gameManager->getGame($id, "Game");
        if (count($game) == 0) {
            throw new Exception('Page not found');
        }
        $franchise = null;
        $game = $game[0];
        if ($game->game_franchise_id != null) {
            $franchise = $this->_gameManager->getGameFranchise($game->game_franchise_id);
        }
        $this->_publisherManager = new PublisherManager();

        $franchises = $this->_publisherManager->getFranchises($_SESSION["publisher"]->publisher_id, "Franchise");

        $this->_view->generate(array("game" => $game, "franchise" => $franchise, "franchises" => $franchises));
    }
}
