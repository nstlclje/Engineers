<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "salazar";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);
?>

