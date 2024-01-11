<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "../dbh_inc.php";
        require_once "../session_config.php";
        require_once "./admin_login_model.php";
        require_once "./admin_login_contrl.php";

        // check and select admin from db
        $admin = fetch_admin($pdo, $email);

        $errors = [];

        // empty input
        if (empty_input($email, $pwd)) {
            $errors["empty_input"] = "All fields are required";
        }
        // wrong email
        if (wrong_email($admin) && !empty_input($email, $pwd)) {
            $errors["wrong_email"] = "Invalid login details";
        }
        // wrong password
        if (!wrong_email($admin) && wrong_pwd($pwd, $admin["pwd"]) && !empty_input($email, $pwd)) {
            $errors["wrong_pwd"] = "Invalid login details";
        }

        if ($errors) {
            $_SESSION["admin_login_errors"] = $errors;

            header("Location: ../../admin_login.php");

            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $admin["id"];
        session_id($sessionId);

        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin"] = $admin;

        $_SESSION["last_regeneration"] = time();

        header("Location: ../../admin.php?admin_login=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../admin_login.php");
    die();
}
