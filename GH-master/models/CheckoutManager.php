<?php

class CheckoutManager extends Model
{
    public function buy($data,$uid)
    {
        foreach($data as $inf)
        {
            if(is_string($inf))
                $inf = htmlentities($inf); // ne pas accepter les donnés avec des characters de html comme <b> ou <a> etc...
        }
        $this->getBdd();
     
        $req2 = $this::$_bdd->prepare("INSERT INTO `reciepts` (`user_id`, `billing_adress1`, `billing_adress2`, `state`, `zip_code`, `country`, `phone_number`) VALUES (:user, :bill1, :bill2, :st, :zip, :cn, :phone);");
        $req2->execute([
            "user"=>$uid,
            "bill1"=>$data["billing_adress1"],
            "bill2"=>$data["billing_adress2"],
            "st"=>$data["state"],
            "zip"=>$data["zip_code"],
            "cn"=>$data["country"],
            "phone"=>$data["phone_number"]
        ]);
       
        $receipt_id = $this::$_bdd->lastInsertId();
        foreach($data["game"] as $game_id)
        {
            $req = $this::$_bdd->prepare('INSERT INTO purchases(`purchase_user_id`,`purchase_game_id`,`purchase_reciept`) values (:usid,:game_id,:receipt)');
            $req->execute(array(
                "usid"=>$uid,
                "game_id"=>$game_id,
                "receipt"=>$receipt_id,
            ));
            $req = $this::$_bdd->prepare('DELETE FROM cart where user_id=:usid and game_id=:gid');
            $req->execute(array(
                "usid"=>$uid,
                "gid"=>$game_id,
            ));
            
        }
        

    }

}

?>
