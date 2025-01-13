<?php
session_start(); // Start the session
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is logged in, display the welcome message and logout link
    header("Location: index.php");
    exit();
}

?>


<?php


// Clear previous bill data if needed
if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    unset($_SESSION['selected_items']);
}

// Check if there are previously selected items
if (isset($_SESSION['selected_items'])) {
    $selectedItems = $_SESSION['selected_items'];
} else {
    $selectedItems = array();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get newly selected items from the form
    $newSelectedItems = isset($_POST["selected_items"]) ? $_POST["selected_items"] : array();

    // If there are no newly selected items, clear the session
    if (empty($newSelectedItems)) {
        unset($_SESSION['selected_items']);
    } else {
        // Merge newly selected items with previously selected items in the session
        $_SESSION['selected_items'] = array_merge($selectedItems, $newSelectedItems);
    }

    // Redirect to bill page
    header("Location: bill.php");
    exit(); // Ensure script stops execution after redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <style>
        body {
            background-image: url('images/menuback.jpg'); /* Replace 'menuback.jpg' with your image file */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .food-item {
            margin: 10px;
            cursor: pointer;
            text-align: center;
        }

        .food-item img {
            width: 370px; /* Increase the size of the images */
            height: 270px; /* Increase the size of the images */
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .food-item img:hover {
            transform: scale(1.1);
        }

        .heading {
            text-align: center;
            color: Black;
            font-size: 30px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Animation for scrolling text */
        .scroll-text {
            overflow: hidden;
            white-space: nowrap;
            width: 100%; /* Ensure it takes up full width */
            animation: marquee 20s linear infinite; /* Apply animation */
            font-size: 36px; /* Increase font size */
            color: brown; /* Change color to rainbow */
            font-family: Castella; /* Change font family to Castellar */
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .scroll-text span {
            display: inline-block;
            padding-right: 100%; /* Ensure it's large enough to cause overflow */
        }
    </style>
</head>
<body>
<?php

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // User is logged in, display the welcome message and logout link
    echo '<h1 class="heading">MENUS</h1>';
    echo '<div class="welcome-message">Welcome <span style="font-weight: bold;">' . $_SESSION['username'] . '</span>, <a href="process_logout.php">logout</a></div>';

}
?>

    <!-- Add scrolling text below the menus -->
    <div class="scroll-text">
        <span>!!.. Flavors of India: Exploring the Diversity of Indian Cuisine ..!!</span>
    </div>
    <div class="container">
        <div class="row">
            <?php
            // Define an array containing food items and their corresponding image paths and URLs
            $foodItems = array(
                array("name" => "Maharashtrian Cuisine", "image" => "images/mh.jpg", "url" => "mh.php"),
                array("name" => "Gujarati Cuisine", "image" => "images/gj.jpg", "url" => "gj.php"),
                array("name" => "Rajasthani Cuisine", "image" => "images/rj.jpg", "url" => "rj.php")
            );

            // Calculate font size based on image width
            $fontSize = 0.08 * 400; // Adjust multiplier as needed

            // Loop through the first three food items array to generate HTML for each item
            foreach ($foodItems as $food) {
                echo "<div class='food-item' onclick=\"location.href='{$food['url']}'\">";
                echo "<img src='{$food['image']}' alt='{$food['name']}'>";
                echo "<div class='food-name' style='font-size: {$fontSize}px;'>{$food['name']}</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="row">
            <?php
            // Define an array containing food items and their corresponding image paths and URLs
            $foodItems = array(
                array("name" => "South Indian Cuisine", "image" => "images/si.jpg", "url" => "si.php"),
                array("name" => "Bangali Cuisine", "image" => "images/bn.jpg", "url" => "bangoli.php"),
                array("name" => "Punjabi Cuisine", "image" => "images/pn.jpg", "url" => "punjabi.php")
            );

            // Loop through the next three food items array to generate HTML for each item
            foreach ($foodItems as $food) {
                echo "<div class='food-item' onclick=\"location.href='{$food['url']}'\">";
                echo "<img src='{$food['image']}' alt='{$food['name']}'>";
                echo "<div class='food-name' style='font-size: {$fontSize}px;'>{$food['name']}</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>



</body>
</html>
