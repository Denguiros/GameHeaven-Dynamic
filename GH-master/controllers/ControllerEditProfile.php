<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerEditProfile

{
    private $_view;
    private $_userManager;
    public function __construct($url,$data=null,$pic=null,$action=null)
    {

        if(!isset($_SESSION["user"])) {

            $_SESSION["profile_error"] = 1;
            header('Location: ' . GameHeaven);
            exit(); 
        }else{
            if($data ===null && $pic===null)  $this->displayPage();
            if($data!=null && $action===null){
                $this->_userManager = new UserManager();
                $this->editProfile($data);
            }
            if($pic!=null && $action===null){
                $this->_userManager = new UserManager();
                $this->editProfilePicture($pic);
            }
            if($action==="EditPass"){
                $this->editPassword($data);
            }

        }
    }

    private function editPassword($data){
        if($data["newPass"]===$data["confirmPass"]){
            $this->_userManager = new UserManager();
            $res = $this->_userManager->editPassword($_SESSION["user"]->user_id,$data["newPass"]);
            if($res==="202"){
                $_SESSION["passwordChanged"]=1;
            }else{
                $_SESSION["errorPassChange"]=1;
            }
        }else{
            $_SESSION["passwordsNotMatch"]=1;
        }
    }

    private function displayPage(){
        $user = $_SESSION["user"];
        $this->_view = new View("EditProfile");
        $this->_view->generate(array("user"=>$user));
    }


    private function editProfile($data)
    {
        $fn = $data["firstname"] ?? "";
        $ln = $data["lastname"] ?? "";
        $ps = $data["pseudo"] ?? "";
        $cn = $data["country"]?? "";
        $em = $data["email"]?? "";
        $id = $_SESSION["user"]->user_id;
        $res = $this->_userManager->updateUserInfo($id,$fn,$ln,$ps,$cn,$em);
        
   
        if($res){
            
            $newData = $this->_userManager->getUserInfo($id,null);
            
            $_SESSION["user"]=$newData[0];
            $_SESSION["profileEdited"]=1;
            header("location: EditProfile");
            exit();
        }
    }


    
    private function editProfilePicture($pic){
        $id = $_SESSION["user"]->user_id;
        $res = $this->_userManager->updateUserProfilePicture($id,$pic);
        if($res==="415"){
            $_SESSION["profielPicError"]="File not supported";
        }
        if($res==="400"){
            $_SESSION["profielPicError"]="Image upload error, please try again later";
        }
        if($res==="202"){
            $_SESSION["profielPicSucc"]="Profile image updated";
            
            $newData = $this->_userManager->getUserInfo($id,null);
            
            $_SESSION["user"]=$newData[0];
            header("location: EditProfile");
            exit();
        }
    }

}