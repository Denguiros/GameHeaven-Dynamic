<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ControllerPublisherforms{
    private $_view;
    private $_publisherManager;
    function __construct($url,$data=null,$logo=null,$action=null){

        if($action==="optOut"){
            $this->optOutPublisher();
        }

        if(!isset($_SESSION["user"])){
            //$_SESSION["loginRedirect"]=1;
            $_SESSION["notLogged"]="Please login first";
            header("location:".GameHeaven);
            exit();
        }

        if($data===null){
            $this->displayPage();
        }else{
            $this->_publisherManager = new PublisherManager();
            if($action==="Add"){
               
                $this->addPublisher($data,$logo);
            }
            if($action ==="Edit"){
                $this->editPublisher($data,$logo);
            }

           
        }

        
        
    }

    function optOutPublisher(){
        $this->_publisherManager = new PublisherManager();
        $pid = $_SESSION["publisher"]->publisher_id;
        $res = $this->_publisherManager->optOutPublisher($pid);
        if($res==="202"){
            unset($_SESSION["publisher"]);
            $_SESSION["publisherSucc"]="Publisher account removed";
        }

    }
    
    function displayPage(){
       
        $this->_view = new View("PublisherForms");
        if(isset($_SESSION["publisher"])){
            $this->_view->generate(array("currentPublisher"=>$_SESSION["publisher"]));
        }else{
            $this->_view->generate(array());
        }
        
    }


    function editPublisher($data,$logo){
        $pid = $_SESSION["publisher"]->publisher_id;
        $pub = array(
            
            "publisher_name"=>$data["name"],
            "publisher_email"=>$data["email"],
            "publisher_facebook"=>$data["facebook"],
            "publisher_twitter"=>$data["twitter"],
            "publisher_youtube"=>$data["youtube"],
            "publisher_twitch"=>$data["twitch"],
            "publisher_website"=>$data["website"],
            "publisher_id"=>$pid
        );
        $res = $this->_publisherManager->editPublisher($pub,$logo);
        $p = $this->_publisherManager->getPublisherByUserId($_SESSION["user"]->user_id,"Publisher");
        $_SESSION["publisher"] = $p[0];
        
        if($res ==="202"){
            $_SESSION["publisherSucc"] = "Publisher info updated successfully";
        }else{
        }

    }
    
    function addPublisher($data,$logo){
        $uid = $_SESSION["user"]->user_id;
        $pub = array(
            "publisher_user_id"=>$uid,
            "publisher_name"=>$data["name"],
            "publisher_email"=>$data["email"],
            "publisher_facebook"=>$data["facebook"],
            "publisher_twitter"=>$data["twitter"],
            "publisher_youtube"=>$data["youtube"],
            "publisher_twitch"=>$data["twitch"],
            "publisher_website"=>$data["website"]
        );

        $res = $this->_publisherManager->becomePublisher($pub,$logo);
        if($res==="202"){
            $p = $this->_publisherManager->getPublisherByUserId($_SESSION["user"]->user_id,"Publisher");
            $_SESSION["publisher"] = $p[0]; 
            $_SESSION["publisherSucc"] = "Publisher registered successfully";
        }
    }
    
}

?>