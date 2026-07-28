<?php

session_start();
include("../config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {

        $_SESSION['error'] = "Email already exists!";
        header("Location: ../register.php");
        exit();

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$hashedPassword')";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['success'] = "Registration Successful!";
            header("Location: ../login.php");

        } else {

            $_SESSION['error'] = "Registration Failed!";
            header("Location: ../register.php");

        }
    }
}
?>