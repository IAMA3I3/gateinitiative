<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];

    try {
        require_once "../dbh_inc.php";
        require_once "./add_team_model.php";

        $errors = [];

        // empty input
        if (empty($title)) {
            $errors["empty_input"] = "All fields are required";
        }

        require_once "../session_config.php";

        if ($errors) {
            $_SESSION["add_team_errors"] = $errors;

            header("Location: ../../manage_team.php");
            die();
        }

        // add team
        add_team($pdo, $title);

        header("Location: ../../manage_team.php?add_team=success");

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
