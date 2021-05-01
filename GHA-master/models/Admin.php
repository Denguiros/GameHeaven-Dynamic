<?php

class Admin
{
    private $data=array();
    public function __construct($admin_id=null,$admin_firstname=null,$admin_lastname=null,$admin_email=null,$admin_password=null,$admin_code=null,$level=null){
        if($admin_id!=null) $this->admin_id=$admin_id;
        if($admin_firstname!=null) $this->admin_firstname=$admin_firstname;
        if($admin_lastname!=null) $this->admin_lastname = $admin_lastname;
        if($admin_email!=null) $this->admin_email=$admin_email;
        if($admin_password!=null) $this->admin_password=$admin_password;
        if($admin_code!=null) $this->admin_code=$admin_code;
        if($level!=null) $this->level = $level;
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }
    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }

}