<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    class ControllerAddAdmin{
        private $_view;
        private $_adminsManager;
        public function __construct($url,$data=null)
        {
            
            if(!isset($_SESSION["admin"])) header("location:".AdminPanel);
            
            if($data===null){
                $this->_view = new View("AddAdmin");
                $this->_view->generate(array());
            }else{
                $this->addAdmin($data);
            }
            
        }

        private function addAdmin($data){

            if(empty($data["fname"]) || empty($data["lname"])  || empty($data["email"]) || empty($data["pass"]) || empty($data["code"]) ){
                $_SESSION["errAddAdmin"]="One or more fields is empty";
                header("location:".AdminPanel."addAdmin");
                exit;
            }

            $arr = array(
                "fn"=>$data["fname"],
                "ln"=>$data["lname"],
                "em"=>$data["email"],
                "pass"=>password_hash($data["pass"],PASSWORD_BCRYPT),
                "code"=>$data["code"]
            );
           
            $this->_adminsManager= new AdminsManager();
            $res = $this->_adminsManager->addAdmin($arr);
            if($res==="401"){
                $_SESSION["errAddAdmin"]="Email already exists";

            }else{
                header("location:".AdminPanel."admins/all");
            }
            
        }
    }
?>