<?php

class Home{

    private $id;
    private $thumbnail_id;
    private $adress;
    private $rooms;
    private $surface;
    private $price;
    private $title;
    private $images_id;
    private $agent_id;
    private $created_at;
    private $updated_at;

    public function __construct(){

    }
    // Get single home
    public function get($id){
        // echo "dsc";
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT * FROM homes WHERE id=:id LIMIT 1");
        $con->bindParam(":id",$id,"INT");
        if($con->execute()){
            $Home = $con->fetchAll("OBJ")[0]; 
            $this->id = $Home->id;
            $this->thumbnail = $Images->get($Home->thumbnail_id);
            $this->adress = $Home->adress;
            $this->rooms = $Home->rooms;
            $this->surface = $Home->surface;
            $this->price = $Home->price;
            $this->title = $Home->title;
            $this->images = $Images->all($Home->images_id);
            $this->agent_id = $Home->agent_id;
            $this->created_at = $Home->created_at;
            $this->updated_at = $Home->updated_at;
        }else{
            return false;
        }
    }

    // Get all homes
    public function all(){
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT * FROM homes");
        if($con->execute()){
            $Homes = $con->fetchAll("OBJ");
            foreach($Homes as $key => $home){
                $Homes[$key]->thumbnail = $Images->get($home->thumbnail_id);
                // $Homes[$key]->images = $Images->all($home->images_id);
                unset($Homes[$key]->thumbnail_id);
            }
            return $Homes;
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
        // get Home Thumbnail
        public function getThumbnail(){
            return $this->thumbnail_id;
        }
        // get Home Adress
        public function getAdress(){
            return $this->adress;
        }
        // get Home Rooms
        public function getRooms(){
            return $this->rooms;
        }
        // get Home Surface
        public function getSurface(){
            return $this->surface;
        }
        // get Home Price
        public function getPrice(){
            return $this->price;
        }
        // get Home Title
        public function getTitle(){
            return $this->title;
        }
        // get Home Images
        public function getImages(){
            return $this->images_id;
        }
        // get Home Agent
        public function getAgent(){
            return $this->agent_id;
        }
        // get Home Creation Date
        public function getCreationDate(){
            return $this->created_at;
        }
        // get Home Update date
        public function getUpdationDate(){
            return $this->updated_at;
        }
        // get Home 
    /****
         * 
            *** Setters 
        *
    *****/
        // set Home Thumbnail
        public function setThumbnail($thumbnail){
            return $this->thumbnail_id = $thumbnail;
        }
        // set Home Adress
        public function setAdress($adress){
            return $this->adress = $adress;
        }
        // set Home Rooms
        public function setRooms($romms){
            return $this->rooms = $romms;
        }
        // set Home Surface
        public function setSurface($surface){
            return $this->surface = $surface;
        }
        // set Home Price
        public function setPrice($price){
            return $this->price = $price;
        }
        // set Home Title
        public function setTitle($title){
            return $this->title = $title;
        }
        // set Home Images
        public function setImages($images){
            return $this->images_id = $images;
        }
        // set Home Agent
        public function setAgent($agentId){
            return $this->agent_id = $agentId;
        }
}