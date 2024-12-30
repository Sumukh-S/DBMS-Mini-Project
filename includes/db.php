<?php
$host = 'localhost';
$dbname = 'eyeweardb';
$username = 'root'; // Default XAMPP username; change if necessary.
$password = ''; // Default XAMPP password; change if necessary.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
