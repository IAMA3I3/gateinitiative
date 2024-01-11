<?php

declare(strict_types=1);

// delete testimony
function delete_testimony(object $pdo, $testimony_id)
{
    $query = "DELETE FROM testimonies WHERE id = :id;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id", $testimony_id);

    $stmt->execute();
}