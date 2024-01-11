<?php

declare(strict_types=1);

// add team
function add_team(object $pdo, string $title)
{
    $query = "INSERT INTO team (title) VALUES (:title);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->execute();
}