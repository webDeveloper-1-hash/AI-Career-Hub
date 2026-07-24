// ================================
// AI Career Hub - Login Page
// login.js
// ================================

// Page Loaded
document.addEventListener("DOMContentLoaded", function () {

    console.log("Login Page Loaded Successfully!");

});

// Show / Hide Password
function togglePassword() {

    let password = document.getElementById("password");

    if (password.type === "password") {

        password.type = "text";

    } else {

        password.type = "password";

    }

}

// Login Validation
function loginUser(event) {

    event.preventDefault();

    let email = document.getElementById("email").value.trim();

    let password = document.getElementById("password").value.trim();

    // Empty Fields
    if (email === "" || password === "") {

        alert("Please fill in all fields.");

        return;

    }

    // Email Validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (!email.match(emailPattern)) {

        alert("Please enter a valid email address.");

        return;

    }

    // Password Length
    if (password.length < 6) {

        alert("Password must be at least 6 characters.");

        return;

    }

    // Success
    alert("Login Successful!");

    document.getElementById("loginForm").reset();

}

// Enter Key Support
document.addEventListener("keypress", function (event) {

    if (event.key === "Enter") {

        let form = document.getElementById("loginForm");

        if (form) {

            form.requestSubmit();

        }

    }

});

// Welcome Message
setTimeout(function () {

    console.log("Welcome to AI Career Hub");

}, 1000);