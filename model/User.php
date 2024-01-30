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

    public function login(){
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $this->username);

        $stmt->execute();
        return $stmt;
    }

    public function register($username, $password, $firstname, $middlename, $lastname, $email_address, $division, $id_number, $principal, $supervisor)
    {
        $query = "INSERT INTO users(username, password, firstname, middlename, lastname, email_address, division, id_number, principal, supervisor) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $firstname);
        $stmt->bindParam(4, $middlename);
        $stmt->bindParam(5, $lastname);
        $stmt->bindParam(6, $email_address);
        $stmt->bindParam(7, $division);
        $stmt->bindParam(8, $id_number);
        $stmt->bindParam(9, $principal);
        $stmt->bindParam(10, $supervisor);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

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