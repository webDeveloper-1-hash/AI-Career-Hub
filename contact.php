<?php
include("include/head.php");
?>


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
    <!-- Navbar -->

   

    <!-- Hero -->

    <section class="hero">

        <div class="container">

            <h1>Contact Us</h1>

            <p>We'd love to hear from you.</p>

        </div>

    </section>

    <!-- Contact -->

    <section class="contact-section">

        <div class="container">

            <div class="row">

                <div class="col-lg-7">

                    <form action="auth/contact_process.php" method="POST">

    <input type="text"
           name="name"
           class="form-control mb-3"
           placeholder="Full Name"
           required>

    <input type="email"
           name="email"
           class="form-control mb-3"
           placeholder="Email Address"
           required>

    <input type="text"
           name="subject"
           class="form-control mb-3"
           placeholder="Subject"
           required>

    <textarea
        name="message"
        rows="5"
        class="form-control mb-3"
        placeholder="Message"
        required></textarea>

    <button type="submit" class="btn btn-primary w-100">
        Send Message
    </button>

</form>
                </div>

                <div class="col-lg-5">

                    <div class="info-card">

                        <h3>Contact Information</h3>

                        <p>📍 Karachi, Pakistan</p>

                        <p>📞 +92 300 1234567</p>

                        <p>✉ info@aicareerhub.com</p>

                        <p>🌐 www.aicareerhub.com</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Google Map -->

    <section>

        <iframe
            src="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed"
            width="100%"
            height="400"
            style="border:0;">
        </iframe>

    </section>

    <!-- Footer -->

 

<?php
include('include/footer.php');
?>