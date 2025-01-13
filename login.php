<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body {
            background-image: url('images/back2.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            background-attachment: fixed; /* Ensures the background image is fixed */
        }

        .scrolling-text {
            overflow: hidden;
            white-space: nowrap;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            animation: scrolling 15s linear infinite;
        }

        .scrolling-text h1 {
            margin: 0;
        }

        @keyframes scrolling {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        /* Centering the form */
        .form-container {
             position: fixed;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%);
}

        h1 {
            text-align: center;
            color: black;
        }

        form {
            
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #000;
            color: white;
            cursor: pointer;
        }

        /* Adjust margin for submit button */
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="scrolling-text">
        <h1>!!!....Welcome To Food Management....!!!</h1>
    </div>

    <div class="form-container">
        <form method="post" action="process_login.php">
            <div class="input-container">
                <h1>Good to See You Back!!</h1>
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" value="Login">

                <a href="signup.php" >New Receptionist...?</a>
                

            </div>
        </form>
    </div>
</body>
</html>
