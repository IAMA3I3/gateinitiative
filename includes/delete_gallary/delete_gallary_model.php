<?php

declare(strict_types=1);

// remove from db
function delete_gallary(object $pdo, string $gal_img_id)
{
    $query = "DELETE FROM gallary WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $gal_img_id);
    $stmt->execute();
}