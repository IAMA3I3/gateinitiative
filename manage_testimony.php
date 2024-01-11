<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

// fetch testimonies from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_testimonies.php";

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
                    <a class="nav active" href="./manage_testimony.php"><i class="fa-solid fa-comment"></i><span>Manage Testimony</span></a>
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
            <?php if (isset($_GET["delete_testimony"]) && $_GET["delete_testimony"] === "success") { ?>
                <div class="info-message" id="pop-up">
                    <div class="info-text">Testimony Removed</div>
                </div>
            <?php } ?>
            <!--  -->
            <div class="mb-lg"></div>
            <div class="mb font-xl">Manage Testimony</div>
            <!--  -->
            <div class="card mb-lg">
                <div class="mb font-lg text-center">ADD TESTIMONY</div>
                <!--  -->
                <?php if (isset($_SESSION["add_testimony_errors"])) { ?>
                    <?php $errors = $_SESSION["add_testimony_errors"] ?>
                    <?php foreach ($errors as $error) { ?>
                        <div class="error-message" id="pop-up">
                            <div class="error-text"><?php echo $error ?></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  -->
                <?php if (isset($_GET["add_testimony"]) && $_GET["add_testimony"] === "success") { ?>
                    <div class="success-message" id="pop-up">
                        <div class="success-text">Testimony added</div>
                    </div>
                <?php } ?>
                <!--  -->
                <form class="btw-y flex-input" action="./includes/add_testimony/add_testimony_inc.php" method="post">
                    <div>
                        <label for="testimony">Testimony</label>
                        <?php if (isset($_SESSION["add_testimony_data"]["testimony"])) { ?>
                            <textarea name="testimony" id="testimony"><?php echo htmlspecialchars($_SESSION["add_testimony_data"]["testimony"]) ?></textarea>
                        <?php } else { ?>
                            <textarea name="testimony" id="testimony"></textarea>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="author">Author</label>
                        <?php if (isset($_SESSION["add_testimony_data"]["author"])) { ?>
                            <input type="author" name="author" id="author" value="<?php echo htmlspecialchars($_SESSION["add_testimony_data"]["author"]) ?>">
                        <?php } else { ?>
                            <input type="author" name="author" id="author">
                        <?php } ?>
                    </div>
                    <div class="py"></div>
                    <div>
                        <button type="submit" class="btn m-auto">Upload</button>
                    </div>
                </form>
            </div>
            <!--  -->
            <div class="card mb-lg">
                <div class="mb font-lg">TESTIMONY</div>
                <table>
                    <tr class="bold-text">
                        <td>Testimony</td>
                        <td>Author</td>
                        <td></td>
                    </tr>
                    <?php foreach ($testimonies as $testimony) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($testimony["testimony"]) ?></td>
                            <td><?php echo htmlspecialchars($testimony["author"]) ?></td>
                            <td>
                                <form action="./includes/delete_testimony/delete_testimony_inc.php" method="post" onsubmit="return confirm('This testimony will be completely removed');">
                                    <input type="hidden" name="testimony_id" id="testimony-id" value="<?php echo htmlspecialchars($testimony["id"]) ?>">
                                    <button type="submit" class="btn bg-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ecdfbd10f7.js" crossorigin="anonymous"></script>
    <script src="./js/side-nav.js"></script>
    <script src="./js/pop.js"></script>
</body>

</html>

<?php ?>
<?php unset($_SESSION["add_testimony_errors"]) ?>
<?php unset($_SESSION["add_testimony_data"]) ?>