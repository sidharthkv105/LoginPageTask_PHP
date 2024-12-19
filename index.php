
<?php
session_start();
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Prepare SQL query to fetch user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Check if user exists and password matches the hashed one
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit;
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"  required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </form>
</body>
</html>
