<?php

class Game
{
    private $data=array();
    public function __construct($game_id=null,$game_name=null,$game_release_date=null,$game_price=null,$game_discount=null,$game_folder=null,$game_description=null,$game_min_os=null,$game_min_processor=null,$game_min_memory=null,$game_min_graphics=null,$game_min_directx=null,$game_min_storage=null,$game_recommended_os=null,$game_recommended_processor=null,$game_recommended_memory=null,$game_recommended_graphics=null,$game_recommended_directx=null,$game_recommended_storage=null,$game_additional_notes=null,$game_publisher_id=null,$game_franchise_id=null,$pegi_rating_id=null,$game_website_link=null,$game_facebook_link=null,$game_twitch_link=null,$game_twitter_link=null,$game_youtube_link=null,$game_verified=null){
        if($game_id!=null) $this->game_id=$game_id;
        if($game_name!=null) $this->game_name=$game_name;
        if($game_release_date!=null) $this->game_release_date = $game_release_date;
        if($game_price!=null) $this->game_price=$game_price;
        if($game_discount!=null) $this->game_discount=$game_discount;
        if($game_folder!=null) $this->game_folder=$game_folder;
        if($game_description!=null) $this->game_description=$game_description;
        if($game_min_os!=null) $this->game_min_os=$game_min_os;
        if($game_min_processor!=null) $this->game_min_processor=$game_min_processor;
        if($game_min_memory!=null) $this->game_min_memory=$game_min_memory;
        if($game_min_graphics!=null) $this->game_min_graphics=$game_min_graphics;
        if($game_min_directx!=null) $this->game_min_directx=$game_min_directx;
        if($game_min_storage!=null) $this->game_min_storage=$game_min_storage;
        if($game_recommended_os!=null) $this->game_recommended_os=$game_recommended_os;
        if($game_recommended_processor!=null) $this->game_recommended_processor=$game_recommended_processor;
        if($game_recommended_memory!=null) $this->game_recommended_memory=$game_recommended_memory;
        if($game_recommended_graphics!=null) $this->game_recommended_graphics=$game_recommended_graphics;
        if($game_recommended_directx!=null) $this->game_recommended_directx=$game_recommended_directx;
        if($game_recommended_storage!=null) $this->game_recommended_storage=$game_recommended_storage;
        if($game_additional_notes!=null) $this->game_additional_notes=$game_additional_notes;
        if($game_publisher_id!=null) $this->game_publisher=$game_publisher_id;
        if($game_franchise_id!=null) $this->game_franchise_id=$game_franchise_id;
        if($pegi_rating_id!=null) $this->pegi_rating_id=$pegi_rating_id;
        if($game_website_link!=null) $this->game_website_link=$game_website_link;
        if($game_facebook_link!=null) $this->game_facebook_link=$game_facebook_link;
        if($game_twitch_link!=null) $this->game_twitch_link=$game_twitch_link;
        if($game_twitter_link!=null) $this->game_twitter_link=$game_twitter_link;
        if($game_youtube_link!=null) $this->game_youtube_link=$game_youtube_link;
        if($game_verified!=null) $this->game_verified=$game_verified;
    }

    public function __get($attr){
        if(!isset($this->data[$attr])) return null;
        else return $this->data[$attr];
    }
    public function __set($attr,$value) {
        $this->data[$attr]=$value;
    }
    public function getDiscountedPrice()
    {
        return number_format($this->game_price*(1-($this->game_discount/100)),2);
    }
    public function getDir()
    {
        return "games/".$this->game_folder;
    }
    public function getImages()
    {
        return glob($this->getDir()."/images/*.*");
    }
    public function getVideos()
    {
        return glob($this->getDir()."/videos/*.*");
    }
    public function generateRandomNumber()
    {
        return $this->game_id*random_int(10,10000000);
    }
    public function isOut()
    {
        $now = new DateTime('NOW');
        return $now->format("Y-m-d G:i:s") > $this->game_release_date;
    }
    public function timeRemaining()
    {
        $interval = date_diff(new DateTime('NOW'),new DateTime($this->game_release_date));
        return $interval->format("This game will be released in approximately %a days");
    }
    public function releaseDate()
    {
        $rd = new DateTime($this->game_release_date);
        return $rd->format("d F Y");
    }
    public function getReleaseDate()
    {
        $rd = new DateTime($this->game_release_date);
        return $rd->format("Y-m-d");
    }
    public function gameDescriptionPreview()
    {
        $content = htmlspecialchars_decode($this->game_description);
        $pos = strpos($content, '.');
       
        if($pos === false) {
            return $content;
        }
        else {
            return substr($content, 0, $pos+1);
        }
    }
    public function isVerified()
    {
        return $this->data["game_verified"]==0 ? false : true;
    }
}