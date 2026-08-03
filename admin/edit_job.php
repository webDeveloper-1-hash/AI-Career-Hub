<?php
session_start();
include("../config/connection.php");

// Check Job ID
if (!isset($_GET['id'])) {
    header("Location: jobs.php");
    exit();
}

$id = (int)$_GET['id'];

// Get Job Data
$result = mysqli_query($conn, "SELECT * FROM jobs WHERE id='$id'");

if (mysqli_num_rows($result) == 0) {
    die("Job not found.");
}

$job = mysqli_fetch_assoc($result);

// Update Job
if (isset($_POST['update_job'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $requirements = mysqli_real_escape_string($conn, $_POST['requirements']);
    $job_type = mysqli_real_escape_string($conn, $_POST['job_type']);

    $sql = "UPDATE jobs SET
            title='$title',
            company='$company',
            location='$location',
            salary='$salary',
            category='$category',
            description='$description',
            requirements='$requirements',
            job_type='$job_type'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['success'] = "Job updated successfully.";

        header("Location: jobs.php");
        exit();

    } else {

        $_SESSION['error'] = mysqli_error($conn);

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Job</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Edit Job</h3>

</div>

<div class="card-body">

<?php
if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>

<form method="POST">

<div class="mb-3">
<label>Job Title</label>
<input
type="text"
name="title"
class="form-control"
value="<?php echo htmlspecialchars($job['title']); ?>"
required>
</div>

<div class="mb-3">
<label>Company</label>
<input
type="text"
name="company"
class="form-control"
value="<?php echo htmlspecialchars($job['company']); ?>"
required>
</div>

<div class="mb-3">
<label>Location</label>
<input
type="text"
name="location"
class="form-control"
value="<?php echo htmlspecialchars($job['location']); ?>"
required>
</div>

<div class="mb-3">
<label>Salary</label>
<input
type="text"
name="salary"
class="form-control"
value="<?php echo htmlspecialchars($job['salary']); ?>"
required>
</div>

<div class="mb-3">
<label>Category</label>

<select name="category" class="form-select" required>

<option <?php if($job['category']=="IT") echo "selected"; ?>>IT</option>

<option <?php if($job['category']=="Web Development") echo "selected"; ?>>Web Development</option>

<option <?php if($job['category']=="AI") echo "selected"; ?>>AI</option>

<option <?php if($job['category']=="Marketing") echo "selected"; ?>>Marketing</option>

<option <?php if($job['category']=="Graphic Design") echo "selected"; ?>>Graphic Design</option>

</select>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
rows="5"
class="form-control"
required><?php echo htmlspecialchars($job['description']); ?></textarea>

</div>

<div class="mb-3">

<label>Requirements</label>

<textarea
name="requirements"
rows="4"
class="form-control"
required><?php echo htmlspecialchars($job['requirements']); ?></textarea>

</div>

<div class="mb-3">

<label>Job Type</label>

<select name="job_type" class="form-select" required>

<option <?php if($job['job_type']=="Full Time") echo "selected"; ?>>Full Time</option>

<option <?php if($job['job_type']=="Part Time") echo "selected"; ?>>Part Time</option>

<option <?php if($job['job_type']=="Internship") echo "selected"; ?>>Internship</option>

<option <?php if($job['job_type']=="Remote") echo "selected"; ?>>Remote</option>

<option <?php if($job['job_type']=="Freelance") echo "selected"; ?>>Freelance</option>

</select>

</div>

<button
type="submit"
name="update_job"
class="btn btn-primary">

Update Job

</button>

<a href="jobs.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>
</html>