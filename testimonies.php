<?php

header("Location: ./index.php");

// fetch projects from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_testimonies.php";

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

    <!-- showcase -->
    <!-- <div class="showcase">
        <img src="./assets/img/blog-2.jpg" alt="">
        <div class="overlay">
            <div class="text-xl">Blog</div>
        </div>
        <a href="javascript:history.go(-1)" class="font-xl ic-btn back"><i class="fa-solid fa-arrow-left"></i></a>
    </div> -->

    <!--  -->
    <section class="py" id="blog">
        <div class="overlay"></div>
        <a href="javascript:history.go(-1)" class="font-xl ic-btn back"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="app-container">
            <!--  -->
            <div class="grid-2">
                <!--  -->
                <?php foreach ($testimonies as $testimony) { ?>
                    <div class="content">
                        <div class="title-text gold">What Would You Like To Tell GATE INITIATIVE?</div>
                        <div class="body"><?php echo nl2br(htmlspecialchars($testimony["testimony"])) ?></div>
                        <a href="./testimony_details.php?testimony_id=<?php echo $testimony["id"] ?>">READ MORE</a>
                        <div class="text-sm"><i class="fa fa-user"></i> <?php echo htmlspecialchars($testimony["author"]) ?></div>
                    </div>
                <?php } ?>
                <!--  -->
            </div>
        </div>
    </section>
    <!--  -->

    <!-- footer -->
    <div class="footer py-sm">
        <div class="app-container">
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