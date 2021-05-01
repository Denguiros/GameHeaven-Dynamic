<?php


class UserManager extends Model
{
    public function getUsers()
    {
        $this->getBdd();
        return $this->getAll("users","User");
    }


    public function getUserInfo($id=null,$em=null){
        $this->getBdd();
        if(isset($id)){
            $req="SELECT * FROM users WHERE user_id=:id";
            $req = $this::$_bdd->prepare($req);
            $req->execute([
                "id"=>$id
            ]);
            return $req->fetchAll(PDO::FETCH_CLASS, "User");
        }
        if(isset($em)){
            $req="SELECT * FROM users WHERE user_email=:em";
            $req = $this::$_bdd->prepare($req);
            $req->execute([
                "em"=>$em
            ]);
            return $req->fetchAll(PDO::FETCH_CLASS, "User");
        }
    }

/*              LOGIN ERROR CODES

        401 ===> Email error
        402 ===> Pass error
*/

    public function loginUser($em,$pass){


        $this->getBdd();
        $req = $this::$_bdd->prepare("SELECT * FROM users WHERE user_email=:em");
        $req->execute([
            "em"=>$em
        ]);
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if($res){
            $hash = $res["user_password"];
            if(password_verify($pass,$hash)){
                return true;
            }
            return "402";
        }
        return "401";
    }



    /*          REGISTER ERROR CODES
    
    400 ===> Username error
    401 ===> Email error
    402 ===> Pass error
    403 ===> Pass Match error

    */

    public function registerUser($un,$em,$pass,$pass2){


        if(strlen($un)<5){
            return "400";
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            return "401";
        }

        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        
        if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8 ) {
            return "402";
            exit;
        }
        if($pass!=$pass2)
        {
            return "403";
            exit;
        }
    

        $this->getBdd();
        $req = $this::$_bdd->prepare("SELECT * FROM users WHERE user_email=:em");
        $req->execute([
            "em"=>$em
        ]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if($res){
            return "409";
        }else{
            $req2 = $this::$_bdd->prepare('INSERT INTO users (user_username,user_email,user_password) VALUES (:un,:em,:pass)');
            $hashed = password_hash($pass,PASSWORD_BCRYPT);
            $req2->execute([
                "un"=>$un,
                "em"=>$em,
                "pass"=>$hashed
            ]);

            $link = $this->generateRandomString(15);
            $id = $this::$_bdd->lastInsertId();
            $req3 = $this::$_bdd->prepare('INSERT INTO user_verfication_links (user_id,user_verification_link) VALUES (:id,:link)');
            $res = $req3->execute([
                "id"=>$id,
                "link"=>$link
            ]);

            return array($link,$res);
        }
    }

    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    

    public function updateUserInfo($id,$fn,$ln,$pseudo,$country,$email){
            //Handle Update info
            $query = "UPDATE users SET user_first_name=:fn,user_last_name=:ln,user_username=:un,user_country=:cn,user_email=:em WHERE user_id=:id";
            $this->getBdd();
            $req = $this::$_bdd->prepare("$query");
            $res = $req->execute([
                "fn"=>$fn ?? "",
                "ln"=>$ln ?? "",
                "un"=>$pseudo,
                "cn"=>$country,
                "em"=>$email,
                "id"=>$id
            ]);
            return $res;
    }



    /*          PROFILE PICTURE ERROR CODES

    415 = FILE TYPE NOT SUPPORTED
    202 = IMAGE UPDATED
    400 = IMAGE UPDATE ERROR

    */
    public function updateUserProfilePicture($id,$pic){
        var_dump($pic);
        $check = getimagesize($pic["tmp_name"]);
        if(!$check)return "415";
        $location = "users/".$id;
        
        if(!file_exists($location)){
            mkdir($location);
        }

        $old_pic = $_SESSION["user"]->user_profile_picture;
        if($old_pic!=null){
            unlink($location.$old_pic);
        }
        $imageFileType = strtolower(pathinfo(basename($pic["name"]),PATHINFO_EXTENSION));

        $new_pic_name = $id.".$imageFileType";
        $loc = $location."/$new_pic_name";
        move_uploaded_file($pic["tmp_name"],$loc);

        $query = "UPDATE users SET user_profile_picture=:pic WHERE user_id=:id";
        $this->getBdd();
        $req = $this::$_bdd->prepare("$query");
        $res = $req->execute([
            "pic"=>$new_pic_name,
            "id"=>$id
        ]);

        return $res ? "202" : "400";
    }

    public function editPassword($id,$pass){
        $this->getBdd();
        $query=("UPDATE `users` SET `user_password` = :pass WHERE `user_id`=:userid");
        $hashed = password_hash($pass,PASSWORD_BCRYPT);
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "pass"=>$hashed,
            "userid"=>$id
        ]);
        
        return $res ? "202" : "400";
    }
    public function getUserOwnedGames($uid,$obj)
    {
        $this->getBdd();
        $query=("select * from games where game_id in (SELECT purchase_game_id FROM purchases where purchase_user_id = :uid)");
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "uid"=>$uid,
        ]);
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
    }

    public function resetPassword($uid){
        $this->getBdd();
        $query="UPDATE users SET user_password=:newpass WHERE user_id=:uid";
        
        $newPass = $this->generateRandomString(10);
        
        $hashed = password_hash($newPass,PASSWORD_BCRYPT);
        
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "newpass"=>$hashed,
            "uid"=>$uid
        ]);
        return (array($newPass,$res));
    }

}