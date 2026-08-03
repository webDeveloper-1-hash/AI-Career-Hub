<?php
include("include/head.php");
?>
<?php


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


    
    <script src="js/register.js"></script>

<?php
include("include/footer.php");
?>