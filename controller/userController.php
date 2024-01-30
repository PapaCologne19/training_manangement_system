<?php
session_start();
require_once '../model/connect.php';
require_once '../model/User.php';

$database = new Database();
$connect = $database->connect();

$User = new User($connect);

// For Login
if (isset($_POST['login-submit'])) {
    $User->username = $_POST['username'];
    $password = $_POST['password'];
    $count = $_POST['count'];

    $stmt = $User->login();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            switch ($row['user_type']) {
                case "USER":
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['division'] = $row['division'];
                    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];

                    // Save the logs
                    $logs = $User->logs($_SESSION['username'], $name, $_SESSION['user_type'], $count);
                    header("Location: ../views/training/index.php");
                    $_SESSION['successMessage'] = "Welcome, " . $row['firstname'];
                    break;

                case "ADMIN":
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['division'] = $row['division'];

                    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
                    // Save the logs
                    $logs = $User->logs($_SESSION['username'], $name, $_SESSION['user_type'], $count);

                    $_SESSION['successMessage'] = "Welcome, Admin " . $row['firstname'];
                    header("Location: ../views/admin/index.php");
                    break;
                default:
                    $_SESSION['errorMessage'] = "Wrong username or password";
                    header("Location: ../index.php");
                    break;
            }
        } else {
            $_SESSION['errorMessage'] = "Wrong username or password";
            header("Location: ../index.php");
            exit(0);
        }
    } else {
        $_SESSION['errorMessage'] = "No user found";
        header("Location: ../index.php");
        exit(0);
    }
}

// For Registration
if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email_address = $_POST['email_address'];
    $division = $_POST['division'];
    $id_number = $_POST['id_number'];
    $principal = $_POST['principal'];
    $supervisor = $_POST['supervisor'];


    $insert = $User->register($username, $hashedPassword, $firstname, $middlename, $lastname, $email_address, $division, $id_number, $principal, $supervisor);

    if ($insert) {
        $_SESSION['successMessage'] = "Successfully Registered";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header('location: ../index.php');
    exit(0);
}