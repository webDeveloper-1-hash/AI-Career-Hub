<?php
session_start();
include("../config/connection.php");

// Check Request
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../login.php");
    exit();
}

// Get Form Data
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$password = trim($_POST['password']);

// Empty Validation
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Please fill in all fields.";
    header("Location: ../login.php");
    exit();
}

// Find User
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    // Verify Password
   if(password_verify($password,$user['password'])){

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['role'] = $user['role'];

    if($user['role']=="admin"){

        header("Location: ../admin/index.php");

    }else{

        header("Location: ../index.php");

    }

    exit();

}}
?>