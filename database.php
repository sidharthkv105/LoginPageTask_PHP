<?php
$host = 'localhost';
$dbname = 'test';
$username = 'root';  // or your MySQL username
$password = '';      // or your MySQL password, if set
$port = '3306';      // specify the new port

try {
    // Include the port number in the DSN (Data Source Name)
    $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>