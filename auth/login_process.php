<?php
session_start();
include("../config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: ../dashboard.php");

        } else {

            $_SESSION['error'] = "Incorrect Password!";
            header("Location: ../login.php");

        }

    } else {

        $_SESSION['error'] = "Email Not Found!";
        header("Location: ../login.php");

    }
}
?>