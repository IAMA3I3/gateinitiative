<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $talent = $_POST["talent"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $education_status = $_POST["education_status"];
    $institution = $_POST["institution"];
    $occupation = $_POST["occupation"];
    $team = $_POST["team"];
    $social = $_POST["social"];
    $interest = filter_input(INPUT_POST, 'interest', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $interest_implode = "";

    if ($interest) {
        $interest_implode = implode(", ", $interest);
    }

    $photo =  $_FILES["photo"];
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp_name = $_FILES["photo"]["tmp_name"];
    $photo_size = $_FILES["photo"]["size"];
    $photo_error = $_FILES["photo"]["error"];
    $photo_type = $_FILES["photo"]["type"];

    try {
        require_once "../dbh_inc.php";
        require_once "./signup_model.php";
        require_once "./signup_contrl.php";

        $errors = [];

        $photo_ext = explode(".", $photo_name);
        $photo_act_ext = strtolower(end($photo_ext));

        $allowed = ["jpg", "jpeg", "png"];

        if (in_array($photo_act_ext, $allowed)) {
            if ($photo_error === 0) {
                if ($photo_size < 3000000) {
                    $photo_new_name = uniqid('', true) . "." . $photo_act_ext;
                    $photo_dest = "../../uploads/" . $photo_new_name;
                    move_uploaded_file($photo_tmp_name, $photo_dest);
                } else {
                    $errors["large_size"] = "Image size is too large";
                }
            } else {
                $errors["upload_error"] = "Error uploading Image";
            }
        } else {
            $errors["invalid_type"] = "Image type is not allowed";
        }

        // empty inputs
        if (empty_input($talent, $first_name, $last_name, $gender, $dob, $address, $city, $state, $country, $phone, $email, $education_status, $team)) {
            $errors["empty_input"] = "Fill all required fields";
        }
        // first name must be letters only
        if (!empty($first_name) && not_alpha($first_name)) {
            $errors["first_name_not_alpha"] = "First name must contain letters only";
        }
        // last name must be letters only
        if (!empty($last_name) && not_alpha($last_name)) {
            $errors["last_name_not_alpha"] = "Last name must contain letters only";
        }
        // invalid email
        if (!empty($email) && invalid_email($email)) {
            $errors["invalid_email"] = "Email is invalid";
        }
        // email taken
        if (email_registered($pdo, $email)) {
            $errors["email_registered"] = "Email is already registered";
        }

        require_once "../session_config.php";

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            $signup_data = [
                "talent" => $talent,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "gender" => $gender,
                "dob" => $dob,
                "address" => $address,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "phone" => $phone,
                "email" => $email,
                "education_status" => $education_status,
                "institution" => $institution,
                "occupation" => $occupation,
                "team" => $team,
                "social" => $social
            ];
            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../../joinus.php#joinus");
            die();
        }

        // register user
        add_user($pdo, $talent, $first_name, $last_name, $gender, $dob, $address, $city, $state, $country, $phone, $email, $education_status, $institution, $occupation, $team, $social, $interest_implode, $photo_new_name);

        header("Location: ../../joinus.php?signup=success#joinus");

        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../joinus.php");
    die();
}
