<?php

declare(strict_types=1);

// add blog
function add_blog(object $pdo, string $title, string $body, string $author)
{
    $query = "INSERT INTO blog (title, body, author) VALUES (:title, :body, :author);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":body", $body);
    $stmt->bindParam(":author", $author);

    $stmt->execute();
}