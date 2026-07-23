document.addEventListener("DOMContentLoaded", function () {

console.log("Contact Page Loaded Successfully!");

});

function sendMessage(event){

event.preventDefault();

let name=document.getElementById("name").value.trim();

let email=document.getElementById("email").value.trim();

let subject=document.getElementById("subject").value.trim();

let message=document.getElementById("message").value.trim();

if(name===""||email===""||subject===""||message===""){

alert("Please fill all fields.");

return;

}

alert("Message Sent Successfully!");

document.getElementById("contactForm").reset();

}