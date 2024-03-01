<?php
class User
{
    public $connect;
    public $username;
    public $password;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    /*
    |------------------------------------------------------------
    | Function for Login
    |------------------------------------------------------------
    */
    public function login(){
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $this->username);
        if($stmt->execute()){
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Registering new user
    |------------------------------------------------------------
    */
    public function register($data = [])
    {
        $query = "INSERT INTO users(username, password, firstname, middlename, lastname, email_address, division, id_number, principal, supervisor) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $data['username']);
        $stmt->bindParam(2, $data['password']);
        $stmt->bindParam(3, $data['firstname']);
        $stmt->bindParam(4, $data['middlename']);
        $stmt->bindParam(5, $data['lastname']);
        $stmt->bindParam(6, $data['email_address']);
        $stmt->bindParam(7, $data['division']);
        $stmt->bindParam(8, $data['id_number']);
        $stmt->bindParam(9, $data['principal']);
        $stmt->bindParam(10, $data['supervisor']);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for saving logs
    |------------------------------------------------------------
    */
    public function logs($username, $name, $usertype, $count){
        $query = "INSERT INTO logs (username, name, user_type, count_visit) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $usertype);
        $stmt->bindParam(4, $count);
        if($stmt->execute()){
            return $stmt;
        }
    }

}