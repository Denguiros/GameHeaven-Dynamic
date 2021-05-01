<?php

class Cart{

    private $data=array();

    public function __construct($cart_id=null,$user_id=null,$game_id=null)
    {
        if($cart_id!=null) $this->cart_id=$cart_id;
        if($user_id!=null) $this->user_id=$user_id;
        if($game_id!=null) $this->game_id=$game_id;
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