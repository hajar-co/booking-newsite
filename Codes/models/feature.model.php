<?php

class Feature{
    private $id;
    private $icon;
    private $title;
    private $description;
    private $createdAt;
    private $updatedAt;


    public function __cunstruct(){

    }

    // Get one Single feature
    public function get($id){
        $con = new DB();
        $con->prepare("SELECT * FROM features WHERE id=:id");
        $con->bindParam("id",$id,"INT");
        if($con->execute()){
            $feature = $con->fetchAll("OBJ")[0];
            $this->id = $feature->id;
            $this->icon = $feature->icon;
            $this->title = $feature->title;
            $this->description = $feature->description;
            $this->createdAt = $feature->created_at;
            $this->updatedAt = $feature->updated_at;
            return $feature;
        }else{
            return false;
        }
    }

    // get All features
    public function all(){
        $con = new DB();
        $con->prepare("SELECT * FROM features");
        if($con->execute()){
            $Images = $con->fetchAll("OBJ");
            return $Images;
        }else{
            return false;
        }
    }

    // Getters
        // get id
        public function getId(){
            return $this->id;
        }
        // get icon
        public function getIcon(){
            return $this->icon;
        }
        // get title
        public function getTitle(){
            return $this->title;
        }
        // get description
        public function getDescription(){
            return $this->description;
        }
        // get creation date
        public function getCreationDate(){
            return $this->createdAt;
        }
        // get update date
        public function getUpdateDate(){
            return $this->updatedAt;
        }


    // Setters
        // set id
        public function setId($id){
            $this->id = $id;
        }
        // set icon
        public function setIcon($icon){
            $this->icon = $icon;
        }
        // set title
        public function setTitle($title){
            $this->title = $title;
        }
        // set description
        public function setDescription($description){
            $this->description = $description;
        }
        // set creation date
        public function setCreationDate($date){
            $this->createdAt = $date;
        }
        // set update date
        public function setUpdateDate($date){
            $this->updatedAt = $date;
        }


        // Save home data to database
        public function save(){
            $con = new DB();
            $con->prepare("UPDATE features SET `icon`= :icon, `title`=:title, `description`=:description, `updated_at`=:updatedAt WHERE `id`=:id");
            $con->bindParam(":id",$this->id,"INT");
            $con->bindParam(":icon",$this->icon,"STR");
            $con->bindParam(":title",$this->title,"STR");
            $con->bindParam(":description",$this->description,"STR");
            $con->bindParam(":updatedAt",getCurrentTimestamp(),"STR");
            if($con->execute()){
                return true;
            }else{
                return false;
            }
        }
    }