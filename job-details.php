<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Job Details | AI Career Hub</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="css/job-details.css">

</head>

<body>
<?php
include("config/connection.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$result = mysqli_query($conn, "SELECT * FROM jobs WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("Job not found.");
}

$job = mysqli_fetch_assoc($result);
?>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                AI Career Hub
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="jobs.php">Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="auth/logout.php">Logout</a>
                    </li>

                    <li class="nav-item">
                        <button class="btn btn-warning ms-2"
                            onclick="toggleTheme()">

                            🌙 Theme

                        </button>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Hero Section -->

    <section class="hero">

        <div class="container">

            <h1><?php echo htmlspecialchars($job['title']); ?></h1>

<p>
<?php echo htmlspecialchars($job['company']); ?> •
<?php echo htmlspecialchars($job['location']); ?>
</p>
        </div>

    </section>

    <!-- Job Details -->

    <section class="container my-5">

        <div class="row">

            <!-- Left Side -->

            <div class="col-lg-8">

                <div class="card p-4">

                    <h2>Job Description</h2>

                    <p>
<?php echo nl2br(htmlspecialchars($job['description'])); ?>
</p>

                    <hr>

                    <h3>Responsibilities</h3>

                    <ul>

                        <li>Develop responsive web pages.</li>

                        <li>Create reusable UI components.</li>

                        <li>Optimize website performance.</li>

                        <li>Fix UI bugs and improve user experience.</li>

                        <li>Collaborate with backend developers.</li>

                    </ul>

                    <hr>

                    <h3>Requirements</h3>

                    <ul>

<?php

$requirements = explode(",", $job['requirements']);

foreach($requirements as $req){

echo "<li>".htmlspecialchars(trim($req))."</li>";

}

?>

</ul>

                    <hr>

                    <h3>Benefits</h3>

                    <ul>

                        <li>Competitive Salary</li>

                        <li>Remote Work Opportunity</li>

                        <li>Health Insurance</li>

                        <li>Paid Annual Leave</li>

                        <li>Career Growth</li>

                    </ul>

                </div>

            </div>

            <!-- Right Side -->

            <div class="col-lg-4">

                <div class="card p-4">

                    <h4>Job Information</h4>

                    <hr>

                    <p><strong>Company:</strong> <?php echo htmlspecialchars($job['company']); ?></p>

<p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>

<p><strong>Salary:</strong> <?php echo htmlspecialchars($job['salary']); ?></p>

<p><strong>Category:</strong> <?php echo htmlspecialchars($job['category']); ?></p>

<p><strong>Job Type:</strong> <?php echo htmlspecialchars($job['job_type']); ?></p>

<p><strong>Posted:</strong> <?php echo htmlspecialchars($job['created_at']); ?></p>

                    <button
                        class="btn btn-success w-100 mt-3"
                        onclick="applyJob()">

                        Apply Now

                    </button>

                    <button
                        class="btn btn-outline-primary w-100 mt-2"
                        onclick="saveJob()">

                        Save Job

                    </button>

                    <button
                        class="btn btn-danger w-100 mt-2"
                        onclick="clearSavedJobs()">

                        Clear Saved Jobs

                    </button>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->

    <footer class="bg-dark text-white text-center p-3">

        <p class="mb-0">

            © 2026 AI Career Hub | All Rights Reserved

        </p>

    </footer>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->

    <script src="js/job-details.js"></script>

</body>

</html>