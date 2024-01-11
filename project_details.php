<?php

if (!isset($_GET["project_id"])) {
    header("Location: ./index.php");
    die();
}

$project_id = $_GET["project_id"];

try {
    require_once "./includes/dbh_inc.php";

    $query = "SELECT * FROM events WHERE id = :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $project_id);
    $stmt->execute();

    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
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
            <a href="#" class="nav-link event active">Projects</a>
            <a href="./index.php#blog" class="nav-link blog">Blogs</a>
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
        <img src="./uploads/<?php echo $project["img"] ?>" alt="">
        <div class="overlay">
            <div class="text-xl"><?php echo htmlspecialchars($project["title"]) ?></div>
        </div>
        <!-- <a href="javascript:history.go(-1)" class="font-xl ic-btn back"><i class="fa-solid fa-arrow-left"></i></a> -->
    </div>

    <!--  -->
    <div class="py">
        <div class="app-container">
            <div class="twocolumns"><?php echo htmlspecialchars($project["description"]) ?></div>
        </div>
    </div>
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
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>