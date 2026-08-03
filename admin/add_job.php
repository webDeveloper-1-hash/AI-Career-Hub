<?php
session_start();
include("../config/connection.php");

if(isset($_POST['add_job'])){

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $company = mysqli_real_escape_string($conn,$_POST['company']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $salary = mysqli_real_escape_string($conn,$_POST['salary']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $requirements = mysqli_real_escape_string($conn,$_POST['requirements']);
    $job_type = mysqli_real_escape_string($conn,$_POST['job_type']);

    $sql = "INSERT INTO jobs
    (title,company,location,salary,category,description,requirements,job_type)
    VALUES
    ('$title','$company','$location','$salary','$category','$description','$requirements','$job_type')";

    if(mysqli_query($conn,$sql)){
        $_SESSION['success'] = "Job added successfully.";
        header("Location: jobs.php");
        exit();
    }else{
        $_SESSION['error'] = mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Job</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Add New Job</h3>

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
<input type="text" name="title" class="form-control" required>
</div>

<div class="mb-3">
<label>Company</label>
<input type="text" name="company" class="form-control" required>
</div>

<div class="mb-3">
<label>Location</label>
<input type="text" name="location" class="form-control" required>
</div>

<div class="mb-3">
<label>Salary</label>
<input type="text" name="salary" class="form-control" required>
</div>

<div class="mb-3">
<label>Category</label>
<select name="category" class="form-select" required>
<option value="">Select Category</option>
<option>IT</option>
<option>Web Development</option>
<option>AI</option>
<option>Marketing</option>
<option>Graphic Design</option>
</select>
</div>

<div class="mb-3">
<label>Description</label>
<textarea
name="description"
rows="5"
class="form-control"
required></textarea>
</div>

<div class="mb-3">
<label>Requirements</label>
<textarea
name="requirements"
rows="4"
class="form-control"
placeholder="Example: HTML,CSS,JavaScript,PHP"
required></textarea>
</div>

<div class="mb-3">
<label>Job Type</label>

<select name="job_type" class="form-select" required>

<option value="">Select Type</option>

<option>Full Time</option>

<option>Part Time</option>

<option>Internship</option>

<option>Remote</option>

<option>Freelance</option>

</select>

</div>

<button
type="submit"
name="add_job"
class="btn btn-success">

Add Job

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