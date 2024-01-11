<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $testimony = $_POST["testimony"];
    $author = $_POST["author"];

    try {
        require_once "../dbh_inc.php";
        require_once "./add_testimony_model.php";
        require_once "./add_testimony_contrl.php";

        $errors = [];

        // empty inputs
        if (empty_input($testimony, $author)) {
            $errors["empty_input"] = "All fields are required";
        }

        require_once "../session_config.php";
        if ($errors) {
            $_SESSION["add_testimony_errors"] = $errors;
            $add_testimony_data = [
                "testimony" => $testimony,
                "author" => $author
            ];
            $_SESSION["add_testimony_data"] = $add_testimony_data;

            header("Location: ../../manage_testimony.php");
            die();
        }

        // add testimony
        add_testimony($pdo, $testimony, $author);

        header("Location: ../../manage_testimony.php?add_testimony=success");

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
