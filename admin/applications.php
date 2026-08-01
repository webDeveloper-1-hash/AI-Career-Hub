<?php
session_start();
include("../config/connection.php");

// Optional: Admin Login Check
/*
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}
*/

$sql = "SELECT
            applications.*,
            users.fullname,
            users.email,
            users.phone,
            jobs.title
        FROM applications
        INNER JOIN users ON applications.user_id = users.id
        INNER JOIN jobs ON applications.job_id = jobs.id
        ORDER BY applications.applied_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>All Applications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Job Applications</h3>

</div>

<div class="card-body">

<?php if(mysqli_num_rows($result)>0){ ?>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Applicant</th>

<th>Email</th>

<th>Phone</th>

<th>Job</th>

<th>Resume</th>

<th>Status</th>

<th>Applied At</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['fullname']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td>

<?php if(!empty($row['resume'])){ ?>

<a
href="../uploads/resumes/<?php echo urlencode($row['resume']); ?>"
class="btn btn-success btn-sm"
download>

Download Resume

</a>

<?php } else { ?>

<span class="text-danger">No Resume</span>

<?php } ?>

</td>

<td>

<?php

$status = $row['status'];

if($status=="Pending"){
    echo '<span class="badge bg-warning text-dark">Pending</span>';
}
elseif($status=="Accepted"){
    echo '<span class="badge bg-success">Accepted</span>';
}
elseif($status=="Rejected"){
    echo '<span class="badge bg-danger">Rejected</span>';
}
else{
    echo htmlspecialchars($status);
}

?>

</td>

<td><?php echo $row['applied_at']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<?php } else { ?>

<div class="alert alert-info">

No Applications Found.

</div>

<?php } ?>

</div>

</div>

</div>

</body>

</html>