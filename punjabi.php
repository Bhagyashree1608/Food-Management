<?php
session_start(); // Start the session
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is logged in, display the welcome message and logout link
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punjabi Cuisine Menu</title>
    <style>
        body {
            background-image: url('images/piback.jpg'); /* Replace 'menuback.jpg' with your image file */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .menu-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
            margin-right: 20px; /* Adjust as needed */
            vertical-align: top; /* Ensures items are aligned at the top */
        }

        .item-name {
            font-weight: bold;
        }

        .item-price {
            color: green;
            font-style: italic;
        }

        .item-image {
            width: 250px;
            height: 220px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 20px;
        }

        .menu-row {
            margin-bottom: 3px; /* Adjusted to reduce space between rows */
        }

        /* Add space between menu items */
        .menu-item:not(:last-child) {
            margin-right: 110px; /* Adjust as needed */
        }

        /* Center the heading */
        h1 {
            text-align: center;
        }

        /* Style the checkboxes */
        input[type='checkbox'] {
            transform: scale(1.5); /* Adjust the scale factor as needed */
        }

        /* Style the order button */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Style the order and cancel buttons */
        .order-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 25px;
        }

        .back-button {
            margin-left: 10px;
        }
        .menu-item img:hover {
            transform: scale(1.1);
        }

    </style>
</head>
<body>
    <h1>Punjabi Cuisine Menu</h1>

    <form method="post" action="pibill.php">
        <div class="menu">
            <?php
            // Define an array containing food items, their prices, and image paths
            $menuItems = array(
                array("name" => "Lassi", "price" => 80, "image" => "images/Lassi2.jpg"),
                array("name" => "Chole-Bhature", "price" => 100, "image" => "images/chole1.jpg"),
                array("name" => "Makki di roti & Sarson da saag", "price" => 150, "image" => "images/makka1.jpg"),
                array("name" => "Authentic Punjabi Thali", "price" => 300, "image" => "images/pithali1.jpg"),
                array("name" => "Paneer Tikka", "price" => 130, "image" => "images/paneer.jpg"),
                array("name" => "Rajma Chawal", "price" => 250, "image" => "images/rajma.jpg"),
                array("name" => "Aloo Paratha", "price" => 115, "image" => "images/paratha3.jpg"),
                array("name" => "Dal Makhani", "price" => 150, "image" => "images/dalmakhani.jpg"),
                array("name" => "Pindi Chana", "price" => 125, "image" => "images/pindichana.jpg"),
                array("name" => "Kulcha", "price" => 50, "image" => "images/kulcha.jpg"),
                // Add more items as needed
            );

            // Loop through the menu items array to generate HTML for each item
            $count = 0;
            foreach ($menuItems as $item) {
                if ($count % 5 == 0) {
                    echo "<div class='menu-row'>";
                }
                echo "<div class='menu-item'>";
                echo "<img src='{$item['image']}' alt='{$item['name']}' class='item-image'><br>";
                echo "<span class='item-name'>" . $item['name'] . "</span> - ";
                echo "<span class='item-price'>₹" . number_format($item['price']) . "</span>";
                echo "<br><input type='checkbox' name='selected_items[]' value='{$item['name']}' style='transform: scale(1.5);'>";
                echo "</div>";
                $count++;
                if ($count % 5 == 0) {
                    echo "</div>";
                }
            }
            ?>
        </div>
        
        <!-- Order button -->
        <div class="button-container">
            <button type="submit" class="order-button">Place Order</button>
            <button type="button" class="order-button back-button" onclick="backOrder()">Back</button>
        </div>
    </form>
    <script>
        // Function to handle back button click
        function backOrder() {
            window.location.href = 'menu.php';
        }
    </script>
</body>
</html>
