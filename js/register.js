// ================================
// AI Career Hub - Register Page
// register.js
// ================================

// Page Loaded
document.addEventListener("DOMContentLoaded", function () {

    console.log("Register Page Loaded Successfully!");

});

// Show / Hide Password
function togglePassword(id) {

    let input = document.getElementById(id);

    if (input.type === "password") {

        input.type = "text";

    } else {

        input.type = "password";

    }

}

// Register Validation
function registerUser(event) {

    event.preventDefault();

    let fullname = document.getElementById("fullname").value.trim();

    let email = document.getElementById("email").value.trim();

    let password = document.getElementById("password").value.trim();

    let confirmPassword = document.getElementById("confirmPassword").value.trim();

    let terms = document.getElementById("terms").checked;

    // Empty Fields
    if (fullname === "" || email === "" || password === "" || confirmPassword === "") {

        alert("Please fill in all fields.");

        return;

    }

    // Email Validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}$/i;

    if (!emailPattern.test(email)) {

        alert("Please enter a valid email address.");

        return;

    }

    // Password Length
    if (password.length < 6) {

        alert("Password must be at least 6 characters.");

        return;

    }

    // Password Match
    if (password !== confirmPassword) {

        alert("Passwords do not match.");

        return;

    }

    // Terms Check
    if (!terms) {

        alert("Please accept the Terms & Conditions.");

        return;

    }

    // Success
    alert("Registration Successful!");

    document.getElementById("registerForm").reset();

}

// Enter Key Support
document.addEventListener("keypress", function (event) {

    if (event.key === "Enter") {

        let form = document.getElementById("registerForm");

        if (form) {

            form.requestSubmit();

        }

    }

});