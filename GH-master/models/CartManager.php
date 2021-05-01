<?php

class CartManager extends Model
{
    public function addToCart($uid,$game_id)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM cart WHERE user_id = :uid and game_id = :gid');
        $req->execute(array(
            ":uid"=>$uid,
            ":gid"=>$game_id
        ));
        $count = $req->rowCount();
        if($count>0)
        {
            echo 0; //game already exists in cart
        }
        else
        {

            $req = $this::$_bdd->prepare('INSERT INTO cart(user_id,game_id) VALUES(:uid,:gid)');
            $req->execute(array(
                ":uid"=>$uid,
                ":gid"=>$game_id
            ));
            echo ($req?1:0); 
            //Game added to cart successfuly or error
        }
        $req->closeCursor();
    }
    public function removeFromCart($uid,$game_id)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('DELETE FROM cart WHERE user_id = :uid and game_id = :gid');
        $req->execute(array(
            ":uid"=>$uid,
            ":gid"=>$game_id
        ));
        echo($req ? 1 : 0);
    }
    public function getCart($uid,$obj)
    {
        $this->getBdd();
        $req = $this::$_bdd->prepare('SELECT * FROM cart WHERE user_id = :uid');
        $req->execute(array(
            ":uid"=>$uid
        ));
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }
}

?>
