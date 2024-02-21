<?php
class Supervisor
{
    public $connect;
    public $username;
    public $password;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    

    // 
    public function show()
    {
        $query = "SELECT * FROM supervisor";
        $stmt = $this->connect->prepare($query);
        if($stmt->execute()){
            return $stmt;
        }
    }

}