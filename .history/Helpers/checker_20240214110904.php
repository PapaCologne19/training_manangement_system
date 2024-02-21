<?php 

class Check{
    protected $connect = null;

    public function __construct($connect){
        $this->connect = $connect;
    }

    public function email($email){
        $query = "SELECT * FROM users WHERE  email_address = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $email);
        if($stmt->execute()){
            return $stmt;
        }
    }

    public function 
}