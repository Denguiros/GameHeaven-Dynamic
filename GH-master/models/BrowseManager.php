<?php

class BrowseManager extends Model
{
    public function getWantedGamesLike($name)
    {
        $req = "SELECT * FROM games WHERE game_name like :gname order by game_release_date limit 10";
        $this->getBdd();
        $res = $this::$_bdd->prepare($req);
        $r = $res->execute(array(
            ":gname"=>"%".$name."%"
        ));
        return $res->fetchAll(PDO::FETCH_CLASS, "Game");
    }
    public function getFranchiseGames($franchise_id)
    {
        $req = "SELECT * FROM games WHERE game_franchise_id = :gfi ";
        $this->getBdd();
        $res = $this::$_bdd->prepare($req);
        $r = $res->execute(array(
            ":gfi"=>$franchise_id
        ));
        return $res->fetchAll(PDO::FETCH_CLASS, "Game");
    }

    public function getWantedGames($price, $discounted, $genres, $platforms)
    {

        $req = "SELECT * FROM games WHERE ";
        if($price!="65")
        {
            $req .= "game_price*(1-game_discount/100) <= " . $price;
        }
        else
        {
            $req .= "game_price between 0 and (select max(game_price) from games)";
        }

        if ($discounted=="true") {
            $req .= " and game_discount > 0";
        }
        if ($genres != "0") {
            if (strpos($genres, ",") == false) {
                $req .= " and game_genres like '%" . $genres . "%'";
                
            }
            else
            {
                $genres = explode(",",$genres);
                foreach ($genres as $genre)
                    $req .= " and game_genres like '%" . $genre . "%'";
            }
        }

        if ($platforms != "0") {
            if (strpos($platforms, ",") == false) {
                $req .= " and game_platforms like '%" . $platforms . "%'";
                
            }
            else
            {   
                $platforms = explode(",",$platforms);
                foreach ($platforms as $platform)
                    $req .= " and game_platforms like '%" . $platform . "%'";
            }
        }
        $req .= " and game_verified = 1";
        $this->getBdd();
        $res = $this::$_bdd->prepare($req);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_CLASS, "Game");
    }
}
