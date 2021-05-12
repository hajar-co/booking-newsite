<?php
class NewsLetter {

    private $id;
    private $email;
    private $created_at;
    private $updated_at;

    public function __construct()
    {
        
    }

    public function from($newsletters){
        if(isset($newsletters['id'])) $this->id =  $newsletters['id'];
        $this->email = $newsletters['email'];
        if(isset($newsletters['created_at'])) $this->created_at =  $newsletters['created_at'];
        if(isset($newsletters['updated_at'])) $this->updated_at =  $newsletters['updated_at'];   
    }
    public function all(){
        $con = new DB();        
        $con->prepare("SELECT * FROM newsletters");
        if($con->execute()){
            return  $con->fetchAll("ASSOC");            
        }else{
            return false;
        }
    }
    public function new(){
        $con = new DB();
        $con->prepare("INSERT INTO newsletters (`email`) VALUES (:email)");
        $con->bindParam(":email",$this->email,"STR");
        return $con->execute();
    }
    function getId(){
        return $this->id;
    }
    function getEmail(){
        return $this->email;
    }
    function getCreatedAt(){
        return $this->created_at;
    }
    function getUpdatedAt(){
        return $this->updated_at;
    }
    function setEmail($email){
        $this->email = $email;
    }
}