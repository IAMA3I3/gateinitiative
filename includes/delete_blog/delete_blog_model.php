<?php

declare(strict_types=1);

// delete blog
function delete_blog(object $pdo, $blog_id)
{
    $query = "DELETE FROM blog WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $blog_id);

    $stmt->execute();
}