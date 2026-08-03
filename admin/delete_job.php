<?php
session_start();
include("../config/connection.php");

// Check Job ID
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Invalid Job ID.";
    header("Location: jobs.php");
    exit();
}

$id = (int)$_GET['id'];

// Check if job exists
$check = mysqli_query($conn, "SELECT * FROM jobs WHERE id='$id'");

if (mysqli_num_rows($check) == 0) {
    $_SESSION['error'] = "Job not found.";
    header("Location: jobs.php");
    exit();
}

// Delete Job
$sql = "DELETE FROM jobs WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    $_SESSION['success'] = "Job deleted successfully.";

} else {

    $_SESSION['error'] = "Error: " . mysqli_error($conn);

}

// Redirect
header("Location: jobs.php");
exit();
?>