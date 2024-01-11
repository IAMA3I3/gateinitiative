<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gal_img_id = $_POST["gal_img_id"];
    $img = $_POST["gal_img"];

    try {
        require_once "../dbh_inc.php";
        require_once "./delete_gallary_model.php";

        // delete img
        unlink("../../uploads/$img");

        // remove from db
        delete_gallary($pdo, $gal_img_id);

        header("Location: ../../manage_gallary.php?delete_gallary=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location: ../../manage_gallary.php");
    die();
}
