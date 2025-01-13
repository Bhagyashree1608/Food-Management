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
    <title>Customer Details</title>
    <style>
        body {
            background-image: url('images/detail.jpg'); /* Replace 'menuback.jpg' with your image file */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-attachment: fixed; /* Ensures the background image is fixed */
        }
 .container {
            height: 80vh;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            background: white;
            margin: 50px auto 0; /* Added margin-top of 50px */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type=text], input[type=email], input[type=tel], select, textarea {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        label {
            margin-top: 10px;
            color: #333;
        }
        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Details</h2>
        <form action="bill.php" method="post">
        <Button type="submit">Geneate Bill
        </form>
    </div>
</body>
</html>
