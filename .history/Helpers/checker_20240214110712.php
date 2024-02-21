<?php 

class Check{
    protected $connect = null;

    public function __construct()
    public function email($email){
        $query = "SELECT * FROM users WHERE  email_address = ?";
        $stmt = $this->connect->prepare($query);
    }
}