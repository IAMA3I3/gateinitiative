<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $testimony_id = $_POST["testimony_id"];

    try {
        require_once "../dbh_inc.php";
        require_once "./delete_testimony_model.php";

        // delete testimony
        delete_testimony($pdo, $testimony_id);

        header("Location: ../../manage_testimony.php?delete_testimony=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../manage_testimony.php");
    die();
}
