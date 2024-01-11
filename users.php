<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

// fetch users from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_users.php";

?>

<!-- Events is now project i.e Event = project -->

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

    <div class="dashboard">
        <div class="side-bar-container">
            <div class="side-bar">
                <div class="navs">
                    <!--  -->
                    <a class="nav" href="./admin.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
                    <!--  -->
                    <a class="nav" href="./manage_events.php"><i class="fa-solid fa-calendar-days"></i><span>Manage Projects</span></a>
                    <!--  -->
                    <a class="nav" href="./manage_gallary.php"><i class="fa-solid fa-image"></i><span>Manage Gallary</span></a>
                    <!--  -->
                    <a class="nav" href="./manage_blogs.php"><i class="fa-brands fa-blogger-b"></i><span>Manage Blogs</span></a>
                    <!--  -->
                    <a class="nav" href="./manage_testimony.php"><i class="fa-solid fa-comment"></i><span>Manage Testimony</span></a>
                    <!--  -->
                    <a class="nav" href="./manage_team.php"><i class="fa-solid fa-people-roof"></i><span>Manage Team</span></a>
                    <!--  -->
                    <a class="nav active" href="./users.php"><i class="fa-solid fa-users"></i><span>Users</span></a>
                    <!--  -->
                    <!--  -->
                    <form class="logout-form" action="./includes/admin_logout/admin_logout_inc.php" method="post" onsubmit="return confirm('Do you really want to Log out?');">
                        <button type="submit" class=""><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></button>
                    </form>
                </div>
            </div>
            <div class="menu-ic">
                <i class="fa-solid fa-bars" id="bars"></i>
            </div>
        </div>

        <!--  -->
        <div class="body">
            <!--  -->
            <!--  -->
            <div class="mb-lg"></div>
            <div class="mb font-xl">Users</div>
            <!--  -->
            <!--  -->
            <div class="card mb-lg">
                <!-- <div class="mb font-lg">USERS</div> -->
                <table>
                    <tr class="bold-text">
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Desired Team</td>
                        <td></td>
                    </tr>
                    <!--  -->
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user["first_name"]) . " " . htmlspecialchars($user["last_name"]) ?></td>
                            <td><?php echo htmlspecialchars($user["phone"]) ?></td>
                            <td><?php echo htmlspecialchars($user["email"]) ?></td>
                            <td><?php echo htmlspecialchars($user["desired_team"]) ?></td>
                            <td>
                                <a href="./user_detail.php?user_id=<?php echo htmlspecialchars($user["id"]) ?>" class="btn">More Details</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <!--  -->
                </table>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ecdfbd10f7.js" crossorigin="anonymous"></script>
    <script src="./js/side-nav.js"></script>
    <script src="./js/pop.js"></script>
</body>

</html>