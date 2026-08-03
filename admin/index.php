<?php
include("auth.php");
include("../config/connection.php");
include("include/head.php");

// Statistics
$totalJobs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM jobs"))['total'];

$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];

$totalApplications = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM applications"))['total'];

$pendingApplications = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM applications WHERE status='Pending'"))['total'];
?>

<div class="container mt-4">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h1><?php echo $totalJobs; ?></h1>
                    <h5>Total Jobs</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h1><?php echo $totalUsers; ?></h1>
                    <h5>Total Users</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h1><?php echo $totalApplications; ?></h1>
                    <h5>Total Applications</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body text-center">
                    <h1><?php echo $pendingApplications; ?></h1>
                    <h5>Pending</h5>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <h3 class="mt-4">Quick Actions</h3>

    <div class="d-flex flex-wrap gap-2 mt-3">

        <a href="jobs.php" class="btn btn-primary">
            Manage Jobs
        </a>

        <a href="add-job.php" class="btn btn-success">
            Add New Job
        </a>

        <a href="applications.php" class="btn btn-warning">
            View Applications
        </a>

        <a href="users.php" class="btn btn-info">
            Manage Users
        </a>

        <a href="../auth/logout.php" class="btn btn-danger">
            Logout
        </a>

    </div>

</div>

<?php include("include/footer.php"); ?>