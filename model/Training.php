<?php
class Training
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    /*
    |------------------------------------------------------------
    | Function for inserting Training Request into Database
    |------------------------------------------------------------
    */
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

    /*
    |------------------------------------------------------------
    | Function for showing all the list of Trainings
    |------------------------------------------------------------
    */
    public function showTraining()
    {
        $query = "SELECT * FROM training";
        $stmt = $this->connect->prepare($query);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for showing the training using ID
    |------------------------------------------------------------
    */
    public function showTrainingById($id)
    {
        $query = "SELECT * FROM training WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for showing all Training Requests
    |------------------------------------------------------------
    */
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

    /*
    |------------------------------------------------------------
    | Function for inserting Training into Database
    |------------------------------------------------------------
    */
    public function store($data = [])
    {
        $query = "INSERT INTO training(training_title, datetime, venue, project_title, facilitator, division, objectives) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $data['training_title']);
        $stmt->bindParam(2, $data['dateTime']);
        $stmt->bindParam(3, $data['venue']);
        $stmt->bindParam(4, $data['project_title']);
        $stmt->bindParam(5, $data['facilitator']);
        $stmt->bindParam(6, $data['division']);
        $stmt->bindParam(7, $data['objectives']);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Updating Training
    |------------------------------------------------------------
    */
    public function update($data = [])
    {
        $query = "UPDATE training 
                  SET training_title = ?, 
                      datetime = ?, 
                      venue = ?, 
                      project_title = ?, 
                      facilitator = ?, 
                      division = ?, 
                      objectives = ? 
                  WHERE id = ?";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $data['training_title']);
        $stmt->bindParam(2, $data['dateTime']);
        $stmt->bindParam(3, $data['venue']);
        $stmt->bindParam(4, $data['project_title']);
        $stmt->bindParam(5, $data['facilitator']);
        $stmt->bindParam(6, $data['division']);
        $stmt->bindParam(7, $data['objectives']);
        $stmt->bindParam(8, $data['id']);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Deleting Training
    |------------------------------------------------------------
    */
    public function deleteTraining($id)
    {
        $query = "DELETE FROM training WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Accepting Training Requests
    |------------------------------------------------------------
    */
    public function acceptTrainingRequest($id)
    {
        $query = "UPDATE training_request SET is_approve = '1' WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Rejecting Training Requests
    |------------------------------------------------------------
    */
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
    |------------------------------------------------------------
    | Function for Setting a Training Status As DONE
    |------------------------------------------------------------
    */
    public function setAsDone($id)
    {
        $query = "UPDATE training_request SET is_done = '1' WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return $stmt;
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Checking the Training Requests
    |------------------------------------------------------------
    */
    public function checkTrainingRequest($id, $training_title)
    {
        $query = "SELECT * FROM training_request WHERE user_id = ? AND training_title = ? AND (is_approve = '0' OR is_approve = '1' OR is_done = '1')";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $training_title);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return count($result);
        }
    }

    /*
    |------------------------------------------------------------
    | Function for Selecting User with their User ID
    |------------------------------------------------------------
    */
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
