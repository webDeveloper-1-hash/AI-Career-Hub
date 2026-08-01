<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | AI Career Hub</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="css/register.css">

</head>

<body>
<?php
session_start();

if(isset($_SESSION['success'])){
    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}
?>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                AI Career Hub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

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
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="register.php">Register</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Register Section -->

    <section class="register-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <div class="register-card">

                        <h2 class="text-center mb-4">
                            Create Account
                        </h2>

                    <form action="auth/register_process.php" method="POST" id="registerForm">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>

                                
                              <input
                                    type="text"
                                    id="fullname"
                                    name="fullname"
                                    class="form-control"
                                    required> 

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Email Address</label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="Enter your email"
                                    required>

                              </div>

                              <div class="mb-3">
                                <label class="form-label">Phone Number</label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter Phone Number"
                                    required>
                            </div>

                            <div class="mb-3">

                                <label class="form-label">Password</label>

                                <div class="input-group">

                                    <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control"
                                            required>

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="togglePassword('password')">

                                        👁

                                    </button>

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Confirm Password</label>

                                <div class="input-group">

                                    <input
                                        type="password"
                                        id="confirmPassword"
                                        class="form-control"
                                        placeholder="Confirm password">

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="togglePassword('confirmPassword')">

                                        👁

                                    </button>

                                </div>

                            </div>

                            <div class="form-check mb-3">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="terms">

                                <label class="form-check-label" for="terms">

                                    I agree to the Terms & Conditions

                                </label>

                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100">

                                Register

                            </button>

                        </form>

                        <p class="text-center mt-4">

                            Already have an account?

                            <a href="login.php">

                                Login Here

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->

    <footer class="text-center">

        <p>

            © 2026 AI Career Hub | All Rights Reserved

        </p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/register.js"></script>

</body>

</html>