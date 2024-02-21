<?php
session_start();
include '../model/connect.php';
include '../model/Training.php';
include '../http/mail.php';
include '../http/sendToGoogleSheet.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);

// Register of Training
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
                '' => ,
            ];
            $insert = $Training->registerTraining($user_id, $training_title, $dateTime, $venue, $facilitator, $division);
            if ($insert) {
                sendNotificationMail($email, $fullname);
                $_SESSION['successMessage'] = "Success";
            } else {
                $_SESSION['errorMessage'] = "Error";
            }
            header("Location: ../views/training/index.php");
        } else {
            $_SESSION['errorMessage'] = "Already Requested. Please wait for the admin approval.";
            header('Location: ../views/training/create.php?id=' . $training_id);
        }

    } else {
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: ../views/training/create.php?id=' . $training_id);
    }
}

// Add Training - Admin
if (isset($_POST['add_training_btn'])) {
    $training_title = $_POST['training_title'];
    $dateTime = $_POST['dateTime'];
    $venue = $_POST['venue'];
    $facilitator = $_POST['facilitator'];
    $division = $_POST['division'];

    if (
        !empty($training_title)
        && !empty($dateTime) && !empty($venue)
        && !empty($facilitator) && !empty($division)
    ) {
        $insert = $Training->store($training_title, $dateTime, $venue, $facilitator, $division);

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

// Update Training - Admin
if (isset($_POST['update_training_btn'])) {
    $id = $_POST['token'];
    $training_title = $_POST['training_title'];
    $dateTime = $_POST['dateTime'];
    $venue = $_POST['venue'];
    $facilitator = $_POST['facilitator'];
    $division = $_POST['division'];

    if (
        !empty($training_title)
        && !empty($dateTime) && !empty($venue)
        && !empty($facilitator) && !empty($division)
    ) {
        $update = $Training->update($training_title, $dateTime, $venue, $facilitator, $division, $id);

        if ($update) {
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

// Accepting Training Request
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

// Rejecting Training Request
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

// Set as Done the Status of Training
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
                $_SESSION['errorMessage'] = "Errors";
            }
        } else {
            $_SESSION['errorMessage'] = "Errorss";
        }
    } else {
        $_SESSION['errorMessage'] = "Errorss";
    }
}