<?php

class DB{

    private $con;
    private $sqlQuery;

    public function __construct(){
        try {
            $this->con = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

        }
    }

    public function prepare($query){
        $this->sqlQuery = $this->con->prepare($query);
        return true;
    }
    public function bindParam($placeholder,$value,$dataType){
        switch ($dataType) {
            case 'STR':
                $this->sqlQuery->bindParam($placeholder,$value,PDO::PARAM_STR);
                break;
            
            case 'INT':
                $this->sqlQuery->bindParam($placeholder,$value,PDO::PARAM_INT);
                break;
            
            case 'BOOL':
                $this->sqlQuery->bindParam($placeholder,$value,PDO::PARAM_BOOL);
                break;

            default:
                echo "Data type not supported ay thid time";
                return false;
                break;
        }
    }
    public function bindValue($placeholder,$value,$dataType){

    }
    public function execute(){
        $this->sqlQuery->execute();
        return true;
    }

    public function fetchAll($returnType){
        switch ($returnType) {
            case 'ASSOC':
                return $this->sqlQuery->fetchAll(PDO::FETCH_ASSOC);
            break;
            case 'OBJ':
                return $this->sqlQuery->fetchAll(PDO::FETCH_OBJ);
            break;
            default:
                return false;
            break;
        }
    }
    public function close(){
        $this->con = null;
    }
}