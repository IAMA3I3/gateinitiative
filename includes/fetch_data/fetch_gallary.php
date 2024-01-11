<?php

try {
    $query = "SELECT * FROM gallary ORDER BY created_at DESC;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $gallary = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
}