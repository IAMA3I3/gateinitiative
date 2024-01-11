<?php

// fetch from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_event.php";
require_once "./includes/fetch_data/fetch_blogs.php";
require_once "./includes/fetch_data/fetch_testimonies.php";

$blog_posts = [];
for ($i = 0; $i < 4; $i++) {
    if ($i >= sizeof($blogs)) {
        break;
    }
    $blog_posts[] = $blogs[$i];
}

$reversed = array_reverse($events);

$projects = [];

for ($i = (sizeof($reversed) - 1); $i > (sizeof($reversed) - 4); $i--) {
    if ($i >= 0) {
        $projects[] = $reversed[$i];
    }
}
$currentYear = date("Y");
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
        <a href="#" class="nav-brand">
            <!-- <img src="" alt="logo" class="nav-icon"> -->
            <div>GATE <span>INITIATIVE</span></div>
        </a>
        <div class="navs">
            <a href="#about" class="nav-link about">About Us</a>
            <a href="#board" class="nav-link board">Founder</a>
            <a href="#event" class="nav-link event">Projects</a>
            <a href="#blog" class="nav-link blog">Blogs</a>
            <a href="#contact" class="nav-link contact">Contact</a>
            <a href="./gallary.php" class="nav-link gallary">Gallary</a>
            <a href="./joinus.php" class="nav-link joinus">Be A Part</a>
        </div>
        <div class="menu-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>

    <!-- carousel -->
    <div id="carousel-slider" class="carousel slide mb-lg" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/img/img-3.jpg" class="d-block w-100" alt="...">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h5 class="text-lg mb-xl">GIFT ABILITY TALENT EDUCATION</h5>
                    <p class="mb-lg">Founded, 2016</p>
                    <p class="mb-lg">We believe In Inspiring, Imapacting And Influencing Our World</p>
                    <a href="#about" class="carousel-btn">GET MORE INFORMATION</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/img/img-2.jpg" class="d-block w-100" alt="...">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <h5 class="text-lg mb-xl">GATE INITIATIVE</h5>
                    <p class="mb-lg">Founded, 2016</p>
                    <p class="mb-lg">DISCOVER, DEVELOP AND EXHIBIT</p>
                    <a href="#about" class="carousel-btn">GET MORE INFORMATION</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- about -->
    <section class="mb py" id="about">
        <div class="app-container about-inner">
            <div class="abt-container">
                <img class="bg-img-lg" src="./assets/img/about-us.jpg" alt="">
                <div class="text-lg">ABOUT US</div>
                <div class="">GATE initiative is a fast growing youths led non profit organisation, founded in 2016,
                    winner
                    of 2017 best NGO Award in Kwara state,Nigeria. GATE Initiative has positively touched over 4000
                    lives in
                    different parts of Nigeria with over 100 Registered Ambassador’s.
                    <br>
                    GATE INITIATIVE is a non-profit organisation (CAC/IT 168587)
                    The organization is governed by the Board of Directors that oversees the organisation's operations.
                </div>
            </div>
            <div class="abt-sm-container">
                <img src="./assets/img/vision.jpg" alt="" class="bg-img">
                <div class="text-lg">Our Vision</div>
                <div class="">To create a world where youth will be true to themselves and proud of both their talent
                    and educational achievement.</div>
            </div>
            <div class="abt-container">
                <img src="./assets/img/mission.jpg" alt="" class="bg-img-lg">
                <div class="text-lg">Our Mission</div>
                <div class="">To encourage, educate and empower; children, teenagers, and youths in discovering,
                    developing and exhibiting their talents alongside balancing it with their education.</div>
            </div>
            <div class="abt-sm-container">
                <img src="./assets/img/objective.png" alt="" class="bg-img">
                <div class="text-lg">Our Objectives</div>
                <div class="">The foundation aim is to achieve these objectives:</div>
                <ul class="app-list">
                    <li>To identify youths with natural and exceptional potentials but lack opportunity to explore it.
                    </li>
                    <li>To ensure that these youths are trained and equipped with both their natural sills and
                        education.</li>
                    <li>To empower youths through this special initiative so that they can fit well into the labour
                        market anywhere in the world.</li>
                    <li>To partner with other youths networks to curb youths duress through sustained campaign and
                        training.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- board -->
    <section class="mb py" id="board">
        <div class="app-container">
            <div class="text-lg text-center mb-lg">The Founder</div>
            <!--  -->
            <div class="founder-cont">
                <div class="founder-img">
                    <img src="./assets/img/founder.jpg" alt="">
                </div>
                <div>
                    Adebayo George, popularly known has Mrgate is an alumnus of the sociology department, University of Ilorin and Poise graduate career finishing academy.
                    <br>
                    Adebayo believes that utilizing the potentials that are
                    offered by the energy, curiosity to learn and creative minds of the
                    young people is essential for moving forward in the right direction. As
                    such, he believes that through empowering and motivating the young
                    individuals from all strata of life, we will be able to make a difference
                    in the years to come.
                    <br>
                    Mrgate is a Multi instrumentalist, Music Director and Consultants, Leadership Coach, Public Speaker.He is the Lead music producer at TGTH Records.
                    <br>
                    Award Winner Ebute Metta Got Talents 2016 (Lagos),
                    Christian Got Talents 2019 (Ogun).
                    <br>
                    He believes in equipping, encouraging, educating and empowering young people.
                </div>
            </div>
        </div>
    </section>

    <!-- events -->
    <section class="mb py" id="event">
        <div class="app-container">
            <div class="text-lg text-center mb-lg">Our Projects</div>
            <!--  -->
            <div class="flex-container">
                <!--  -->
                <?php foreach ($projects as $project) { ?>
                    <div class="app-card">
                        <img src="./uploads/<?php echo htmlspecialchars($project["img"]) ?>" alt="">
                        <div class="inner">
                            <div class="title-text"><?php echo htmlspecialchars($project["title"]) ?></div>
                            <a href="./project_details.php?project_id=<?php echo $project["id"] ?>" class="app-btn">MORE INFORMATION</a>
                        </div>
                    </div>
                <?php } ?>
                <!--  -->
            </div>
            <!--  -->
            <div class="py-sm"></div>
            <div class="text-center">
                <a href="./projects.php" class="app-btn">MORE PROJECTS</a>
            </div>
        </div>
    </section>

    <!-- blogs -->
    <section class="py" id="blog">
        <div class="overlay"></div>
        <div class="app-container">
            <div class="text-lg text-center mb-lg">Latest Blogs</div>
            <div class="grid-2">
                <!--  -->
                <?php foreach ($blog_posts as $blog_post) { ?>
                    <div class="content">
                        <div class="title-text"><?php echo htmlspecialchars($blog_post["title"]) ?></div>
                        <div class="body"><?php echo nl2br(htmlspecialchars($blog_post["body"])) ?></div>
                        <a href="./blog_details.php?blog_id=<?php echo $blog_post["id"] ?>">READ MORE</a>
                        <div class="text-sm"><i class="fa fa-user"></i> Ambassador: <?php echo htmlspecialchars($blog_post["author"]) ?></div>
                    </div>
                <?php } ?>
                <!--  -->
            </div>
            <div class="text-center btn-container">
                <a href="./blogs.php" class="app-btn">SEE ALL BLOGS</a>
            </div>
            <!--  -->
            <!--  -->
            <section class="mb py">
                <div class="">
                    <div class="text-lg text-center mb-lg">Testimony</div>
                    <div class="image-slider">
                        <div class="slider-wrapper">
                            <div id="prev-slide" class="slider-btn slider-btn-left">&#60;</div>
                            <div class="image-list">
                                <!--  -->
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
        </div>
    </section>

    <!-- contact -->
    <section class="py" id="contact">
        <div class="app-container">
            <div class="text-lg text-center mb">Contact Us</div>
            <div class="text-center flex-container mb">
                <div class=""><i class="fa fa-phone"></i> (+234) 817 121 3421</div>
                <div class=""><i class="fa fa-phone"></i> (+234) 813 107 3818</div>
                <div class=""><i class="fa fa-envelope"></i> gateinitiative2@gmail.com</div>
            </div>
            <form action="https://formspree.io/f/xrgwwrbl" method="post" class="app-form">
                <div class="grid-2">
                    <div class="content">
                        <input type="text" name="name" id="" placeholder="Full Name">
                    </div>
                    <div class="content">
                        <input type="email" name="email" id="" placeholder="Email Address">
                    </div>
                </div>
                <textarea name="message" id="" placeholder="Your Message"></textarea>
                <button type="submit" class="app-btn"><i class="fa fa-send-o"></i> SEND</button>
            </form>
        </div>
    </section>

    <!-- footer -->
    <div class="footer py-sm">
        <div class="app-container">
            <div class="text-lg mb">
                <a target="_blank" href="https://www.facebook.com/GATEINITIA"><i class="fa-brands fa-facebook"></i></a>
                <a target="_blank" href="https://instagram.com/officialgateinitiative?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="https://x.com/gate_initiative/status/1727256003492933672?s=46&t=kLJOG1s9HzjRrrzlLOl00A"><i class="fa-brands fa-square-x-twitter"></i></a>
            </div>
            <div class="">&copy; <?php echo $currentYear ?> GATE INITIATIVE</div>
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