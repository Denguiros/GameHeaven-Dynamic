<?php

class PublisherManager extends Model
{
    public function getPublishers()
    {
        $this->getBdd();
        return $this->getAll("publishers","Publisher");
    }

    public function getPublisher($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from publishers where publisher_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);  
    }

    public function getPublisherByUserId($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from publishers where publisher_user_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);  
    }

    public function getFranchises($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from franchises where franchise_publisher_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }

    public function addFranchise($data){
        $this->getBdd();
        $req = $this::$_bdd->prepare('INSERT INTO franchises (franchise_name,franchise_publisher_id) VALUES (:franchise_name,:franchise_publisher_id)');
        $req -> execute($data);
        return $this::$_bdd->lastInsertId();
    }

    public function removeFranchise($fid){
        $this->getBdd();
        $query = "UPDATE games SET game_franchise_id=NULL WHERE game_franchise_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$fid
        ]);

        $query = "DELETE FROM franchises WHERE franchise_id=:id";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "id"=>$fid
        ]);

        return $res;
        
    }

    public function getFranchiseGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_franchise_id=:id and game_verified=1');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisherGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_publisher_id=:id and game_verified=1');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisherUnverifiedGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_publisher_id=:id and game_verified=0');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisherDiscountedGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_publisher_id=:id and game_discount>0 and game_verified=1');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisherUpcomingGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * from games where game_publisher_id=:id and game_release_date > CURRENT_TIMESTAMP and game_verified=1 order by game_release_date ');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
    public function getPublisherTopSellingGames($id,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('select * from games join (select purchase_game_id as game_id from (SELECT purchase_game_id,COUNT(*) AS num FROM purchases GROUP BY purchase_game_id order by num desc limit 8 ) as T) AS Tab on games.game_id =  Tab.game_id where games.game_price > 0 and game_publisher_id=:id');
        $req->execute(array(":id"=>$id));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }

    public function becomePublisher($publisher,$logo){
        $query = "INSERT INTO publishers (publisher_user_id, publisher_name, publisher_email, publisher_facebook, publisher_twitter, publisher_youtube, publisher_twitch, publisher_website) VALUES (:publisher_user_id,:publisher_name,:publisher_email,:publisher_facebook,:publisher_twitter,:publisher_youtube,:publisher_twitch,:publisher_website)";

        $this->getBdd();
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute($publisher);
        
        $id = $this::$_bdd->lastInsertId();
        if($res){
            $location = "publishers/".$id;
            mkdir($location);
            move_uploaded_file($logo["tmp_name"],$location."/$id.jpg");
            return "202";
        }
    }

    public function editPublisher($publisher,$logo){
        $query = "UPDATE publishers SET publisher_name=:publisher_name,publisher_email= :publisher_email,publisher_facebook=:publisher_facebook,publisher_twitter=:publisher_twitter,publisher_youtube=:publisher_youtube,publisher_twitch=:publisher_twitch,publisher_website=:publisher_website WHERE publisher_id=:publisher_id";

        $this->getBdd();
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute($publisher);
        
        
        if($res && $logo!=null){
            $location = "publishers/".$publisher["publisher_id"];
            
            move_uploaded_file($logo["tmp_name"],$location."/".$publisher["publisher_id"]."jpg");
            return "202";
        }


    }
    public function optOutPublisher($id){
        $query="DELETE FROM games WHERE game_publisher_id=:id";
        $this->getBdd();
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "id"=>$id
        ]);
        $query="DELETE FROM publishers WHERE publisher_id=:id";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "id"=>$id
        ]);
        if($res){
            $dirname= "publishers/$id";
            array_map('unlink', glob("$dirname/*.*"));
            if(file_exists($dirname)) rmdir($dirname);
            
            return "202";
        }
    }

}

?>
