<?php

try {
    $query = "SELECT * FROM team ORDER BY created_at DESC;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}