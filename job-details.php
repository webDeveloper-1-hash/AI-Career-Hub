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

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="index.html">
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
                        <a class="nav-link" href="index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="jobs.html">Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
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

            <h1>Frontend Developer</h1>

            <p>

                Tech Solutions Pvt Ltd • Karachi, Pakistan

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

                        We are looking for a talented Frontend Developer who has
                        experience in HTML5, CSS3, Bootstrap 5 and JavaScript.
                        The selected candidate will build responsive and modern
                        web applications while working with our development team.

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

                        <li>HTML5</li>

                        <li>CSS3</li>

                        <li>Bootstrap 5</li>

                        <li>JavaScript ES6</li>

                        <li>Git & GitHub</li>

                        <li>Responsive Web Design</li>

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

                    <p><strong>Company:</strong> Tech Solutions Pvt Ltd</p>

                    <p><strong>Location:</strong> Karachi, Pakistan</p>

                    <p><strong>Salary:</strong> $800 - $1200</p>

                    <p><strong>Experience:</strong> 1-2 Years</p>

                    <p><strong>Job Type:</strong> Full Time</p>

                    <p><strong>Deadline:</strong> August 30, 2026</p>

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