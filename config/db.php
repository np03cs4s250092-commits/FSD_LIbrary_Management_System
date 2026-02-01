<?php

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "library_database";
} else {
    $host = "localhost";
    $user = "np03cs4s250092";
    $pass = "DWNXH8Rbxc";
    $db   = "np03cs4s250092";
}

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}
