<?php
session_start();
include("config/connection.php");

// Check Login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT saved_jobs.id AS saved_id,
               jobs.*
        FROM saved_jobs
        INNER JOIN jobs
        ON saved_jobs.job_id = jobs.id
        WHERE saved_jobs.user_id='$user_id'
        ORDER BY saved_jobs.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Saved Jobs | AI Career Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold" href="index.php">
AI Career Hub
</a>

<div class="ms-auto">

<a href="dashboard.php" class="btn btn-light me-2">
Dashboard
</a>

<a href="jobs.php" class="btn btn-warning me-2">
Jobs
</a>

<a href="auth/logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<h2 class="mb-4">My Saved Jobs</h2>

<?php

if(isset($_SESSION['success'])){
    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}

?>

<a href="actions/clear_saved_jobs.php"
class="btn btn-danger mb-4"
onclick="return confirm('Clear all saved jobs?')">
Clear Saved Jobs
</a>

<?php

if(mysqli_num_rows($result)>0){

while($job=mysqli_fetch_assoc($result)){

?>

<div class="card mb-3 shadow">

<div class="card-body">

<h4><?php echo htmlspecialchars($job['title']); ?></h4>

<p>

<strong>Company:</strong>

<?php echo htmlspecialchars($job['company']); ?>

</p>

<p>

<strong>Location:</strong>

<?php echo htmlspecialchars($job['location']); ?>

</p>

<p>

<strong>Salary:</strong>

<?php echo htmlspecialchars($job['salary']); ?>

</p>

<p>

<strong>Category:</strong>

<?php echo htmlspecialchars($job['category']); ?>

</p>

<a
href="job-details.php?id=<?php echo $job['id']; ?>"
class="btn btn-primary">

View Details

</a>

</div>

</div>

<?php

}

}else{

?>

<div class="alert alert-info">

No saved jobs found.

</div>

<?php

}

?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>