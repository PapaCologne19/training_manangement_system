<?php 
session_start();
require_once '../model/connect.php';
require_once '../model/Training.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);

// Register of Training
if(isset($_POST['register_btn'])){
    $user_id = $_POST['token'];
    $training_title = $_POST['training_title'];
    $dateTime = $_POST['dateTime'];
    $venue = $_POST['venue'];
    $facilitator = $_POST['facilitator'];
    $division = $_POST['division'];

    if(!empty($user_id) && !empty($training_title)
    && !empty($dateTime) && !empty($venue) 
    && !empty($facilitator) && !empty($division)){
        $insert = $Training->registerTraining($user_id, $training_title, $dateTime, $venue, $facilitator, $division);

        if($insert){
            $_SESSION['successMessage'] = "Success";
        }
        else{
            $_SESSION['errorMessage'] = "Error";
        }
        header("Location: ../views/training/index.php");
    }
    else{
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: create.php');
    }
}

// Add Training - Admin
if(isset($_POST['add_training_btn'])){
    $training_title = $_POST['training_title'];
    $dateTime = $_POST['dateTime'];
    $venue = $_POST['venue'];
    $facilitator = $_POST['facilitator'];
    $division = $_POST['division'];

    if(!empty($training_title)
    && !empty($dateTime) && !empty($venue) 
    && !empty($facilitator) && !empty($division)){
        $insert = $Training->store($training_title, $dateTime, $venue, $facilitator, $division);

        if($insert){
            $_SESSION['successMessage'] = "Success";
        }
        else{
            $_SESSION['errorMessage'] = "Error";
        }
        header("Location: ../views/admin/list_of_training.php");
    }
    else{
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: create.php');
    }
}