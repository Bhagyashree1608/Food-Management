<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .background {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 70vh; /* Decrease the height of the background image */
            position: relative;
        }

        .centered-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 36px;
            font-weight: bold;
            color: black; /* Change color to black */
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add shadow for better visibility */
        }

        .subheading {
            font-size: 30px;
            color: black; /* Change color to black */
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.3); /* Change background color to transparent */
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white; /* Change navbar brand color to white */
            text-decoration: none;
            font-family: 'StylishFont', Ink Free, sans-serif; /* Apply the custom font */
        }

        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-nav li {
            margin-left: 20px;
        }

        .navbar-nav li a {
            color: white; /* Change navbar link color to white */
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
            padding: 5px 35px; /* Adjust padding as needed */
        }

        .navbar-nav li a:hover {
            color: #f00; /* Change hover color */
        }

        .info-container {
            display: flex;
            align-items: center;
        }

        .info {
            background-color: #fff;
            padding: 40px; /* Increased padding */
            text-align: center;
            font-size: 24px; /* Increased font size */
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
            font-family: 'Times New Roman', Times, serif; /* Change font family */
        }

        .info-content {
            flex: 1;
            padding-right: 20px;
        }

        .image {
            width: 150px; /* Adjust the width as needed */
            height: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add shadow for better visibility */
            margin: 0 auto; /* Center the image horizontally */
            display: block; /* Make the image a block element */
        }

        .card-container {
            display: flex;
            flex-wrap: wrap; /* Allow cards to wrap to the next line */
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 250px; /* Increase the width of the card */
            height: 325px; /* Increase the height of the card */
        }

        .card img {
            max-width: 70%; /* Image will scale to the width of the card */
            max-height: 70%; /* Image will scale to the height of the card */
            width: 350px; /* Ensure the image width scales proportionally */
            height:400px; /* Ensure the image height scales proportionally */
            margin-bottom: 10px; /* Add some spacing below the image */
        }
        .card-content {
            padding: 20px;
        }

        .contact-heading {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333; /* Change color as per your preference */
        }

        .popup {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: pink; /* Pink background color */
          padding: 30px; /* Increase padding for more height */
          border-radius: 10px; /* Rounded corners */
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Larger shadow */
          z-index: 1001;
          border: 2px solid #ccc; /* Border around the popup */
          text-align: center; /* Center align text */
          font-weight: bold; /* Set font weight to bold */
          font-size: 25px
      }

      .popup-logo {
          width: 100px; /* Adjust the width of the logo */
          height: auto; /* Maintain aspect ratio */
          margin-bottom: 20px; /* Add some space below the logo */
      }

        .popup-close {
            position: absolute;
            top: 5px; /* Adjust the top position */
            right: 5px; /* Adjust the right position */
            cursor: pointer;
            color: #555; /* Dark gray color */
            font-size: 20px;
        }

        .popup-close:hover {
            color: #f00; /* Red color on hover */
        }


        /* Add this CSS code */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container button {
            background-color: pink;
            color: black;
            font-size: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        .button-container button:hover {
            background-color: cyan; /* Change color to cyan on hover */
        }
    </style>
</head>
<body>

<?php
// Array of background images
$backgrounds = ['images/final.avif', 'images/iback.jpg', 'images/R.jpg'];
// Get the index of the current background image from the query string or set to 0
$currentIndex = isset($_GET['index']) ? $_GET['index'] : 0;
// Set the background image dynamically based on the current index
$backgroundImage = $backgrounds[$currentIndex % count($backgrounds)];
?>

<div class="background" style="background-image: url('<?php echo $backgroundImage; ?>')">
    <nav class="navbar">
        <a class="navbar-brand" href="#" style="font-family: 'StylishFont', Arial, sans-serif;">Restro Girls</a>
        <ul class="navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#" onclick="showPopup()">Contact Us</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>
        </ul>
    </nav>

    <div class="centered-text">
        <h1>Restro Girls</h1>
        <h2 class="subheading">We provide quality. Try us and then buy us.</h2>
    </div>
</div>

<div class="info-container">
    <div class="info">
        <div class="info-content">
            <h2 class="subheading">Restaurant Powered By Girls</h2>
            <p>Welcome to Restro Girls! We are proud to present a diverse range of authentic cuisines, each prepared with care and expertise by our team of talented women. Indulge in the flavors of India with our selection of Maharashtrian, Gujarati, Rajasthani, Bengali, South Indian, and Punjabi dishes. Whether you're craving traditional comfort food or adventurous flavors, we have something for everyone. Come experience the magic of Restro Girls!</p>
        </div>
    </div>
    <div class="image-container">
        <img src="images/doll.jpg" alt="Doll Image" class="image">
    </div>
</div>

<div class="button-container">
    <button onclick="location.href='signup.php'">Signup</button>
    <button onclick="location.href='login.php'">Login</button>
</div>

<h2 class="contact-heading">Contact Us</h2>

<div class="card-container">
    <div class="card">
        <img src="images/akshu.jpg" alt="Image 1" class="image">
        <div class="card-content">
            <p><span style="font-weight: bold;">Name:</span> Akshada Mahajan</p>
            <p><span style="font-weight: bold;">Contact Us:</span> 78410XXXXX</p>
        </div>
    </div>
    <div class="card">
        <img src="images/bhagu.jpg" alt="Image 2" class="image">
        <div class="card-content">
        <p><span style="font-weight: bold;">Name:</span> Bhagyashree Mistari</p>
        <p><span style="font-weight: bold;">Contact Us:</span> 93075XXXXX</p>
        </div>
    </div>
    <div class="card">
        <img src="images/kanchu.jpg" alt="Image 3" class="image">
        <div class="card-content">
        <p><span style="font-weight: bold;">Name:</span> Kanchan Patil</p>
        <p><span style="font-weight: bold;">Contact Us:</span> 88302XXXXX</p>
        </div>
    </div>
</div>

<!-- Popup -->
<div id="popup" class="popup">
    <span class="popup-close" onclick="hidePopup()">X</span>
    <img src="images/call.png" alt="Logo" class="popup-logo">
    <p>Scroll down for more information about contact details.</p>
</div>


<script>
    // Function to show the popup
    function showPopup() {
        document.getElementById("popup").style.display = "block";
    }

    // Function to hide the popup
    function hidePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Redirect to the same page with the next background image index every 2 seconds
    setTimeout(() => {
        window.location.href = 'index.php?index=<?php echo $currentIndex + 1; ?>';
    }, 5000);
</script>

</body>
</html>
