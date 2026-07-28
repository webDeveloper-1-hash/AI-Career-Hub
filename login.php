<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AI Career Hub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            AI Career Hub
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>

            </ul>

        </div>

    </div>
</nav>

<section class="login-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="login-card">

                    <h2 class="text-center mb-4">Login</h2>

                    <?php
                    session_start();

                    if(isset($_SESSION['error'])){
                        echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
                        unset($_SESSION['error']);
                    }
                    ?>

                    <form id="loginForm" action="auth/login_process.php" method="POST">

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Enter Email"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Enter Password"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="togglePassword()">

                                    👁

                                </button>

                            </div>

                        </div>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                    <p class="text-center mt-3">
                        Don't have an account?
                        <a href="register.php">Register</a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<footer>
    <p>© 2026 AI Career Hub | All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/login.js"></script>

</body>
</html>