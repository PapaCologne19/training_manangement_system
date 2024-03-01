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
    

    /*
    |------------------------------------------------------------
    | Function for Showing all the supervisors
    |------------------------------------------------------------
    */
    public function show()
    {
        $query = "SELECT * FROM supervisor";
        $stmt = $this->connect->prepare($query);
        if($stmt->execute()){
            return $stmt;
        }
    }

}