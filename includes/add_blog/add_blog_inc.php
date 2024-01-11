<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $body = $_POST["body"];
    $author = $_POST["author"];

    try {
        require_once "../dbh_inc.php";
        require_once "./add_blog_model.php";
        require_once "./add_blog_contrl.php";

        $errors = [];

        // empty inputs
        if (empty_input($title, $body, $author)) {
            $errors["empty_input"] = "All fields are required";
        }

        require_once "../session_config.php";
        if ($errors) {
            $_SESSION["add_blog_errors"] = $errors;
            $add_blog_data = [
                "title" => $title,
                "body" => $body,
                "author" => $author
            ];
            $_SESSION["add_blog_data"] = $add_blog_data;

            header("Location: ../../manage_blogs.php");
            die();
        }

        // add blog
        add_blog($pdo, $title, $body, $author);

        header("Location: ../../manage_blogs.php?add_blog=success");

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
