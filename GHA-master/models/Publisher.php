<?php 
class Publisher
{
    private $data=[];
    public function __construct($publisher_id=null,$publisher_user_id=null,$publisher_name=null,$publisher_email=null,$publisher_facebook=null,$publisher_twitter=null,$publisher_youtube=null,$publisher_twitch=null,$publisher_website=null,$publisher_verified=null)
    {
        if($publisher_id!=null) $this->publisher_id=$publisher_id;
        if($publisher_user_id!=null) $this->publisher_user_id=$publisher_user_id;
        if($publisher_name!=null) $this->publisher_name=$publisher_name;
        if($publisher_email!=null) $this->publisher_email=$publisher_email;
        if($publisher_facebook!=null) $this->publisher_facebook=$publisher_facebook;
        if($publisher_twitter!=null) $this->publisher_twitter=$publisher_twitter;
        if($publisher_youtube!=null) $this->publisher_youtube=$publisher_youtube;
        if($publisher_twitch!=null) $this->publisher_twitch=$publisher_twitch;
        if($publisher_website!=null) $this->publisher_website=$publisher_website;
        if($publisher_verified!=null) $this->publisher_verified=$publisher_verified;
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }
    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }
    public function getLogo()
    {
        return glob("publishers/".$this->publisher_id."/*.*")[0];
    }
    public function isVerified()
    {
        return $this->data["publisher_verified"]==0 ? false : true;
    }
}


?>