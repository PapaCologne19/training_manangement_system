<?php
session_start();
include '../model/connect.php';
include '../model/Training.php';
include '../mail/mail.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);

// Register of Training
if (isset($_POST['register_btn'])) {
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
        $insert = $Training->registerTraining($user_id, $training_title, $dateTime, $venue, $facilitator, $division);

        if ($insert) {
            sendNotificationMail($email, $fullname);
            $_SESSION['successMessage'] = "Success";
        } else {
            $_SESSION['errorMessage'] = "Error";
        }
        header("Location: ../views/training/index.php");
    } else {
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: create.php');
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