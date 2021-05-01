<?php


class GameManager extends Model
{
    public function approveGame($game_id){
        $this->getBdd();
        $query="UPDATE games SET game_verified=1 WHERE game_id=:gid";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }

    public function disapproveGame($game_id){
        $this->getBdd();
        $query="UPDATE games SET game_verified=0 WHERE game_id=:gid";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }
    public function addToRec($game_id){
        $this->getBdd();
        $query=("INSERT INTO recommended_games values(:gid)"); 
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }
    public function addToFeatured($game_id){
        $this->getBdd();
        $query=("INSERT INTO featured_games values(:gid)"); 
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }
    public function removeFromRec($game_id){
        $this->getBdd();
        $query=("DELETE FROM recommended_games where game_id=:gid"); 
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }
    public function removeFromFeatured($game_id){
        $this->getBdd();
        $query=("DELETE FROM featured_games where game_id=:gid"); 
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        
    }
    public function isFeatured($game_id)
    {
        $this->getBdd();
        $query="select * from featured_games where game_id = :gid ";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "gid"=>$game_id
        ]);
        if($req->rowCount()>0)
            return true;
        return false;
    }
    public function isRecommended($game_id)
    {
        $this->getBdd();
        $query="select * from recommended_games where game_id = :gid ";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gid"=>$game_id
        ]);
        if($req->rowCount()>0)
            return true;
        return false;
    }
    public function getAllGames()
    {
        $this->getBdd();
        return $this->getAll("games","Game");
    }
    public function getRequestedGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM games WHERE game_verified=0');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, "Game");
    }
    public function getRetroGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM retrogames');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getApprovedGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM games WHERE game_verified=1');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, "Game");
    }
    public function getReportedGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select * from games where game_id in (select game_id from reported_games)');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, "Game");
    }
    public function getReportedGameDetails($gid)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select * from reported_games where game_id =:gid');
        $req->execute(["gid"=>$gid]);
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function getFeaturedGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_id in (select * from featured_games) AND game_verified=1 order by game_release_date desc limit 10');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,"Game");
    }
    public function getRecommendedGames()
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_id in (select * from recommended_games) AND game_verified=1 order by game_release_date desc limit 12');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,"Game");
    }
    
    public function getGame($id,$obj){
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM games WHERE game_id='.$id);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }

    public function getNewGames($obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_release_date between DATE_SUB(now(), INTERVAL 2 MONTH) AND  CURRENT_TIMESTAMP  AND  game_verified=1 order by game_release_date desc limit 8');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);

    }
    public function getUpcomingGames($obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_release_date > CURRENT_TIMESTAMP AND game_verified=1 order by game_release_date limit 8');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getDiscountedGames($obj)
    {   
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_discount > 0 AND game_verified=1 order by game_release_date desc limit 8');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getTopSellerGames($obj)
    {   
        $this->getBdd();
        $req = $this::$_bdd->prepare('select * from games join (select purchase_game_id as game_id from (SELECT purchase_game_id,COUNT(*) AS num FROM purchases GROUP BY purchase_game_id order by num desc limit 8 ) as T) AS Tab on games.game_id =  Tab.game_id where games.game_price > 0');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function updateDiscount($data)
    {   
        if($data["discount"]>100 || $data["discount"]<0)
        {
            throw new Exception("Discount value not valid");
        }
        $this->getBdd();
        $req = $this::$_bdd->prepare('UPDATE games set game_discount = :disc where game_id  = :gid');
        $res=$req->execute(array(
            ":disc"=>$data["discount"],
            ":gid"=>$data["game_id"]
        ));
        return $res;
    }
    
    public function getPegiRating($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from pegi_ratings where rating_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisher($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from publishers where publisher_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);  
    }
    public function getSimilarGames($genreName,$id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_id in ( select game_id from games where game_genres like :genreName and game_id <> :id) AND game_verified=1 order by game_release_date desc limit 10');
        $req->execute(array(
            ":genreName"=>"%".$genreName."%",
            ":id"=>$id
    ));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function reportGame($uid,$gameId,$reason,$desc)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('INSERT INTO reported_games(game_id,user_id,report_reason,report_description) values(:gid,:usrid,:reason,:descr)');
        $req->execute(array(
            ":gid"=>$gameId,
            ":usrid"=>$uid,
            ":reason"=>$reason,
            ":descr"=>$desc,
        ));
        echo $req ? 1:0;
    }

    public function getGameFranchise($fid){
        $req = $this::$_bdd->prepare('SELECT * FROM franchises WHERE franchise_id=:id');
        $req->execute(array(
            "id"=>$fid
        ));
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function editBasicGameInfo($data){
        $this->getBdd();
       
        $query="UPDATE games SET game_name=:game_name,game_release_date=:game_release_date,game_genres=:game_genres,game_price=:game_price,pegi_rating_id=:pegi_rating_id,game_description=:game_description,game_platforms=:game_platforms WHERE game_id=:game_id";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute($data);
        return $res;
    }

    public function editFranchise($gameId,$franchiseId){
        $this->getBdd();
        $query = "UPDATE games SET game_franchise_id=:franchise_id WHERE game_id=:game_id";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "franchise_id"=>$franchiseId,
            "game_id"=>$gameId
        ]);
        return $res;
    }

    public function editRequirments($newReq){
        $this->getBdd();
        $query = "UPDATE games SET game_min_os=:game_min_os,game_min_processor=:game_min_processor,game_min_memory=:game_min_memory,game_min_graphics=:game_min_graphics,game_min_directx=:game_min_directx,game_min_storage=:game_min_storage,game_recommended_os=:game_recommended_os,game_recommended_processor=:game_recommended_processor,game_recommended_memory=:game_recommended_memory,game_recommended_graphics=:game_recommended_graphics,game_recommended_directx=:game_recommended_directx,game_recommended_storage=:game_recommended_storage,game_additional_notes=:game_additional_notes WHERE game_id=:game_id";
        $req = $this::$_bdd->prepare($query);
        $res=$req->execute($newReq);
        return $res;
    }
    public function editSocialLink($links){
        $this->getBdd();
        $query="UPDATE games SET game_website_link=:website,game_facebook_link=:facebook,game_twitter_link=:twitter,game_twitch_link=:twitch,game_youtube_link=:youtube WHERE game_id=:game_id";
        $req=$this::$_bdd->prepare($query);
        $res = $req->execute($links);
        return $res;
    }

    public function editMedia($pictures,$video,$game_folder){
        $imagesFolder = "games/$game_folder/images";
        $videoFolder = "games/$game_folder/videos";
        array_map( 'unlink', array_filter((array) glob("$imagesFolder/*") ) );
        array_map( 'unlink', array_filter((array) glob("$videoFolder/*") ) );

        $ind = 1;
        foreach($pictures["tmp_name"] as $key=>$tmpname){
            move_uploaded_file($pictures["tmp_name"][$key], $imagesFolder."/$ind.jpg");
            $ind++;
        }
        move_uploaded_file($video["tmp_name"],$videoFolder."/".$video["name"]);
        return true;
    }


    public function deleteGame($id,$game_folder){
     
        $this->getBdd();

        $query="DELETE FROM games WHERE game_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);

        $query="DELETE FROM recommended_games WHERE game_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);
        $query="DELETE FROM featured_games WHERE game_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);

        $query="DELETE FROM reported_games WHERE game_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);

        $imagesFolder = "../GH/games/$game_folder/images";
        $videoFolder = "../GH/games/$game_folder/videos";
        array_map( 'unlink', array_filter((array) glob("$imagesFolder/*") ) );
        array_map( 'unlink', array_filter((array) glob("$videoFolder/*") ) );
        if(file_exists($imagesFolder)) rmdir($imagesFolder);
        if(file_exists($videoFolder)) rmdir($videoFolder);
        if(file_exists("../GH/games/$game_folder"))  rmdir("../GH/games/$game_folder");

    }




}