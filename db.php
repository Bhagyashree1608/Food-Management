<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Establish connection to your database (assuming MySQL)
    $servername = "localhost"; // Change this to your database server
    $username = "admin"; // Change this to your database username
    $password = "admin"; // Change this to your database password
    $dbname = "food_management"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
    ?>