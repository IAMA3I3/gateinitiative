<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

if (!isset($_GET["user_id"])) {
    header("Location: ./users.php");
    die();
}

require_once "./includes/dbh_inc.php";

$user_id = $_GET["user_id"];

try {
    $query = "SELECT * FROM users WHERE id = :id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $user_id);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: ./users.php");
        die();
    }

    // print_r($user);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/base.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <title>gateinitiative | admin</title>
</head>

<body>
    <!--  -->
    <div class="container">
        <div class="py">
            <a href="javascript:history.go(-1)" class="font-xl"><i class="fa-solid fa-arrow-left"></i></a>
            <div class="py"></div>
            <div class="card mb-lg">
                <table>
                    <tr>
                        <td class="bold-text">Photo</td>
                        <td>
                            <div class="img-container">
                                <img src="./uploads/<?php echo htmlspecialchars($user["photo"]) ?>" alt="">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="bold-text">Name</td>
                        <td><?php echo htmlspecialchars($user["first_name"]) . " " . htmlspecialchars($user["last_name"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Gender</td>
                        <td><?php echo htmlspecialchars($user["gender"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Email</td>
                        <td><?php echo htmlspecialchars($user["email"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Phone</td>
                        <td><?php echo htmlspecialchars($user["phone"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Address</td>
                        <td><?php echo htmlspecialchars($user["address"]) . "; " . htmlspecialchars($user["city"]) . "; " . htmlspecialchars($user["state"]) . "; " . htmlspecialchars($user["country"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Website, Blog or Social Media Link</td>
                        <td><?php echo htmlspecialchars($user["social"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Date of Birth</td>
                        <td><?php echo htmlspecialchars($user["dob"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Desired Team</td>
                        <td><?php echo htmlspecialchars($user["desired_team"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Education Status</td>
                        <td><?php echo htmlspecialchars($user["education_status"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Institution</td>
                        <td><?php echo htmlspecialchars($user["institution"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Occupation</td>
                        <td><?php echo htmlspecialchars($user["occupation"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">What makes you stand out</td>
                        <td><?php echo htmlspecialchars($user["talent"]) ?></td>
                    </tr>
                    <tr>
                        <td class="bold-text">Interests / Hobbies</td>
                        <td><?php echo htmlspecialchars($user["interest"]) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <script src="https://kit.fontawesome.com/ecdfbd10f7.js" crossorigin="anonymous"></script>
</body>

</html>