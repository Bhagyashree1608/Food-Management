<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php'; // Include database connection

    $username = $_POST['username'];
    $password = $_POST['password'];
    $securityKey = $_POST['security_key'];

    // Check if security key matches
    if ($securityKey !== "admin") {
        $error = "Invalid security key";
    } else {

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            // Set session variables
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['username'] = $username;
            // Redirect to menu.php
            header("Location: menu.php");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <!-- Your HTML content -->
    <div class="form-container">
        <form method="post" action="">
            <div class="input-container">
                <h1>SIGN UP</h1>
                <?php if(isset($error)): ?>
                    <p><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <label for="security_key">Security Key:</label>
                <input type="password" name="security_key" required><br>

                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>
