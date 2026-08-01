<?php
session_start();
include("../config/connection.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login first.";
    header("Location: ../login.php");
    exit();
}

// Check job id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../jobs.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$job_id = (int) $_GET['id'];

// Check if job already saved
$check = mysqli_query($conn, "SELECT * FROM saved_jobs 
WHERE user_id='$user_id' AND job_id='$job_id'");

if (mysqli_num_rows($check) > 0) {

    $_SESSION['error'] = "Job already saved.";

} else {

    $sql = "INSERT INTO saved_jobs(user_id, job_id)
            VALUES('$user_id','$job_id')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['success'] = "Job saved successfully.";

    } else {

        $_SESSION['error'] = "Failed to save job.";

    }
}

header("Location: ../job-details.php?id=".$job_id);
exit();
?>