<?php 


class RetroGameManager extends Model{


    public function getAllGames(){
        $this->getBdd();
        return $this->getAll("retrogames","RetroGame");
    }

    public function getGame($id){
        $this->getBdd();
        $query = "SELECT * FROM retrogames WHERE game_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);
        return $req->fetchAll(PDO::FETCH_CLASS,"RetroGame");
    }

}


?>