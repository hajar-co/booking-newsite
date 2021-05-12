<?php

class Gallery {
    private $id;
    private $image_id;
    private $created_at;
    private $updated_at;
    function __construct()
    {
        
    }

    public function all(){
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT * FROM gallery");
        if($con->execute()){
            $galleries = $con->fetchAll("OBJ");
            foreach($galleries as $key => $gallery){
                $galleries[$key]->image = $Images->get($gallery->images_id);                
                unset($galleries[$key]->images_id);
            }
            return $galleries;
        }else{
            return false;
        }
    }
    public function from($gallery){
        if(isset($gallery['id'])) $this->id =  $gallery['id'];
        $this->image_id = $gallery['images_id'];
        if(isset($gallery['created_at'])) $this->created_at =  $gallery['created_at'];
        if(isset($gallery['updated_at'])) $this->updated_at =  $gallery['updated_at'];        
    }
    public function new(){
        $con = new DB();
        $con->prepare("INSERT INTO gallery (`images_id`) VALUES (:images_id)");
        $con->bindParam(":images_id",$this->image_id,"INT");
        return $con->execute();
    }
    
    public function save(){
        $con = new DB();
        $con->prepare("UPDATE gallery SET `images_id` = :images_id WHERE 'id'=:id");
        $con->bindParam(":id",$this->id,"INT");
        $con->bindParam(":images_id",$this->image_id,"STR");
        return $con->execute();
    }

    function getId(){
        return $this->id;
    }
    function getImage(){
        return $this->image_id;
    }
    function getCreatedAt(){
        return $this->created_at;
    }
    function getUpdatedAt(){
        return $this->updated_at;
    }

    
    function setImage($image_id){
        $this->image_id = $image_id;
    }
}