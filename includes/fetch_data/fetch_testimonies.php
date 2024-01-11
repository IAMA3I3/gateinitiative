<?php

try {
    $query = "SELECT * FROM testimonies ORDER BY created_at DESC;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $testimonies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}