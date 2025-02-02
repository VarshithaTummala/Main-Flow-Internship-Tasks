<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the users from the file
    $users = json_decode(file_get_contents('users.json'), true);
    
    // Check if the username exists and the password is correct
    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }

    echo "<div class='error-message'>Invalid credentials. Please try again.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Overall body styling */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('https://miro.medium.com/v2/resize:fit:1200/1*PIs25RW-zFYGalzlzgdI9A.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 320px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: translateY(-10px);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color:rgb(95, 220, 255);
        }

        button {
            background-color:rgb(95, 242, 255);
            color: white;
            font-size: 18px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(123, 228, 254);
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
            color: #333;
        }

        .register-link a {
            color:rgb(95, 156, 255);
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color:rgb(79, 220, 255);
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
