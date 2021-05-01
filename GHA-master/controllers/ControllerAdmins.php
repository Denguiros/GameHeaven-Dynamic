<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    class ControllerAdmins{
        private $_view;
        private $_adminManager;
        public function __construct($url,$data=null,$action=null)
        {
            if(!isset($_SESSION["admin"])) header("location:".AdminPanel);
            $this->_adminManager = new AdminsManager();
            if($action===null) $this->displayPage();

            if($action==="editAdmin"){
                $this->editAdmin($data);
            }
            if($action==="removeAdmin"){
                $this->removeAdmin($data["adminId"]);
            }
            if($action==="logout"){
                session_destroy();
                header("location:".AdminPanel);
            }
            if($action==="reset"){
                $this->resetPassword($data["email"]);
            }
           
        }

        private function resetPassword($em){
            $res = $this->_adminManager->resetPassword($em);
            if($res==="202"){
                $_SESSION["resetAdmin"]="Please check your email for new credentials";
                header("location".AdminPanel);
                exit;
            }
            if($res==="401"){
                $_SESSION["resetError"]="Email does not exist!";
                header("location".AdminPanel);
                exit;
            }
        }

        private function removeAdmin($id){
            $this->_adminManager->removeAdmin($id);
        }
        private function editAdmin($data){
            if(isset($data["pass"]))$this->_adminManager->editAdmin($data["adminId"],$data["fname"],$data["lname"],$data["email"],$data["pass"],$data["code"]);
            if(!isset($data["pass"]))$this->_adminManager->editAdmin($data["adminId"],$data["fname"],$data["lname"],$data["email"],null,$data["code"]);
            
        }
        private function displayPage(){
            $this->_view = new View("Admins");
            
            $this->_view->generate(array("admins"=>$this->_adminManager->getAllAdmins()));
        }
    }
?>