<?php
session_start();
include("../config/connection.php");

// Check Login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Please login first.";
    header("Location: ../login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];

// Get User
$userQuery = mysqli_query($conn, "SELECT fullname,email,phone FROM users WHERE id='$user_id'");

if (!$userQuery || mysqli_num_rows($userQuery) == 0) {
    die("User not found.");
}

$userData = mysqli_fetch_assoc($userQuery);

// Check Job ID
if (!isset($_GET['id'])) {
    die("Invalid Job.");
}

$job_id = (int)$_GET['id'];

// Get Job
$jobQuery = mysqli_query($conn, "SELECT * FROM jobs WHERE id='$job_id'");

if (!$jobQuery || mysqli_num_rows($jobQuery) == 0) {
    die("Job not found.");
}

$job = mysqli_fetch_assoc($jobQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Apply Job</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Apply for Job</h3>

</div>

<div class="card-body">

<?php
if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<h4><?php echo htmlspecialchars($job['title']); ?></h4>

<p class="text-muted">
<?php echo htmlspecialchars($job['company']); ?> |
<?php echo htmlspecialchars($job['location']); ?>
</p>

<hr>

<form action="apply_process.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">

<div class="mb-3">

<label class="form-label">Full Name</label>

<input
type="text"
name="fullname"
class="form-control"
value="<?php echo htmlspecialchars($userData['fullname']); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo htmlspecialchars($userData['email']); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($userData['phone']); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">Cover Letter</label>

<textarea
name="cover_letter"
rows="6"
class="form-control"
placeholder="Write your cover letter..."
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">Upload Resume</label>

<input
type="file"
name="resume"
class="form-control"
accept=".pdf,.doc,.docx"
required>

<small class="text-muted">
Only PDF, DOC and DOCX (Max 5MB)
</small>

</div>

<div class="d-grid gap-2">

<button type="submit" class="btn btn-success">
Submit Application
</button>

<a href="../job-details.php?id=<?php echo $job['id']; ?>" class="btn btn-secondary">
Back
</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>