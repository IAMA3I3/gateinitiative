<?php

require_once "./includes/session_config.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ./admin_login.php");
    die();
}

// fetch blogs from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_blogs.php";

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
                    <a class="nav active" href="./manage_blogs.php"><i class="fa-brands fa-blogger-b"></i><span>Manage Blogs</span></a>
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
            <?php if (isset($_GET["delete_blog"]) && $_GET["delete_blog"] === "success") { ?>
                <div class="info-message" id="pop-up">
                    <div class="info-text">Post Removed</div>
                </div>
            <?php } ?>
            <!--  -->
            <div class="mb-lg"></div>
            <div class="mb font-xl">Manage Blog</div>
            <!--  -->
            <div class="card mb-lg">
                <div class="mb font-lg text-center">ADD POST</div>
                <!--  -->
                <?php if (isset($_SESSION["add_blog_errors"])) { ?>
                    <?php $errors = $_SESSION["add_blog_errors"]; ?>
                    <?php foreach ($errors as $error) { ?>
                        <div class="error-message" id="pop-up">
                            <div class="error-text"><?php echo $error ?></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  -->
                <?php if (isset($_GET["add_blog"]) && $_GET["add_blog"] === "success") { ?>
                    <div class="success-message" id="pop-up">
                        <div class="success-text">Blog added</div>
                    </div>
                <?php } ?>
                <!--  -->
                <form class="btw-y flex-input" action="./includes/add_blog/add_blog_inc.php" method="post">
                    <div>
                        <label for="title">Title</label>
                        <?php if (isset($_SESSION["add_blog_data"]["title"])) { ?>
                            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($_SESSION["add_blog_data"]["title"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="title" id="title">
                        <?php } ?>
                    </div>
                    <div>
                        <label for="body">Body</label>
                        <?php if (isset($_SESSION["add_blog_data"]["body"])) { ?>
                            <textarea name="body" id="body"><?php echo htmlspecialchars($_SESSION["add_blog_data"]["body"]) ?></textarea>
                        <?php } else { ?>
                            <textarea name="body" id="body"></textarea>
                        <?php } ?>
                    </div>
                    <div>
                        <label for="author">Author</label>
                        <?php if (isset($_SESSION["add_blog_data"]["author"])) { ?>
                            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($_SESSION["add_blog_data"]["author"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="author" id="author">
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
                <div class="mb font-lg">BLOG</div>
                <table>
                    <tr class="bold-text">
                        <td>Title</td>
                        <td>Body</td>
                        <td>Author</td>
                        <td></td>
                    </tr>
                    <!--  -->
                    <?php foreach ($blogs as $blog) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($blog["title"]) ?></td>
                            <td><?php echo htmlspecialchars($blog["body"]) ?></td>
                            <td><?php echo htmlspecialchars($blog["author"]) ?></td>
                            <td>
                                <form action="./includes/delete_blog/delete_blog_inc.php" method="post" onsubmit="return confirm('This post will be completely removed');">
                                    <input type="hidden" name="blog_id" id="blog-id" value="<?php echo htmlspecialchars($blog["id"]) ?>">
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

<?php unset($_SESSION["add_blog_errors"]) ?>
<?php unset($_SESSION["add_blog_data"]) ?>