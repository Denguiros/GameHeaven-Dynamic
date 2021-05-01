<?php 


class RetroGamesManager extends Model
{

    public function addGame($name,$desc,$file,$pic){
        $this->getBdd();
        $query="INSERT INTO retrogames (game_name,game_file_name,game_description) VALUES (:gn,:gf,:gd)";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "gn"=>$name,
            "gf"=>$file["name"],
            "gd"=>$desc
        ]);

        if($res){
            $id = $this::$_bdd->lastInsertId();
            $dir = "./../GH/retrogames/$id";
            if(!file_exists($dir)){
                mkdir($dir);
            }
            
            move_uploaded_file($file["tmp_name"],$dir."/".$file["name"]);
            move_uploaded_file($pic["tmp_name"],$dir."/poster.jpg");

        }

    }


}

?>