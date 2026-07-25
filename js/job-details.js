// =======================================
// AI Career Hub - Job Details Page
// job-details.js
// =======================================

// Page Loaded
document.addEventListener("DOMContentLoaded", function () {

    console.log("Job Details Page Loaded Successfully!");

    loadTheme();

});

// ===============================
// Save Job
// ===============================

function saveJob() {

    const job = {
        title: "Frontend Developer",
        company: "Tech Solutions Pvt Ltd",
        location: "Karachi, Pakistan"
    };

    let savedJobs = JSON.parse(localStorage.getItem("savedJobs")) || [];

    let exists = savedJobs.some(item => item.title === job.title);

    if (exists) {

        alert("This job is already saved!");

        return;

    }

    savedJobs.push(job);

    localStorage.setItem("savedJobs", JSON.stringify(savedJobs));

    alert("Job saved successfully!");

}

// ===============================
// Apply Now
// ===============================

function applyJob() {

    alert("Application submitted successfully!");

}

// ===============================
// Dark / Light Mode
// ===============================

function toggleTheme() {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {

        localStorage.setItem("theme", "dark");

    } else {

        localStorage.setItem("theme", "light");

    }

}

function loadTheme() {

    const theme = localStorage.getItem("theme");

    if (theme === "dark") {

        document.body.classList.add("dark-mode");

    }

}

// ===============================
// View Saved Jobs
// ===============================

function viewSavedJobs() {

    let jobs = JSON.parse(localStorage.getItem("savedJobs")) || [];

    console.log("Saved Jobs:", jobs);

}

// ===============================
// Clear Saved Jobs
// ===============================

function clearSavedJobs() {

    localStorage.removeItem("savedJobs");

    alert("Saved jobs cleared!");

}

// ===============================
// Current Date
// ===============================

const today = new Date();

console.log("Today:", today.toDateString());