<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerAuthentication
{

    private $_view;
    private $_userManager;
    private $_publisherManager;

    public function __construct($un = null, $email = null, $pass = null, $confirmPass = null, $action = null)
    {
        $this->_userManager = new UserManager();
        if ($action === "Login") {
            $this->authenticateUser($email, $pass);
        }
        if ($action === "Register") {
            $this->registerUser($un, $email, $pass, $confirmPass);
           
        }
        if ($action === "Logout") {
            $this->logoutUser();
        }
        if($action==="ResetPass"){
            $this->resetPassword($email);
        }
    }


    public function resetPassword($em){
        $u = $this->_userManager->getUserInfo(null,$em);
        
        if(isset($u[0])){
            $res = $this->_userManager->resetPassword($u[0]->user_id);
            
            if(is_array($res)){
                $to_email = $em;
                $subject = "GameHeaven Registration";
                $body = "Your new password is : ".$res[0];
                $headers = "From: noreply@Gameheaven";
                mail($to_email, $subject, $body, $headers);
                $_SESSION["passReset"]=1;
            }else{
                $_SESSION["errorRestingPass"]=1;
            }
            
        }else{
            $_SESSION["emailNotFound"]=1;
        }
    }
    public function authenticateUser($em, $pass)
    {

        $res = $this->_userManager->loginUser($em, $pass);

        if ($res === "401") {
            $_SESSION["loginErrMail"] =1;
        }

        if ($res === "402") {
            $_SESSION["loginErrPass"] =1;
        }


        if ($res === true) {
           // 
            $user = $this->_userManager->getUserInfo(null, $em);


            if($user[0]->user_verified==0){
                $_SESSION["userNotVerified"]=1;
               
            }else{
                $_SESSION["loginSucc"] = 1;
                $user[0]->games = $this->_userManager->getUserOwnedGames($user[0]->user_id,"Game");
                $_SESSION["user"] = $user[0];
                $this->_publisherManager = new PublisherManager();
                $r = $this->_publisherManager->getPublisherByUserId($user[0]->user_id,"Publisher");
                if(count($r)>0) $_SESSION["publisher"]=$r[0];
            }

         
            
            
           // header("location :".GameHeaven);

        }
    }

    public function registerUser($un, $em, $pass, $confirmPass)
    {
        $res = $this->_userManager->registerUser($un, $em, $pass,$confirmPass);


        if ($res === "400") {
            $_SESSION["errorRegister"] = "Username must be at least 5 characters long";
        }

        if ($res === "401") {
            $_SESSION["errorRegister"] = "Please check your email";
        }

        if ($res === "402") {
            $_SESSION["errorRegister"] = "Password must be at least 8 characters ";
        }
        if ($res === "403") {
            $_SESSION["errorRegister"] = "Passwords must match ";
        }


        if(is_array($res) && ($res[1])) {
            $_SESSION["successRegister"] = "User registered successfully. Please check your email for account verification code.";
            $to_email = $em;
            $subject = "GameHeaven Registration";
            $body = "Please use the following code to verify your GameHeaven Account : ".$res[0];
            $headers = "From: noreply@Gameheaven";
            mail($to_email, $subject, $body, $headers);
            $this->_view = new View("VerifyUser");
            $this->_view->generate([]);
        }

        if ($res === false) {
            $_SESSION["errorRegister"] = "Cannot register user, please try again later";
        }
        if ($res === "409") {
            $_SESSION["errorRegister"] = "Email already exists";
        }
        
    }
    public function logoutUser()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["publisher"]);
        session_destroy();
        session_start();
        $_SESSION["logout"] = 1;
        $this->_view = new View("Accueil");
    }
}
