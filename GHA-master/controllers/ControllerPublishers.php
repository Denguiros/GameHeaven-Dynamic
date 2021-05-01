<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    class ControllerPublishers{
        private $_view;
        private $_publisherManager;

        public function __construct($url,$data=null,$action=null)
        {
            
            if(!isset($_SESSION["admin"])) header("location:".AdminPanel);

           $this->_publisherManager = new PublisherManager();
           if($action===null){
               $this->showPage($url);
           }else{
               if($action==="Approve")$this->_publisherManager->publisherVerify($data["pubId"],1);
               if($action==="Dissapprove")$this->_publisherManager->publisherVerify($data["pubId"],0);
               if($action==="Delete")$this->_publisherManager->deletePublisher($data["pubId"]);
           }
        }

        private function showPage($url){
            $count=0;
            $validURLs = ["All Publishers","Approved Publishers","Requested Publishers"];
            for($i=0;$i<count($validURLs);$i++)
            {
                if(strToLower($url[1])==strToLower($validURLs[$i]))
                {
                    $this->_view = new View("Publishers");      
                    $action = explode(" ",$validURLs[$i]);
                    $action ="get".$action[0]."Publishers";
                    $publishers = $this->_publisherManager->$action();
                    $this->_view->generate(array("curr"=>$url[1],"publishers"=>$publishers));
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