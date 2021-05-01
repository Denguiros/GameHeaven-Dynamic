<?php 

class VerificationManager extends Model{



    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }


    public function resendCode($uid){
        $this->getBdd();
        $link = $this->generateRandomString(15);
        
        $query= "DELETE FROM user_verfication_links WHERE user_id=:uid";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "uid"=>$uid
        ]);

        $req = $this::$_bdd->prepare('INSERT INTO user_verfication_links (user_id,user_verification_link) VALUES (:id,:link)');
        $res = $req->execute([
            "id"=>$uid,
            "link"=>$link
        ]);
        return (array($link,$res));

    }

    public function verifyUser($link){
        $this->getBdd();
        $req = $this::$_bdd->prepare("SELECT * FROM user_verfication_links WHERE user_verification_link=:link");
        $req->execute([
            "link"=>$link
        ]);
        $res = $req->fetch(PDO::FETCH_ASSOC);


        if(!$res){
            return "401";
        }

        if(count($res)==0){
            return "401";
        }

        $uid = $res["user_id"];
        $verid = $res["user_verification_id"];

        
        $interval = date_diff(new DateTime('NOW'),new DateTime($res["user_verification_time"]));
        $h = $interval->format("%h");
        
        if($h>"5"){
            $req2 = $this::$_bdd->prepare("DELETE FROM user_verfication_links WHERE user_verification_id=:verid");
            $req2->execute([
                "verid"=>$verid
            ]);
            return "402";
        }


       
        $req2 = $this::$_bdd->prepare("UPDATE users SET user_verified=1 WHERE user_id=:uid");
        $req2->execute([
            "uid"=>$uid
        ]);
        
        $req2 = $this::$_bdd->prepare("DELETE FROM user_verfication_links WHERE user_verification_id=:verid");
        $req2->execute([
            "verid"=>$verid
        ]);

        return "202";

    }

}

?>