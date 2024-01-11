<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $blog_id = $_POST["blog_id"];

    try {
        require_once "../dbh_inc.php";
        require_once "./delete_blog_model.php";

        // delete blog
        delete_blog($pdo, $blog_id);

        header("Location: ../../manage_blogs.php?delete_blog=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../manage_blogs.php");
    die();
}
