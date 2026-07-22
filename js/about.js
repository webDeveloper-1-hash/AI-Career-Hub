// ==============================
// AI Career Hub - About Page
// about.js
// ==============================

// Page Loaded
document.addEventListener("DOMContentLoaded", function () {

    console.log("About Page Loaded Successfully!");

    animateCounters();

});

// Welcome Message
setTimeout(function () {

    console.log("Welcome to AI Career Hub");

}, 1000);

// Team Member Button
function teamInfo(name) {

    alert("Welcome!\n\nTeam Member: " + name);

}

// Statistics Counter Animation
function animateCounters() {

    const counters = document.querySelectorAll(".counter");

    counters.forEach(counter => {

        const target = Number(counter.getAttribute("data-target"));

        let count = 0;

        const speed = target / 100;

        const updateCounter = () => {

            count += speed;

            if (count < target) {

                counter.innerText = Math.floor(count);

                requestAnimationFrame(updateCounter);

            } else {

                counter.innerText = target + "+";

            }

        };

        updateCounter();

    });

}

// Card Hover Effect
const cards = document.querySelectorAll(".card");

cards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        card.style.transform = "translateY(-10px)";
        card.style.transition = ".3s";

    });

    card.addEventListener("mouseleave", () => {

        card.style.transform = "translateY(0px)";

    });

});

// Scroll Message
window.addEventListener("scroll", function () {

    if (window.scrollY > 300) {

        console.log("User is scrolling...");

    }

});

// Back To Top
function backToTop() {

    window.scrollTo({

        top: 0,

        behavior: "smooth"

    });

}