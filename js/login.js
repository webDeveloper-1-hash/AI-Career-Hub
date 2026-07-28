document.addEventListener("DOMContentLoaded", () => {
    console.log("Login Page Loaded");
});

function togglePassword() {

    let password = document.getElementById("password");

    if(password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }

}