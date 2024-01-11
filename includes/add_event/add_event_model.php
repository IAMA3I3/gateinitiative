<?php

declare(strict_types= 1);

// add event
function add_event(object $pdo, string $img, string $title, string $description)
{
    $query = "INSERT INTO events (img, title, description) VALUES (:img, :title, :description)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);

    $stmt->execute();
}