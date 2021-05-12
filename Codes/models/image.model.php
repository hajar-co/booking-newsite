<?php

class Images{

    private $id;
    private $url;
    private $altTitle;
    private $imageId;
    private $createdAt;
    private $updatedAt;

    public function __construct(){

    }

    // get single image 
    public function get($imageId){
        $con = new DB();
        $con->prepare("SELECT * FROM images WHERE images_id=:imageId LIMIT 1");
        $con->bindParam(":imageId",$imageId,"STR");
        if($con->execute()){
            $Image = $con->fetchAll("OBJ")[0];
            $this->id = $Image->id;
            $this->url = $Image->url;
            $this->altTitle = $Image->alt_title;
            $this->imageId = $Image->images_id;
            $this->createdAt = $Image->created_at;
            $this->updatedAt = $Image->updated_at;
            return $Image;
        }else{
            return false;
        }
    }
    // get all images
    public function all($imagesId){
        $con = new DB();
        $con->prepare("SELECT * FROM images WHERE `images_id` = :imagesId");
        $con->bindParam(":imagesId",$imagesId,"STR");
        if($con->execute()){
            $Images = $con->fetchAll("OBJ");
            return $Images;
        }else{
            return false;
        }
    }


    // Save home data to database
    public function save(){
        $con = new DB();
        $con->prepare("UPDATE agents SET `thumbnail_id`= :thumbnail_id, `adress`=:adress, `rooms`=:rooms, `surface`=:surface, `price`=:price, `title`=:title, `images_id`=:images_id, `agent_id`=:agent_id, `updated_at`=:updated_at  WHERE `id`=:id");
        $con->bindParam(":id",$this->id,"INT");
        $con->bindParam(":thumbnail_id",$this->thumbnail_id,"STR");
        $con->bindParam(":adress",$this->adress,"STR");
        $con->bindParam(":rooms",$this->rooms,"INT");
        $con->bindParam(":surface",$this->surface,"INT");
        $con->bindParam(":price",$this->price,"STR");
        $con->bindParam(":title",$this->title,"STR");
        $con->bindParam(":images_id",$this->images_id,"STR");
        $con->bindParam(":agent_id",$this->agent_id,"INT");
        $con->bindParam(":updated_at",getCurrentTimestamp(),"STR");
        if($con->execute()){
            return true;
        }else{
            return false;
        }
    }


    /****
         * 
            *** Getters 
        *
    *****/
        // get agent id
        public function getId(){
            return $this->id;
        }
        public function getUrl(){
            return $this->url;
        }
        public function getALtTitle(){
            return $this->altTitle;
        }
        public function getImageId(){
            return $this->imageId;
        }
        public function getCreationDate(){
            return $this->createdAt;
        }
        public function getUpadteDate(){
            return $this->updatedAt;
        }
    /****
         * 
            *** Setters 
        *
    *****/
        // set Thumbnail_id
        public function setThumbnail($thumbnail){
            $this->thumbnail_id = $thumbnail;
        }
        // set url
        public function setUrl($url){
            $this->url = $url;
        }
        // set title
        public function setALtTitle($altTitle){
            $this->altTitle = $altTitle;
        }
        // set image id
        public function setImageId($imageId){
            $this->imageId = $imageId;
        }
}