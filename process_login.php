<?php
// Start session to manage user login state
session_start();


// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Include your database connection file
    include 'db.php';

    // Get input data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user data based on username
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if($password === $row['password']) {
            // Set session variables
            
            $_SESSION['username'] = $username;

            // Redirect to menu.php
            header("Location: menu.php");
            exit();
        } else {
            // Set error message for incorrect password
            $error = "Invalid password";
            // Add JavaScript to display alert
            echo "<script>alert('$error');  window.location.href='index.php';</script>";
            exit();
        }
    } else {
        // Set error message for user not found
        $error = "User not found";
        // Add JavaScript to display alert
        echo "<script>alert('$error');  window.location.href='index.php';</script>";
        
    }

    // Close prepared statement
    $stmt->close();
    // Close the connection
    $conn->close();
}
?>
