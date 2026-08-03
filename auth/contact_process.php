<?php
session_start();
include("../config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contacts(name,email,subject,message)
            VALUES('$name','$email','$subject','$message')";

    if(mysqli_query($conn,$sql)){
        $_SESSION['success'] = "Message sent successfully.";
    }else{
        $_SESSION['error'] = "Message not sent.";
    }

    header("Location: ../contact.php");
    exit();
}
?>