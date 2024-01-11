<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $team_id = $_POST["team_id"];

    try {
        require_once "../dbh_inc.php";
        require_once "./delete_team_model.php";

        // delete team
        delete_team($pdo, $team_id);

        header("Location: ../../manage_team.php?delete_team=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../manage_team.php");
    die();
}
