<?php

class AdminsManager extends Model
{
    public function getAllAdmins()
    {
        $this->getBdd();
        return $this->getAll("admins","Admin");
    }

    public function addAdmin($arr){
        $this->getBdd();

        $query="SELECT * FROM admins WHERE admin_email=:em";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "em"=>$arr["em"]
        ]);

        $ad = $req->fetchAll(PDO::FETCH_CLASS, "Admin");
        
        if(count($ad)>0) return "401";

        $query="INSERT INTO admins(admin_firstname,admin_lastname,admin_email,admin_password,admin_code) VALUES (:fn,:ln,:em,:pass,:code)";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute($arr);
    }
    /*
        ERRORS
        Email not found : 401
        Password error : 402
        code error : 403
    */
    public function getAdminInfo($em,$pass,$code){
        $this->getBdd();
        $query="SELECT * FROM admins WHERE admin_email=:em";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "em"=>$em
        ]);

        

        $ad = $req->fetchAll(PDO::FETCH_CLASS, "Admin");
        
        if(empty($ad)) return "401";
        var_dump($ad);
        if(password_verify($pass,$ad[0]->admin_password)){
            if($code==$ad[0]->admin_code){
                return $ad;
            }else return "403";
        }else return "402";
    }

    public function editAdmin($id,$fn,$ln,$em,$pass=null,$code){
        $this->getBdd();
        if($pass===null){
            $query="UPDATE admins SET admin_firstname=:fn,admin_lastname=:ln,admin_email=:em,admin_code=:code WHERE admin_id=:id";
            $req = $this::$_bdd->prepare($query);
            $req->execute([
                "fn"=>$fn,
                "ln"=>$ln,
                "em"=>$em,
                "code"=>$code,
                "id"=>$id
            ]);
        }else{
            $hash = password_hash($pass,PASSWORD_BCRYPT);
            $query="UPDATE admins SET admin_firstname=:fn,admin_lastname=:ln,admin_email=:em,admin_password=:pass,admin_code=:code WHERE admin_id=:id";
            $req = $this::$_bdd->prepare($query);
            $req->execute([
                "fn"=>$fn,
                "ln"=>$ln,
                "em"=>$em,
                "code"=>$code,
                "pass"=>$hash,
                "id"=>$id
            ]);
        }
    }

    public function removeAdmin($id){
        $this->getBdd();
        $query="DELETE FROM admins WHERE admin_id=:id";
        $req = $this::$_bdd->prepare($query);
        $req->execute([
            "id"=>$id
        ]);
    }

    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function resetPassword($em){
        $this->getBdd();
        $query="SELECT * FROM admins WHERE admin_email=:em";
        $req = $this::$_bdd->prepare($query);
        $res = $req->execute([
            "em"=>$em
        ]);
        $ad = $req->fetchAll(PDO::FETCH_CLASS, "Admin");
        if(empty($ad)) return "401";
        $id = $ad[0]->admin_id;

        $newPass = $this->generateRandomString(10);
        $code = $ad[0]->admin_code;
        $hash = password_hash($newPass,PASSWORD_BCRYPT);

        $query2="UPDATE admins SET admin_password =:pass WHERE admin_id=:id";
        $req = $this::$_bdd->prepare($query2);
        $res = $req->execute([
            "pass"=>$hash,
            "id"=>$id
        ]);

        $to_email = $em;
        $subject = "GameHeaven Admin Reset";
        $body = "Your new password is : ".$newPass."\nYour Code is : ".$code;
        $headers = "From: noreply@Gameheaven";
        mail($to_email, $subject, $body, $headers);
        return "202";
    }

}

?>
