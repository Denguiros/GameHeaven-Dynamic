<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerLogin{
    private $_view;
    private $_adminsManager;
    public function __construct($url,$data=null)
    {
        if(isset($_SESSION["admin"])){
            header("location:".AdminPanel."home");
        }else{
            if($data===null){
                $this->_view = new View("Login");
                $this->_view->generateLogin();
            }else{
                $this->loginAdmin($data);
            }
            
        }
        
    }


    private function loginAdmin($data){
        $this->_adminsManager = new AdminsManager();
        $res = $this->_adminsManager->getAdminInfo($data["email"],$data["pass"],$data["code"]);
        if($res==="401"){
            $_SESSION["errLogin"]="Email not found";
            header("location:".AdminPanel);
            exit;
        }
        if($res==="402"){
            $_SESSION["errLogin"]="Password not correct";
            header("location:".AdminPanel);
            exit;
        }
        if($res==="403"){
            $_SESSION["errLogin"]="Secret code not correct";
            header("location:".AdminPanel);
            exit;
        }
        
        $_SESSION["admin"]=$res[0];
    }
}

?>