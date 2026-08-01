<?php
session_start();
include("../config/connection.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login first.";
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Delete all saved jobs for this user
$sql = "DELETE FROM saved_jobs WHERE user_id='$user_id'";

if (mysqli_query($conn, $sql)) {

    $_SESSION['success'] = "All saved jobs have been cleared.";

} else {

    $_SESSION['error'] = "Failed to clear saved jobs.";

}

// Redirect to Saved Jobs page
header("Location: ../actions/saved-jobs.php");
exit();
?>