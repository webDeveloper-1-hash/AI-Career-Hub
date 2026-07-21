// ==========================
// AI Career Hub - jobs.js
// ==========================

// Page Loaded
document.addEventListener("DOMContentLoaded", () => {
    console.log("AI Career Hub Jobs Page Loaded Successfully!");
});

// Apply Button
function applyJob(jobName) {
    alert("Application submitted successfully!\n\nJob: " + jobName);
}

// Search Jobs
function searchJobs() {

    let searchValue = document.getElementById("search").value.toLowerCase();
    let locationValue = document.getElementById("location").value.toLowerCase();

    let jobs = document.querySelectorAll(".job-card");

    jobs.forEach(job => {

        let title = job.querySelector("h4").innerText.toLowerCase();

        let location = job.querySelector("p:nth-of-type(2)")
                          .innerText
                          .replace("Location:", "")
                          .trim()
                          .toLowerCase();

        let matchTitle = title.includes(searchValue);

        let matchLocation =
            locationValue === "" ||
            location === locationValue;

        if (matchTitle && matchLocation) {

            job.style.display = "block";

        } else {

            job.style.display = "none";

        }

    });

}

// Search while typing
document.getElementById("search").addEventListener("keyup", searchJobs);

// Filter by location
document.getElementById("location").addEventListener("change", searchJobs);

// Card Hover Animation
let cards = document.querySelectorAll(".card");

cards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        card.style.transform = "translateY(-8px)";
        card.style.transition = "0.3s";

    });

    card.addEventListener("mouseleave", () => {

        card.style.transform = "translateY(0px)";

    });

});

// Welcome Message
setTimeout(() => {

    console.log("Welcome to AI Career Hub 🚀");

}, 1000);

// Scroll to Top Button (Optional)
window.addEventListener("scroll", () => {

    if (window.scrollY > 300) {

        console.log("User Scrolling...");

    }

});

// Total Jobs
const totalJobs = document.querySelectorAll(".job-card").length;

console.log("Total Jobs:", totalJobs);