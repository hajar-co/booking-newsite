<?php

class Agent{

    private $id;
    private $name;
    private $email;
    private $image_id;
    private $password;
    private $score;
    private $created_at;
    private $updated_at;

    public function __construct(){
    }
    // get Top 3 agents
    public function getTop3(){
        $con = new DB();
        $Images = new Images();
        $con->prepare("SELECT name,images_id FROM agents ORDER BY score DESC LIMIT 3");
        if($con->execute()){
            $Top3agents = $con->fetchAll("OBJ"); 
            foreach($Top3agents as $key=>$agent){
                $Top3agents[$key]->image = $Images->get($agent->images_id);
            }
            return $Top3agents;
        }else{
            return false;
        }
    }
    // get Agent
    public function getAgent($id){
        $con = new DB();
        if(!$con->prepare("SELECT * FROM agents WHERE id=:id LIMIT 1")){
            return false;
        }
        if(!$con->bindParam(":id",$id,"INT")){
            return false;
        }
        if($con->execute()){
            $agent = $con->fetchAll("OBJ")[0]; 
            $this->id = $agent->id;
            $this->name = $agent->name;
            $this->email = $agent->email;
            $this->image_id = $agent->images_id;
            $this->password = $agent->password;
            $this->score = $agent->score;
        }else{
            return false;
        }
    }
    // search for agent
    public function searchForAgent($email){
        $con = new DB();
        $con->prepare("SELECT * FROM agents WHERE email=:email LIMIT 1");
        $con->bindParam(":email",$email,"STR");
        if($con->execute()){
            $agent = (object)$con->fetchAll("ASSOC")[0]; 
            $this->id = $agent->id;
            $this->name = $agent->name;
            $this->email = $agent->email;
            $this->image_id = $agent->images_id;
            $this->password = $agent->password;
            $this->score = $agent->score;
        }else{
            return false;
        }
    }
    // save agent data to database
    public function save(){
        $con = new DB();
        $con->prepare("UPDATE agents SET `name`= :name, `email`= :email, `images_id`= :images_id, `score`= :score,`updated_at`=:updatedAt WHERE `id`= :id");
        $con->bindParam(":id",$this->id,"INT");
        $con->bindParam(":name",$this->name,"STR");
        $con->bindParam(":email",$this->email,"STR");
        $con->bindParam(":images_id",$this->images_id,"STR");
        $con->bindParam(":score",$this->score,"INT");
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
        // get agent name
        public function getName(){
            return $this->name;
        }
        // get agent email
        public function getEmail(){
            return $this->email;
        }
        // get agent Image
        public function getImage(){
            return $this->images_id;
        }
        // get agent Password
        public function getPassword(){
            return $this->password;
        }
        // get agent Score
        public function getScore(){
            return $this->score;
        }
    /****
         * 
            *** Setters 
        *
    *****/

        // set agent name
        public function setName($name){
            return $this->name = $name;
        }
        // set agent email
        public function setEmail($email){
            return $this->email = $email;
        }
        // set agent Image
        public function setImage($image_id){
            return $this->images_id = $image_id;
        }
        // set agent Password
        public function setPassword($password){
            $password = password_hash($password,PASSWORD_DEFAULT);
            return $this->password = $password;
        }
        // set agent Score
        public function setScore($score){
            return $this->score = $score;
        }
    
}