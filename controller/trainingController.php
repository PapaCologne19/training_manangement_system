<?php
session_start();
include '../model/connect.php';
include '../model/Training.php';
include '../http/mail.php';
include '../http/sendToGoogleSheet.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);

/*
|--------------------------------------------------------------------------
| TRAINING REQUESTS REGISTRATION
|--------------------------------------------------------------------------
| Here is where the users can request training/s. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['register_btn'])) {
    $training_id = $_POST['training_id'];
    $user_id = $_POST['token'];
    $training_title = $_POST['training_title'];
    $dateTime = $_POST['dateTime'];
    $venue = $_POST['venue'];
    $facilitator = $_POST['facilitator'];
    $division = $_POST['division'];
    $email = $_SESSION['email'];
    $fullname = $_SESSION['firstname'] . " " . $_SESSION['lastname'];


    if (
        !empty($user_id) && !empty($training_title)
        && !empty($dateTime) && !empty($venue)
        && !empty($facilitator) && !empty($division)
    ) {
        $check_request = $Training->checkTrainingRequest($user_id, $training_title);
        if ($check_request === 0) {

            $data = [
                'user_id' => $user_id,
                'training_title' => $training_title,
                'dateTime' => $dateTime,
                'venue' => $venue,
                'facilitator' => $facilitator,
                'division' => $division,
            ];
            $insert = $Training->registerTraining($data);
            if ($insert) {
                sendNotificationMail($email, $fullname);
                $_SESSION['successMessage'] = "Success";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
            header("Location: ../views/training/index.php");
        } else {
            $_SESSION['errorMessage'] = "Sorry, You are already requested.";
            header('Location: ../views/training/create.php?id=' . $training_id);
        }

    } else {
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: ../views/training/create.php?id=' . $training_id);
    }
}

/*
|--------------------------------------------------------------------------
| ADD TRAINING
|--------------------------------------------------------------------------
| Here is where you can register trainings. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['add_training_btn'])) {
    $training_title = strtoupper(trim($_POST['training_title']));
    $dateTime = $_POST['dateTime'];
    $venue = strtoupper(trim($_POST['venue']));
    $project_title = strtoupper(trim($_POST['project_title']));
    $facilitator = strtoupper(trim($_POST['facilitator']));
    $division = strtoupper(trim($_POST['division']));
    $objectives = strtoupper(trim($_POST['objectives']));

    if (
        !empty($training_title)
        && !empty($dateTime) 
        && !empty($venue)
        && !empty($facilitator) 
        && !empty($division)
        && !empty($project_title)
    ) {
        $data = [
            'training_title' => $training_title,
            'dateTime' => $dateTime,
            'venue' => $venue,
            'project_title' => $project_title,
            'facilitator' => $facilitator,
            'division' => $division,
            'objectives' => $objectives,
        ];
        $insert = $Training->store($data);

        if ($insert) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
        header("Location: ../views/admin/list_of_training.php");
    } else {
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: create.php');
    }
}

/*
|--------------------------------------------------------------------------
| UPDATE TRAINING
|--------------------------------------------------------------------------
| Here is where you can update training. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['update_training_btn'])) {
    $id = $_POST['token'];
    $training_title = strtoupper(trim($_POST['training_title']));
    $dateTime = $_POST['dateTime'];
    $venue = strtoupper(trim($_POST['venue']));
    $project_title = strtoupper(trim($_POST['project_title']));
    $facilitator = strtoupper(trim($_POST['facilitator']));
    $division = strtoupper(trim($_POST['division']));
    $objectives = strtoupper(trim($_POST['objectives']));

    if (
        !empty($training_title)
        && !empty($dateTime) 
        && !empty($venue)
        && !empty($project_title)
        && !empty($facilitator) 
        && !empty($division)
    ) {

        $data = [
            'training_title' => $training_title,
            'dateTime' => $dateTime,
            'venue' => $venue,
            'project_title' => $project_title,
            'facilitator' => $facilitator,
            'division' => $division,
            'objectives' => $objectives,
            'id' => $id,
        ];
        $update = $Training->update($data);

        if ($update) {
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
        header("Location: ../views/admin/list_of_training.php");
    } else {
        $_SESSION['errorMessage'] = "All fields are requireds!";
        header("Location: ../views/admin/edit_list_of_training.php?id=$id");
    }
}

/*
|--------------------------------------------------------------------------
| DELETE TRAINING
|--------------------------------------------------------------------------
| Here is where you can delete trainings. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['delete_training_button_click'])) {
    $delete_id = $_POST['delete_id'];

    if (!empty($delete_id)) {
        $delete = $Training->deleteTraining($delete_id);
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
}


/*
|--------------------------------------------------------------------------
| ACCEPT TRAINING REQUESTS
|--------------------------------------------------------------------------
| Here is where you can accept the training requests 
| and notify users via email. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['accept_button_click'])) {
    $id = $_POST['accept_id'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    if (!empty($id)) {
        $accept = $Training->acceptTrainingRequest($id);
        if ($accept) {
            sendApprovedMessage($email, $fullname);
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: ../views/admin/training_request.php");
    exit(0);
}

/*
|--------------------------------------------------------------------------
| REJECT TRAINING REQUESTS
|--------------------------------------------------------------------------
| Here is where you can reject training requests
| and notify the users via email. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['reject_button_click'])) {
    $id = $_POST['reject_id'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    if (!empty($id)) {
        $accept = $Training->RejectTrainingRequest($id);
        if ($accept) {
            sendRejectionMessage($email, $fullname);
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: ../views/admin/training_request.php");
    exit(0);
}


/*
|--------------------------------------------------------------------------
| SET TRAINING REQUESTS' STATUS AS 'DONE'
|--------------------------------------------------------------------------
| Here is where you can set the training requests' status as Done
| and notify the users via email. 
|--------------------------------------------------------------------------
*/
if (isset($_POST['button_click'])) {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];

    if (!empty($id)) {

        $get_data = $Training->selectUserWithIDandUserID($id, $user_id);
        if ($get_data) {
            $row = $get_data->fetch(PDO::FETCH_ASSOC);
            $data = [
                'userid1' => $user_id,
                'empid1' => $row['id_number'],
                'employee_name1' => $row['firstname'],
                'training_title1' => $row['training_title'],
                'date_of_training1' => $row['datetime_request'],
                'venue1' => $row['venue'],
                'facilitator1' => $row['facilitator'],
                'division1' => $row['division'],
                'timestamp1' => $row['date_created'],
                'done1' => 'Done',
            ];

            $done = $Training->setAsDone($id);
            insert_value($data);
            if ($done) {
                $_SESSION['successMessage'] = "Success";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
}
