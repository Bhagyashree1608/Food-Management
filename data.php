<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Bills</title>
    <style>
        body {
            background-image: url('images/adback5.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h1 {
            font: 3em Times New Roman;
            font-weight: bold;
            text-align: center;
            color: #fff;
        }
        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            font: 1.5em Times New Roman;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ddd;
        }
        th {
            
            font-weight: bold;
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Total Bills</h1>
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

    // Step 2: Retrieve data from the database
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    // Step 3: Display data in a table format
    if ($result->num_rows > 0) {
        echo "<table border='10'>";
        echo "<tr><th>Bill No.</th><th>Date</th><th>Total Amount</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["billno"] . "</td><td>" . $row["date"] . "</td><td>" . $row["total_amount"] . "</td><td><a href='delete.php?id=" . $row['billno'] . "'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Step 4: Close the database connection
    $conn->close();
    ?>
</body>
</html>
