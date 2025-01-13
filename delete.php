<?php
// Step 1: Connect to the database
$servername = "localhost"; // Change this to your database server
$username = "admin"; // Change this to your database username
$password = "admin"; // Change this to your database password
$dbname = "food_management"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Get the bill number from the URL parameter
if (isset($_GET['id'])) {
    $billNumber = $_GET['id'];

    // Step 3: Delete the corresponding row from the database
    $sql = "DELETE FROM orders WHERE billno = $billNumber";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Step 4: Close the database connection
    $conn->close();

    // Redirect back to the page displaying the table
    header("Location: data.php");
    exit();
} else {
    echo "No bill number specified";
}
?>
