<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

$admin = $_SESSION["admin"];

// fetch data from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_users.php";
require_once "./includes/fetch_data/fetch_event.php";
require_once "./includes/fetch_data/fetch_team.php";
require_once "./includes/fetch_data/fetch_blogs.php";
require_once "./includes/fetch_data/fetch_testimonies.php";
require_once "./includes/fetch_data/fetch_gallary.php";

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
                    <a class="nav active" href="./admin.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
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
                    <a class="nav" href="./users.php"><i class="fa-solid fa-users"></i><span>Users</span></a>
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
            <?php if (isset($_GET["admin_login"]) && $_GET["admin_login"] === "success") { ?>
                <div class="success-message" id="pop-up">
                    <div class="success-text">Logged In</div>
                </div>
            <?php } ?>
            <!--  -->
            <div class="mb-lg"></div>
            <div class="mb-sm font-xl">Dashboard</div>
            <div class="mb-xl"><?php echo htmlspecialchars($admin["first_name"]) . " " . htmlspecialchars($admin["last_name"]); ?></div>
            <div class="flex gap">
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Users</div>
                    <div class="font-xl mb-sm"><?php echo count($users) ?></div>
                    <hr class="mb">
                    <a href="./users.php"><i class="fa-solid fa-users"></i><span>Users</span></a>
                </div>
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Projects</div>
                    <div class="font-xl mb-sm"><?php echo count($events) ?></div>
                    <hr class="mb">
                    <a href="./manage_events.php"><i class="fa-solid fa-calendar-days"></i><span>Manage Projects</span></a>
                </div>
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Team</div>
                    <div class="font-xl mb-sm"><?php echo count($teams) ?></div>
                    <hr class="mb">
                    <a href="./manage_team.php"><i class="fa-solid fa-people-roof"></i><span>Manage Team</span></a>
                </div>
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Blog Post</div>
                    <div class="font-xl mb-sm"><?php echo count($blogs) ?></div>
                    <hr class="mb">
                    <a href="./manage_blogs.php"><i class="fa-brands fa-blogger-b"></i><span>Manage Blogs</span></a>
                </div>
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Testimonies</div>
                    <div class="font-xl mb-sm"><?php echo count($testimonies) ?></div>
                    <hr class="mb">
                    <a href="./manage_testimony.php"><i class="fa-solid fa-comment"></i><span>Manage Testimony</span></a>
                </div>
                <!--  -->
                <div class="card mb text-center">
                    <div class="font-lg mb-sm">Gallary Images</div>
                    <div class="font-xl mb-sm"><?php echo count($gallary) ?></div>
                    <hr class="mb">
                    <a href="./manage_gallary.php"><i class="fa-solid fa-image"></i><span>Manage Gallary</span></a>
                </div>
                <!--  -->
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ecdfbd10f7.js" crossorigin="anonymous"></script>
    <script src="./js/side-nav.js"></script>
    <script src="./js/pop.js"></script>
</body>

</html>