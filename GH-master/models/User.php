<?php


class User
{
    private $data=array();

    public function __construct($user_id=null,$user_first_name=null,$user_last_name=null,$user_username=null,$user_country=null,$user_profile_picture=null,$user_email=null,$user_password=null,$user_register_date=null,$user_verified=null)
    {
        if($user_id!=null) $this->user_id=$user_id;
        if($user_first_name!=null) $this->user_first_name=$user_first_name;
        if($user_last_name!=null) $this->user_last_name=$user_last_name;
        if($user_username!=null) $this->user_username=$user_username;
        if($user_country!=null) $this->user_country=$user_country;
        if($user_profile_picture!=null) $this->user_profile_picture=$user_profile_picture;
        if($user_email!=null) $this->user_email=$user_email;
        if($user_password!=null) $this->user_password=$user_password;
        if($user_register_date!=null) $this->user_register_date=$user_register_date;
        if($user_verified!=null) $this->user_verified=$user_verified;
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }

    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }
    public function ownsGame($gid)
    {
        if(isset($this->data["games"]))
        {
            foreach($this->data["games"] as $game)
            {
                if($game->game_id == $gid)
                    return true;
            }
        }
        return false;
    }


}