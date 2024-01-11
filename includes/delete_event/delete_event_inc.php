<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $event_id = $_POST["event_id"];
    $img = $_POST["event_img"];

    try {
        require_once "../dbh_inc.php";
        require_once "./delete_event_model.php";

        // delete img
        unlink("../../uploads/$img");

        // remove from db
        delete_event($pdo, $event_id);

        header("Location: ../../manage_events.php?delete_event=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location: ../../manage_events.php");
    die();
}
