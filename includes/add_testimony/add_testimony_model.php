<?php

declare(strict_types=1);

// add testimony
function add_testimony(object $pdo, string $testimony, string $author)
{
    $query = "INSERT INTO testimonies (testimony, author) VALUES (:testimony, :author);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":testimony", $testimony);
    $stmt->bindParam(":author", $author);
    
    $stmt->execute();
}