<?php 

class Check{
    protected $connect = null;

    public function __construct($connect){
        $this->connect = $connect;
    }

    public function email($email){
        $query = "SELECT * FROM users WHERE email_address = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $email);
        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) === 0){
                return true;
            } else{
                return false;
            }
        }
    }

    public function username($username){
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $username);
        if($stmt->execute()){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) === 0){
                return true;
            } else{
                return false;
            }
        }
    }
}