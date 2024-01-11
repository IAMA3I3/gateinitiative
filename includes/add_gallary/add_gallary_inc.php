<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gal_img =  $_FILES["gal_img"];
    $gal_img_name = $_FILES["gal_img"]["name"];
    $gal_img_tmp_name = $_FILES["gal_img"]["tmp_name"];
    $gal_img_size = $_FILES["gal_img"]["size"];
    $gal_img_error = $_FILES["gal_img"]["error"];
    $gal_img_type = $_FILES["gal_img"]["type"];

    try {
        require_once "../dbh_inc.php";
        require_once "./add_gallary_model.php";

        $errors = [];

        $gal_img_ext = explode(".", $gal_img_name);
        $gal_img_act_ext = strtolower(end($gal_img_ext));

        $allowed = ["jpg", "jpeg", "png"];

        if (in_array($gal_img_act_ext, $allowed)) {
            if ($gal_img_error === 0) {
                if ($gal_img_size < 3000000) {
                    $gal_img_new_name = uniqid('', true) . "." . $gal_img_act_ext;
                    $gal_img_dest = "../../uploads/" . $gal_img_new_name;
                    move_uploaded_file($gal_img_tmp_name, $gal_img_dest);
                } else {
                    $errors["large_size"] = "Image size is too large";
                }
            } else {
                $errors["upload_error"] = "Error uploading Image";
            }
        } else {
            $errors["invalid_type"] = "Image type is not allowed";
        }

        require_once "../session_config.php";

        if ($errors) {
            $_SESSION["add_gallary_errors"] = $errors;

            header("Location: ../../manage_gallary.php");
            die();
        }

        // add gallary
        add_gallary($pdo, $gal_img_new_name);

        header("Location: ../../manage_gallary.php?add_gallary=success");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../manage_gallary.php");
    die();
}
