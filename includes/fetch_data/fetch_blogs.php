<?php

try {
    $query = "SELECT * FROM blog ORDER BY created_at DESC;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}