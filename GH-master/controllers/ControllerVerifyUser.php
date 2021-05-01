<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerVerifyUser
{
    private $_view;
    private $_verificatoinManager;
    private $_userManager;
    public function __construct($url,$data=null,$action=null)
    {

        if(isset($_SESSION["user"])){
            $_SESSION["pageNotAvailable"]=1;
            header("location:".GameHeaven); 
            exit;
        }

        $this->_view = new View("VerifyUser");
        if(isset($data)){
            if($action==="resendCode"){
                $this->resendCode($data["email"]);
            }
            if($action==="verify"){
                $this->_verificatoinManager = new VerificationManager();
                $this->verifyUser($data["verCode"]);
            }
            
        }
        if(isset($url[1]) && !$url[1]!=" "){
            $this->_verificatoinManager = new VerificationManager();
            $this->verifyUser($url[1]);
        }else{
            $this->displayPage();
        }
        
    }

    private function resendCode($em){
        $this->_userManager = new UserManager();
        $this->_verificatoinManager = new VerificationManager();
        $u = $this->_userManager->getUserInfo(null,$em);
        
        if(!isset($u[0])){
            $_SESSION["emailNoExist"]=1;
            
        }else{
            
            $uid = $u[0]->user_id;
            $res = $this->_verificatoinManager->resendCode($uid);
            if(is_array($res) && $res[1]){
                $to_email = $em;
                $subject = "GameHeaven Registration";
                $body = "Please use the following code to verify your GameHeaven Account : ".$res[0];
                $headers = "From: noreply@Gameheaven";
                mail($to_email, $subject, $body, $headers);
                $_SESSION["emailResent"]=1;
            }
        }


    }

    private function displayPage(){
        $this->_view->generate(array());
    }

    private function verifyUser($link){

        $res = $this->_verificatoinManager->verifyUser($link);
        if($res==="202"){
            $_SESSION["verifySucc"] = 1;
            $this->_view = new View("Accueil");
            $this->displayPage();
            return;
        }
        if($res==="401"){
            $_SESSION["verifyErr"]=1;
            
        }

        if($res==="402"){
            $_SESSION["verifyExpired"]=1;
        }
        $this->_view->generate(array());
    }

}





?>
