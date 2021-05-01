<?php

class Franchise{

    private $data=array();

    public function __construct($franchise_id=null,$franchise_name=null,$franchise_publisher_id=null)
    {
        if($franchise_id!=null) $this->franchise_id=$franchise_id;
        if($franchise_name!=null) $this->franchise_name=$franchise_name;
        if($franchise_publisher_id!=null) $this->franchise_publisher_id=$franchise_publisher_id;
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