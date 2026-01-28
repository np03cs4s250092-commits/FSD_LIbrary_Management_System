<?php
require_once "../config/db.php";

$term = "%" . $_GET['term'] . "%";

$stmt = $pdo->prepare(
    "SELECT title FROM books WHERE title LIKE ? LIMIT 5"
);
$stmt->execute([$term]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
