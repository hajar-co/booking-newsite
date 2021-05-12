<?php

class partner{


    private $id;
    private $image_id;
    private $createdAt;
    private $updatedAt;


    public function __cunstruct(){

    }


    // get single partner
    public function get(int $id)
    {
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT * FROM partners WHERE id=:id");
        $con->bindParam("id",$id,"INT");
        if($con->execute()){
            $partner = $con->fetchAll("OBJ");
            if(count($partner) > 0){$partner = $partner[0];}else{return false;}
            $this->id = $partner->id;
            $this->image_id = $partner->image_id;
            $partner->image = $Images->get($partner->image_id);
            $this->image = $partner->image;
            $this->createdAt = $partner->created_at;
            $this->updatedAt = $partner->updated_at;
            return $partner;
        }else{
            return false;
        }
    }
    // get all partners
    public function all()
    {
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT * FROM partners");
        if($con->execute()){
            $partners = $con->fetchAll("OBJ");
            if(!(count($partners) > 0)) return false;
            foreach($partners as $partner){
                $partner->image = $Images->get($partner->image_id);
                $this->image = $partner->image;
            }
            return $partners;
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
        public function getImage(){
            return $this->image;
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
        public function setImage($Image){
            $this->icon = $Image;
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
            $con->prepare("UPDATE partners SET `image_id`= :imageId, `updated_at`=:updatedAt WHERE `id`=:id");
            $con->bindParam(":id",$this->id,"INT");
            $con->bindParam(":imageId",$this->imageId,"STR");
            $con->bindParam(":updatedAt",getCurrentTimestamp(),"STR");
            if($con->execute()){
                return true;
            }else{
                return false;
            }
        }
}