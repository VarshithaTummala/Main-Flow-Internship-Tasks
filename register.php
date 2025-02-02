<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<div class='error-message'>Passwords do not match. Please try again.</div>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store the data in a file (users.json)
    $users = json_decode(file_get_contents('users.json'), true);
    $users[] = ['username' => $username, 'email' => $email, 'password' => $hashed_password];
    file_put_contents('users.json', json_encode($users));

    echo "<div class='success-message'>Registration successful! <a href='login.php'>Login here</a></div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #3f87a6, #ebf8e1);
            color: #333;
        }

        /* Container Styling */
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: slide-up 0.5s ease-in-out;
        }

        /* Header Styling */
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #3f87a6;
        }

        /* Form Styling */
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Input Fields Styling */
        input {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 2px solid #ddd;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        /* Focus Effect on Input Fields */
        input:focus {
            border-color: #3f87a6;
            box-shadow: 0 0 8px rgba(63, 135, 166, 0.6);
        }

        /* Submit Button Styling */
        button {
            background-color: #3f87a6;
            color: white;
            font-size: 18px;
            padding: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover Effect on Button */
        button:hover {
            background-color: #ebf8e1;
            color: #3f87a6;
        }

        /* Success and Error Messages Styling */
        .error-message, .success-message {
            font-size: 16px;
            color: #ff4f4f;
            text-align: center;
            margin-top: 20px;
        }

        .success-message {
            color: #4CAF50;
        }

        /* Link Styling */
        a {
            color: #3f87a6;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Animation for Form */
        @keyframes slide-up {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
