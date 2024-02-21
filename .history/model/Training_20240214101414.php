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

    public function registerTraining($data = [])
    {
        $query = "INSERT INTO training_request(user_id, training_title, datetime_request, venue, facilitator, division) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $data['user_id']);
        $stmt->bindParam(2, $data['training_title']);
        $stmt->bindParam(3, $data['dateTime']);
        $stmt->bindParam(4, $data['venue']);
        $stmt->bindParam(5, $data['facilitator']);
        $stmt->bindParam(6, $data['division']);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    public function showTraining()
    {
        $query = "SELECT * FROM training";
        $stmt = $this->connect->prepare($query);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    public function showTrainingById($id)
    {
        $query = "SELECT * FROM training WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    public function showTrainingRequest()
    {
        $query = "SELECT users.*, request.*
        FROM users
        JOIN training_request request ON request.user_id = users.id";
        $stmt = $this->connect->prepare($query);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /** Insert Training into Database **/
    public function store($training_title, $dateTime, $venue, $facilitator, $division)
    {
        $query = "INSERT INTO training(training_title, datetime, venue, facilitator, division) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $training_title);
        $stmt->bindParam(2, $dateTime);
        $stmt->bindParam(3, $venue);
        $stmt->bindParam(4, $facilitator);
        $stmt->bindParam(5, $division);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /** Update Training **/
    public function update($training_title, $dateTime, $venue, $facilitator, $division, $id)
    {
        $query = "UPDATE training SET training_title = ?, datetime = ?, venue = ?, facilitator = ?, division = ? WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $training_title);
        $stmt->bindParam(2, $dateTime);
        $stmt->bindParam(3, $venue);
        $stmt->bindParam(4, $facilitator);
        $stmt->bindParam(5, $division);
        $stmt->bindParam(6, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /** Accept Training Requests **/
    public function acceptTrainingRequest($id)
    {
        $query = "UPDATE training_request SET is_approve = '1' WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /** Reject Training Requests **/
    public function rejectTrainingRequest($id)
    {
        $query = "UPDATE training_request SET is_approve = '2' WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    public function setAsDone($id)
    {
        $query = "UPDATE training_request SET is_done = '1' WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }
    
    public function checkTrainingRequest($id, $training_title)
    {
        $query = "SELECT * FROM training_request WHERE user_id = ? AND training_title = ? AND is_approve = '0'";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $training_title);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return count($result);
        }
    }

    public function selectUserWithIDandUserID($id, $user_id)
    {
        $query = "SELECT users.*, request.*, request.created_at AS date_created
        FROM users
        JOIN training_request request ON request.user_id = users.id
        WHERE request.id = ?
        AND request.user_id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $user_id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }
}
