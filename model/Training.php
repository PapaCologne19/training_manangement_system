<?php
class Training
{
    public $connect;
    public $username;
    public $password;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function registerTraining($user_id, $training_title, $dateTime, $venue, $facilitator, $division)
    {
        $query = "INSERT INTO training_request(user_id, training_title, datetime_request, venue, facilitator, division) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $training_title);
        $stmt->bindParam(3, $dateTime);
        $stmt->bindParam(4, $venue);
        $stmt->bindParam(5, $facilitator);
        $stmt->bindParam(6, $division);

        if($stmt->execute()){
            return $stmt;
        }
    }

    public function showTrainingRequest(){
        $query = "SELECT users.*, request.*
        FROM users
        JOIN training_request request ON request.user_id = users.id";
        $stmt = $this->connect->prepare($query);
        if($stmt->execute()){
            return $stmt;
        }
    }

    public function showTraining(){
        $query = "SELECT * FROM training";
        $stmt = $this->connect->prepare($query);
        if($stmt->execute()){
            return $stmt;
        }
    }

    public function store($training_title, $dateTime, $venue, $facilitator, $division)
    {
        $query = "INSERT INTO training(training_title, datetime, venue, facilitator, division) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $training_title);
        $stmt->bindParam(2, $dateTime);
        $stmt->bindParam(3, $venue);
        $stmt->bindParam(4, $facilitator);
        $stmt->bindParam(5, $division);

        if($stmt->execute()){
            return $stmt;
        }
    }
}