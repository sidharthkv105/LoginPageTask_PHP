<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="logout.php" method="POST">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <button type="submit">Logout</button>
    </form>
</body>

</html>
