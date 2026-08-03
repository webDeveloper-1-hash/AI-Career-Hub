
<?php

include("include/head.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php


// echo $_SESSION['user_id'];
?>


     <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

        <div class="container">
<a href="auth/logout.php" class="btn btn-danger">
            Logout
        </a>
             <a>       AI Career Hub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="jobs.php">Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                </ul>

            </div> -->

        </div>

    </nav>


                       
<div class="container mt-5">

    <div class="alert alert-success">

        <h3>Welcome, <?php echo $_SESSION['fullname']; ?> 👋</h3>

        <p>You have successfully logged in to AI Career Hub.</p>

        

    </div>

</div>

<?php
include("include/footer.php");
?>