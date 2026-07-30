<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "ai_career_hub";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn) {
    // echo "<h2 style='color:green;'>✅ Database Connected Successfully</h2>";
} else {
    die("<h2 style='color:red;'>❌ Connection Failed: " . mysqli_connect_error() . "</h2>");
}

?>