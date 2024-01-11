<?php

declare(strict_types= 1);

function delete_event(object $pdo, string $event_id)
{
    $query = "DELETE FROM events WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $event_id);
    $stmt->execute();
}