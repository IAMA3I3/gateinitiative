<?php

if (!isset($_GET["blog_id"])) {
    header("Location: ./index.php");
    die();
}

$blog_id = $_GET["blog_id"];

try {
    require_once "./includes/dbh_inc.php";
    require_once "./includes/fetch_data/fetch_blogs.php";

    $query = "SELECT * FROM blog WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $blog_id);
    $stmt->execute();

    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        header("Location: ./index.php");
        die();
    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./src/base.css">
    <link rel="stylesheet" href="./src/navbar.css">
    <link rel="stylesheet" href="./src/menuicon.css">
    <link rel="stylesheet" href="./src/imgslider.css">
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>gateinitiative</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar-onscroll navbar-sticky">
        <a href="./index.php" class="nav-brand">
            <!-- <img src="" alt="logo" class="nav-icon"> -->
            <div>GATE <span>INITIATIVE</span></div>
        </a>
        <div class="navs">
            <a href="./index.php#about" class="nav-link about">About Us</a>
            <a href="./index.php#board" class="nav-link board">Founder</a>
            <a href="./index.php#event" class="nav-link event">Projects</a>
            <a href="#" class="nav-link blog active">Blogs</a>
            <a href="./index.php#contact" class="nav-link contact">Contact</a>
            <a href="./gallary.php" class="nav-link gallary">Gallary</a>
            <a href="./joinus.php" class="nav-link joinus">Be A Part</a>
        </div>
        <div class="menu-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>

    <!-- showcase -->
    <div class="showcase">
        <img src="./assets/img/blog-details.jpg" alt="">
        <div class="overlay">
            <div class="text-xl"><?php echo htmlspecialchars($blog["title"]) ?></div>
        </div>
        <!-- <a href="javascript:history.go(-1)" class="font-xl ic-btn back"><i class="fa-solid fa-arrow-left"></i></a> -->
    </div>

    <!--  -->
    <div class="py">
        <div class="app-container">
            <div class="text-sm mb"><i class="fa fa-user"></i> <?php echo htmlspecialchars($blog["author"]) ?></div>
            <div class="twocolumns"><?php echo nl2br(htmlspecialchars($blog["body"])) ?></div>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <section class="mb py donate min">
        <div class="">
            <div class="text-lg text-center mb-lg">More Blogs</div>
            <div class="image-slider">
                <div class="slider-wrapper">
                    <div id="prev-slide" class="slider-btn slider-btn-left">&#60;</div>
                    <div class="image-list">
                        <!--  -->
                        <!--  -->
                        <?php foreach ($blogs as $each_blog) { ?>
                            <div class="content">
                                <div class="title-text"><?php echo nl2br(htmlspecialchars($each_blog["title"])) ?></div>
                                <div class="body"><?php echo nl2br(htmlspecialchars($each_blog["body"])) ?></div>
                                <a href="./blog_details.php?blog_id=<?php echo $each_blog["id"] ?>">READ MORE</a>
                                <div class="text-sm"><i class="fa fa-user"></i> <?php echo htmlspecialchars($each_blog["author"]) ?></div>
                            </div>
                        <?php } ?>
                        <!--  -->
                        <!--  -->
                    </div>
                    <!--  -->
                    <div id="next-slide" class="slider-btn slider-btn-right">&#62;</div>
                </div>
                <div class="slider-scrollber">
                    <div class="scrollbar-track">
                        <div class="scrollbar-thumb"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->

    <!-- footer -->
    <div class="footer py-sm">
        <div class="app-container">
            <div class="text-lg mb">
                <a target="_blank" href="https://www.facebook.com/GATEINITIA"><i class="fa-brands fa-facebook"></i></a>
                <a target="_blank" href="https://instagram.com/officialgateinitiative?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="https://x.com/gate_initiative/status/1727256003492933672?s=46&t=kLJOG1s9HzjRrrzlLOl00A"><i class="fa-brands fa-square-x-twitter"></i></a>
            </div>
            <div class="">&copy; <?php echo date("Y") ?> GATE INITIATIVE</div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://kit.fontawesome.com/ecdfbd10f7.js" crossorigin="anonymous"></script>
    <script src="./src/script.js"></script>
    <script src="./src/active.js"></script>
    <script src="./src/imgslider.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>