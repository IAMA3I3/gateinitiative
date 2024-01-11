<?php

declare(strict_types=1);

// delete team
function delete_team(object $pdo, $team_id)
{
    $query = "DELETE FROM team WHERE id = :id;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id", $team_id);

    $stmt->execute();
}