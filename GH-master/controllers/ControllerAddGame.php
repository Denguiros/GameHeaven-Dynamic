<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once('views/View.php');


class ControllerAddGame
{

    private $_view;
    private $_gameManager;
    private $_publisherManager;
    public function __construct($url,$data=null,$files=null)
    {  
        if(isset($_SESSION["user"])){
            if(!isset($_SESSION["publisher"])){
                $_SESSION["notPub"]="Please become a publisher first ";
                header("location:".GameHeaven."/Publisherforms");
                exit();
            }
        }
       
        if(!isset($_SESSION["user"])){
            $_SESSION["loginErr"]="Please login first";
            header("location:".GameHeaven);
            exit();
        }

        if($data===null){
            $this->displayPage();
        }else{
            $this->_gameManager = new GameManager();
            $r = $this->addaGame($data,$files["images"],$files["video"]);
            if($r === "401"){
                $_SESSION["gameAddError"]="Error adding game, please try again later";
                header("location:".GameHeaven);
                exit();
            }else{
                $_SESSION["gameAdded"] = "Game added, please wait for admin's confirmation";
                header("location:".GameHeaven);
                exit();
            }
        }
        
    }


    private function displayPage(){

        $this->_view = new View("AddGame");
        $this->_publisherManager = new PublisherManager();
        $f = $this->_publisherManager->getFranchises($_SESSION["publisher"]->publisher_id,"Franchise");
        $this->_view->generate(array("franchises"=>$f,"publisher"=>$_SESSION["publisher"]));
    }

    private function addaGame($data,$pictures,$video){
        $pub_id=$_SESSION["publisher"]->publisher_id;
        

        $franchise = null;
        if(!empty($data["old_franchise"])) $franchise = $data["old_franchise"];
        if(!empty($data["franchise"])){
            $this->_publisherManager = new PublisherManager();
            $arr = array(
                "franchise_name"=>$data["franchise"],
                "franchise_publisher_id"=>$pub_id
            );
            $franchise = $this->_publisherManager->addFranchise($arr);
        }

        
        $tags = $data["input"];
        $tags = substr($tags, 1, -1);
        $tags = explode(",",$tags);
        $genres = "";
        foreach($tags as $tag){
            $t = substr($tag, 1, -1);
            $t = explode(":",$t);
            $genres.= substr($t[1],1,-1).",";
        }
        $genres = substr($genres,0,-1);
       
        $platforms = implode(",",$data["platforms"]);

      

        $game=array(
            "game_name"=>$data["title"],
            "game_release_date"=>$data["releaseDate"],
            "game_price"=>$data["price"],
            "game_discount"=>"0",
            "game_folder"=>str_replace(' ', '_', $data["title"]),
            "game_description"=>$data["description"],
            "game_genres"=>$genres,
            "game_platforms"=>$platforms,
            "game_min_os"=>$data["osMin"],
            "game_min_processor"=>$data["processorMin"],
            "game_min_memory"=>$data["ramMin"],
            "game_min_graphics"=>$data["graphicsMin"],
            "game_min_directx"=>$data["directxMin"],
            "game_min_storage"=>$data["storage"],
            "game_recommended_os"=>$data["osRec"],
            "game_recommended_processor"=>$data["processorRec"],
            "game_recommended_memory"=>$data["ramRec"],
            "game_recommended_graphics"=>$data["graphicsRec"],
            "game_recommended_directx"=>$data["directxRec"],
            "game_recommended_storage"=>$data["storage"],
            "game_additional_notes"=>$data["additionalNotes"],
            "game_publisher_id"=>$pub_id,
            "game_franchise_id"=>$franchise,
            "pegi_rating_id"=>$data["pegi"],
            "game_website_link"=>$data["website"],
            "game_facebook_link"=>$data["facebook"],
            "game_twitch_link"=>$data["twitch"],
            "game_twitter_link"=>$data["twitter"],
            "game_youtube_link"=>$data["youtube"]
        );


        $game = array_map(function($value) {
            return $value === "" ? NULL : $value;
         }, $game);

        $res = $this->_gameManager->addGame($game,$pictures,$video);
        return $res;
    }
}



?>