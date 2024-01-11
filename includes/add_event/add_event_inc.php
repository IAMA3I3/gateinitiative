<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $img = $_FILES["img"];
    $img_name = $_FILES["img"]["name"];
    $img_tmp_name = $_FILES["img"]["tmp_name"];
    $img_size = $_FILES["img"]["size"];
    $img_error = $_FILES["img"]["error"];
    $img_type = $_FILES["img"]["type"];

    try {
        require_once "../dbh_inc.php";
        require_once "./add_event_model.php";
        require_once "./add_event_contrl.php";

        $errors = [];

        $img_ext = explode(".", $img_name);
        $img_act_ext = strtolower(end($img_ext));

        $allowed = ["jpg", "jpeg", "png"];

        if (in_array($img_act_ext, $allowed)) {
            if ($img_error === 0) {
                if ($img_size < 3000000) {
                    $img_new_name = uniqid('', true) . "." . $img_act_ext;
                    $img_dest = "../../uploads/".$img_new_name;
                    move_uploaded_file($img_tmp_name, $img_dest);
                } else {
                    $errors["large_size"] = "Image size is too large";
                }
            } else {
                $errors["upload_error"] = "Error uploading Image";
            }
        } else {
            $errors["invalid_type"] = "Image type is not allowed";
        }

        // empty input
        if (empty_input($title, $description)) {
            $errors["empty_input"] = "All fields are required";
        }

        require_once "../session_config.php";

        if ($errors) {
            $_SESSION["add_event_errors"] = $errors;
            $add_event_data = [
                "title" => $title,
                "description" => $description,
                "date" => $date,
                "venue" => $venue
            ];
            $_SESSION["add_event_data"] = $add_event_data;

            header("Location: ../../manage_events.php");
            die();
        }

        // add event
        add_event($pdo, $img_new_name, $title, $description);

        header("Location: ../../manage_events.php?add_event=success");

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
