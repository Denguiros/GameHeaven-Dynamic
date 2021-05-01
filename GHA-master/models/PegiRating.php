<?php
class PegiRating
{
    private $data=array();

    public function __construct($rating_id=null,$rating_age=null,$rating_description=null)
    {
        if($rating_id!=null) $this->rating_id=$rating_id;
        if($rating_age!=null) $this->rating_age=$rating_age;
        if($rating_description!=null) $this->rating_description=$rating_description;
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }
    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }

}