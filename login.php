<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "SELECT * from users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($password == $row['password']) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: index.");
            } else {
                echo "Invalid Credentials";
                $showError = "Invalid Credentials";
            }
        }
    } else {
        echo "Invalid Credentials";
        $showError = "Invali Credentials";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #3e8e41;
        }

        button:focus {
            outline: none;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="checkbox" class="btn-check" onclick="ctoggle()" id="btncheck2" autocomplete="off">
                <label for="btncheck2" class="btn btn-primary mt-2">Show Password</label>
            </div>

            <button type="submit">Login</button>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="signup1.php">Create an account</a>
        </div>
    </div>
</body>
<script>
    const x = document.getElementById("password");

    function ctoggle() {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>


</html>