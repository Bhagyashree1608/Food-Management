<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include database connection file
require_once 'db.php';

// Define menu items with their prices
$menuItems = array(
    "Sandesh" => 150,
    "Mishti Doi" => 60,
    "Mughlai Paratha" => 80,
    "Authentic Bangoli Thali" => 70,
    "Alur Dum" => 100,
    "Rasgulla" => 125,
    "Mochar Ghonto" => 350,
    "Luchi" => 90,
    "Patishapata" => 230,
    "Malai Chap" => 350
    // Define your menu items here...
);

// Initialize variables
$currentDate = date('Y-m-d');
$nextBillNumber = ''; // Initialize to empty string

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selected_items"])) {
    // Get newly selected items from the form
    $newSelectedItems = $_POST["selected_items"];

    // Merge newly selected items with previously selected items in the session
    if (isset($_SESSION['selected_items'])) {
        $_SESSION['selected_items'] = array_merge($_SESSION['selected_items'], $newSelectedItems);
    } else {
        $_SESSION['selected_items'] = $newSelectedItems;
    }
    
    // Calculate total price
    $totalPrice = 0;
    foreach ($_SESSION['selected_items'] as $item) {
        if (isset($menuItems[$item])) {
            $totalPrice += $menuItems[$item];
        }
    }
    
    // Insert the order into the database
    $stmt = $conn->prepare("INSERT INTO orders (billno, date, total_amount) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $nextBillNumber, $currentDate, $totalPrice);
    $stmt->execute();
    $stmt->close();

    // Get the inserted bill number
    $nextBillNumber = $conn->insert_id;

    // Clear selected items after order confirmation
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        /* Add any necessary CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/bill.jpg'); 
            background-size: cover; /* Adjusts the background image to cover the entire container */
        }
        .container {
            max-width: 600px; /* Adjusted maximum width */
            margin: 20px auto;
            padding: 40px 20px; /* Increased padding */
            border: 20px solid #333; /* Border added */
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #555;
        }
        th {
            background-color: #f2f2f2;
            text-transform: uppercase;
        }
        .total {
            text-align: right;
        }
        .total strong {
            color: #333;
        }
        p {
            text-align: center;
            font-style: italic;
            color: #777;
        }
        /* Add additional decorations */
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 150px;
            height: auto;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
<script>
        // Function to handle back button click
        function backOrder() {
            window.location.href = 'menu.php'; // Redirect to menu.php
        }
    </script>
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Your Restaurant Logo">
        </div>
        <h2>Bill Summary</h2>
        <p>Bill Number: <?php echo $nextBillNumber; ?></p>
        <p>Date: <?php echo $currentDate; ?></p>

        <?php
        if (isset($_SESSION['selected_items']) && !empty($_SESSION['selected_items'])) {
            // Calculate total price
            $totalPrice = 0;

            // Display selected items and prices in a table
            echo "<table>";
            echo "<tr><th>Item</th><th>Price</th></tr>";
            foreach ($_SESSION['selected_items'] as $item) {
                if (isset($menuItems[$item])) {
                    echo "<tr><td>$item</td><td>₹{$menuItems[$item]}</td></tr>";
                    $totalPrice += $menuItems[$item];
                }
            }
            echo "<tr class='total'><td><strong>Total</strong></td><td><strong>₹$totalPrice</strong></td></tr>";
            echo "</table>";
        } else {
            echo "<p>No items selected.</p>";
        }
        ?>
        <div class="btn-container">
            <button class="btn" onclick="<?php unset($_SESSION['selected_items']);   ?>window.print()">Confirm Order</button>
            <button class="btn" onclick="backOrder()">Back</button>
        </div>
    </div>
</body>
</html>
