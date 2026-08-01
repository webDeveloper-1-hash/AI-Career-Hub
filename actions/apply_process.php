<?php
session_start();
// die("apply_process.php is working");
include("../config/connection.php");

// Check Login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login first.";
    header("Location: ../login.php");
    exit();
}

// Check Form Submit
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../jobs.php");
    exit();
}

// Get Form Data
$user_id = (int)$_SESSION['user_id'];
$job_id = (int)$_POST['job_id'];

$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);

// Check Job Exists
$job = mysqli_query($conn, "SELECT id FROM jobs WHERE id='$job_id'");

if (mysqli_num_rows($job) == 0) {
    $_SESSION['error'] = "Job not found.";
    header("Location: ../jobs.php");
    exit();
}

// Duplicate Check
$check = mysqli_query($conn, "SELECT id FROM applications WHERE user_id='$user_id' AND job_id='$job_id'");

if (mysqli_num_rows($check) > 0) {
    $_SESSION['error'] = "You have already applied for this job.";
    header("Location: ../job-details.php?id=".$job_id);
    exit();
}

// ================= Resume Upload =================

$resume = "";

if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {

    $allowed = array("pdf","doc","docx");

    $fileName = $_FILES['resume']['name'];
    $tmpName = $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed)) {
        $_SESSION['error'] = "Only PDF, DOC and DOCX files are allowed.";
        header("Location: apply_job.php?id=".$job_id);
        exit();
    }

    if ($fileSize > 5 * 1024 * 1024) {
        $_SESSION['error'] = "Maximum file size is 5MB.";
        header("Location: apply_job.php?id=".$job_id);
        exit();
    }

    if (!is_dir("../uploads/resumes")) {
        mkdir("../uploads/resumes", 0777, true);
    }

    $resume = time() . "_" . basename($fileName);

    move_uploaded_file(
        $tmpName,
        "../uploads/resumes/" . $resume
    );
}

// ================= Insert Application =================

$sql = "INSERT INTO applications
(user_id, job_id, fullname, email, phone, cover_letter, resume, status)
VALUES
('$user_id','$job_id','$fullname','$email','$phone','$cover_letter','$resume','Pending')";

if (mysqli_query($conn, $sql)) {

    $_SESSION['success'] = "Application submitted successfully.";

} else {

    $_SESSION['error'] = "Database Error: " . mysqli_error($conn);

}

header("Location: ../job-details.php?id=".$job_id);
exit();
?>