<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_event.php";

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
                    <a class="nav active" href="./manage_events.php"><i class="fa-solid fa-calendar-days"></i><span>Manage Projects</span></a>
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
            <?php if (isset($_GET["delete_event"]) && $_GET["delete_event"] === "success") { ?>
                <div class="info-message" id="pop-up">
                    <div class="info-text">Project Deleted</div>
                </div>
            <?php } ?>
            <!--  -->
            <div class="mb-lg"></div>
            <div class="mb-lg font-xl">Manage Projects</div>
            <!--  -->
            <div class="card mb-lg">
                <div class="mb font-lg text-center">ADD PROJECT</div>
                <!--  -->
                <?php if (isset($_SESSION["add_event_errors"])) { ?>
                    <?php $errors = $_SESSION["add_event_errors"]; ?>

                    <?php foreach ($errors as $error) { ?>
                        <div class="error-message" id="pop-up">
                            <div class="error-text"><?php echo $error ?></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  -->
                <?php if (isset($_GET["add_event"]) && $_GET["add_event"] === "success") { ?>
                    <div class="success-message" id="pop-up">
                        <div class="success-text">Project added</div>
                    </div>
                <?php } ?>
                <!--  -->
                <form class="btw-y flex-input" action="./includes/add_event/add_event_inc.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="img">Project Image</label>
                        <input type="file" name="img" id="img">
                    </div>
                    <div>
                        <label for="title">Title</label>
                        <?php if (isset($_SESSION["add_event_data"]["title"])) { ?>
                            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($_SESSION["add_event_data"]["title"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="title" id="title">
                        <?php } ?>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <?php if (isset($_SESSION["add_event_data"]["description"])) { ?>
                            <textarea name="description" id="description"><?php echo htmlspecialchars($_SESSION["add_event_data"]["description"]) ?></textarea>
                        <?php } else { ?>
                            <textarea name="description" id="description"></textarea>
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
                <div class="mb font-lg">PROJECTS</div>
                <table>
                    <tr class="bold-text">
                        <td>Image</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td></td>
                    </tr>
                    <?php foreach ($events as $event) { ?>
                        <tr>
                            <td>
                                <img src="./uploads/<?php echo htmlspecialchars($event["img"]) ?>" alt="">
                            </td>
                            <td>
                                <?php echo htmlspecialchars($event["title"]) ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($event["description"]) ?>
                            </td>
                            <td>
                                <form action="./includes/delete_event/delete_event_inc.php" method="post" onsubmit="return confirm('This event will be completely removed');">
                                    <input type="hidden" name="event_id" id="event-id" value="<?php echo htmlspecialchars($event["id"]) ?>">
                                    <input type="hidden" name="event_img" id="event-img" value="<?php echo htmlspecialchars($event["img"]) ?>">
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

<?php unset($_SESSION["add_event_errors"]) ?>
<?php unset($_SESSION["add_event_data"]) ?>