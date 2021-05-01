<?php 



class RetroGame
{
    private $data=[];
    public function __construct($game_id=null,$game_name=null,$game_file_name=null,$game_description=null)
    {
        if($game_id!=null) $this->game_id=$game_id;
        if($game_name!=null) $this->game_name=$game_name;
        if($game_file_name!=null) $this->game_file_name=$game_file_name;
        if($game_description!=null) $this->game_description=$game_description;
       
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }
    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }
}




?>