<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class ControllerUsers{
    private $_view;
    private $_userManager;
    private $_publisherManager;
    public function __construct($url,$data=null,$action=null)
    {
        
        if(!isset($_SESSION["admin"])) header("location:".AdminPanel);

        if($action===null){
            $this->displayPage($url);
        }
        if($action==="Approve"){
            $this->approveUser($data["uid"]);
        }
        if($action==="Dissaprove"){
            $this->dissaproveUser($data["uid"]);
        }
        if($action==="Delete"){
            $this->deleteUser($data["uid"]);
        }
       
    }

    private function approveUser($uid){
        $this->_userManager=new UserManager();
        $this->_userManager->verifyUser($uid);
    }

    private function dissaproveUser($uid){
        $this->_userManager=new UserManager();
        $this->_userManager->unVerifyUser($uid);

    }
    private function deleteUser($uid){
        $this->_userManager=new UserManager();
        $this->_userManager->deleteUser($uid);

    }

    private function displayPage($url){
        $count=0;
        $validURLs = ["All Users"];
        for($i=0;$i<count($validURLs);$i++)
        {
            if(strToLower($url[1])==strToLower($validURLs[$i]))
            {
                $this->_view = new View("Users");
                $this->_userManager = new UserManager();
                $users = $this->_userManager->getUsers();
                foreach($users as $user )
                {
                    $this->_publisherManager = new PublisherManager();

                    $user->publisher_name = $this->_publisherManager->getPublisherByUserId($user->user_id,"Publisher")[0]->publisher_name ?? "None";
                }
                $this->_view->generate(array("curr"=>$url[1],"users"=>$users));
                break ;
            }
        }
                    
        if($count==count($validURLs))
        {
            throw new Exception("Invalid URL");
        }
    }
}

?>