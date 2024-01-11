<?php

require_once "./includes/session_config.php";

// fetch team from db
require_once "./includes/dbh_inc.php";
require_once "./includes/fetch_data/fetch_team.php";

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
            <a href="./index.php#event" class="nav-link event">Projects</a>
            <a href="./index.php#blog" class="nav-link blog">Blogs</a>
            <a href="./index.php#contact" class="nav-link contact">Contact</a>
            <a href="./gallary.php" class="nav-link gallary">Gallary</a>
            <a href="#" class="nav-link joinus active">Be A Part</a>
        </div>
        <div class="menu-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>

    <!-- showcase -->
    <div class="showcase">
        <img src="./assets/img/join.jpg" alt="">
        <div class="overlay">
            <div class="text-xl">Join Us</div>
        </div>
    </div>

    <!-- donate -->
    <div class="py">
        <div class="app-container">
            <div class="donate">
                <div class="content">
                    <div class="text-lg">Donate</div>
                    <div class="text-sm mb">Will you like to support or sponsor any of our projects.
                    </div>
                    <div class="">
                        Account Number: 1224458064
                        <br>
                        Account Name: G. A. T. E INITIATIVE
                        <br>
                        Bank: Zenith Bank
                    </div>
                </div>
                <!--  -->
                <div class="content">
                    <div class="text-lg mb">Ambassadors / Volunteer</div>
                    <div class="">GATE initiative offers a unique opportunity for youths in Nigeria and across Africa to be part of a dynamic and fast-growing organization, by representing the brand on campus and in their communities.
                        <br>WHAT DOES AN AMBASSADOR DO?
                        He /she permeates the mission of GATE INITIATIVE into the lifestyle of young people in her communities.
                        Constantly seeks to identify new and innovative ways to maximize GATE INITIATIVE, Making a commitment of time, planning, combined with a bit of passion and creativity to make wonderful things happen for the GATE Initiative.

                        <br>As an Ambassador, you will gain
                        Strengthened Personal and Professional growth
                        Increased entrepreneurial and community service spirit to enhance community development among young social actors.–
                        <br>Exploration of your passion, purpose and potentials.
                        <br>– Development of your discovered Gift(s) Ability(Isa) and Talent(s) and as well discovering and boosting the hidden ones in you.
                        <br>– A network of other brilliant Ambassadors that support one another to share insights and tips they’ve used along the way.
                        <br>— Increased self-confidence, self-satisfaction, and a natural sense of accomplishment.
                        <br>– Exposure to professional organizations and internship opportunities.
                        <br>— Support and collaborations in developing ideas and bringing them to fruition in your role as Community Ambassador

                        Meetings and sessions with the GATE initiative team to plan events, share feedbacks, and chat</div>
                </div>
            </div>
        </div>
    </div>

    <!-- form -->
    <div class="mb py joinus-form" id="joinus">
        <div class="app-container">
            <!--  -->
            <?php if (isset($_SESSION["signup_errors"])) { ?>
                <?php $errors = $_SESSION["signup_errors"]; ?>
                <?php foreach ($errors as $error) { ?>
                    <div class="error-message" id="pop-up">
                        <div class="error-text"><?php echo $error ?></div>
                    </div>
                <?php } ?>
            <?php } ?>
            <!--  -->
            <?php if (isset($_GET["signup"]) && $_GET["signup"] === "success") { ?>
                <div class="success-message" id="pop-up">
                    <div class="success-text">Registered Successfully</div>
                </div>
            <?php } ?>
            <!--  -->
            <div class="text-lg">Participant Info</div>
            <form action="./includes/signup/signup_inc.php" method="post" class="app-form" enctype="multipart/form-data">
                <hr>
                <div class="flex-container">
                    <div class="label">What Makes You Stand Out?*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["talent"])) { ?>
                            <input type="text" name="talent" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["talent"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="talent" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">First Name*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["first_name"]) && !isset($_SESSION["signup_errors"]["first_name_not_alpha"])) { ?>
                            <input type="text" name="first_name" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["first_name"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="first_name" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Last Name*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["last_name"]) && !isset($_SESSION["signup_errors"]["last_name_not_alpha"])) { ?>
                            <input type="text" name="last_name" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["last_name"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="last_name" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Gender*</div>
                    <div class="input">
                        <select name="gender" id="">
                            <option value="male" <?php echo (isset($_SESSION["signup_data"]["gender"]) && $_SESSION["signup_data"]["gender"] == "male") ? "selected" : ""; ?>>Male</option>
                            <option value="female" <?php echo (isset($_SESSION["signup_data"]["gender"]) && $_SESSION["signup_data"]["gender"] == "female") ? "selected" : ""; ?>>Female</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Date of Birth*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["dob"])) { ?>
                            <input type="date" name="dob" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["dob"]) ?>">
                        <?php } else { ?>
                            <input type="date" name="dob" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Address*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["address"])) { ?>
                            <input type="text" name="address" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["address"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="address" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">City*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["city"])) { ?>
                            <input type="text" name="city" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["city"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="city" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">State*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["state"])) { ?>
                            <input type="text" name="state" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["state"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="state" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Country*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["country"])) { ?>
                            <input type="text" name="country" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["country"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="country" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Phone*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["phone"])) { ?>
                            <input type="tel" name="phone" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["phone"]) ?>">
                        <?php } else { ?>
                            <input type="tel" name="phone" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Email*</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_errors"]["invalid_email"]) && !isset($_SESSION["signup_errors"]["email_registered"])) { ?>
                            <input type="text" name="email" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["email"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="email" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Educational Status*</div>
                    <div class="input">
                        <select name="education_status" id="">
                            <option value="secondary" <?php echo (isset($_SESSION["signup_data"]["education_status"]) && $_SESSION["signup_data"]["education_status"] == "secondary") ? "selected" : ""; ?>>Secondary</option>
                            <option value="undergraduate" <?php echo (isset($_SESSION["signup_data"]["education_status"]) && $_SESSION["signup_data"]["education_status"] == "undergraduate") ? "selected" : ""; ?>>Undergraduate</option>
                            <option value="graduate" <?php echo (isset($_SESSION["signup_data"]["education_status"]) && $_SESSION["signup_data"]["education_status"] == "graduate") ? "selected" : ""; ?>>Graduate</option>
                            <option value="other" <?php echo (isset($_SESSION["signup_data"]["education_status"]) && $_SESSION["signup_data"]["education_status"] == "other") ? "selected" : ""; ?>>Other</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Institution</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["institution"])) { ?>
                            <input type="text" name="institution" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["institution"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="institution" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Occupation</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["occupation"])) { ?>
                            <input type="text" name="occupation" id="" value="" <?php echo htmlspecialchars($_SESSION["signup_data"]["occupation"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="occupation" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Desired Team*</div>
                    <div class="input">
                        <select name="team" id="">
                            <!-- Admin to create this department and populate here -->
                            <?php foreach ($teams as $team) { ?>
                                <option value="<?php echo htmlspecialchars($team["title"]) ?>" <?php echo (isset($_SESSION["signup_data"]["team"]) && $_SESSION["signup_data"]["team"] == htmlspecialchars($team["title"])) ? "selected" : ""; ?>><?php echo htmlspecialchars($team["title"]) ?></option>
                            <?php } ?>
                            <!--  -->
                        </select>
                    </div>
                </div>
                <hr>
                <div class="text-lg">Personal Info</div>
                <hr>
                <div class="flex-container">
                    <div class="label">Photo*</div>
                    <div class="input">
                        <div class="file">
                            <label class="app-btn" for="file-inp" id="upload-btn">Upload Photo</label>
                            <input type="file" name="photo" id="file-inp">
                            <span class="text-sm" id="file-name"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Website, Blog or Social Media Link</div>
                    <div class="input">
                        <?php if (isset($_SESSION["signup_data"]["social"])) { ?>
                            <input type="text" name="social" id="" value="<?php echo htmlspecialchars($_SESSION["signup_data"]["social"]) ?>">
                        <?php } else { ?>
                            <input type="text" name="social" id="">
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="flex-container">
                    <div class="label">Interests or Hobbies</div>
                    <div class="input">
                        <div class="flex-container">
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="sport" value="Sport">
                                <label for="sport">Sport</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="photography" value="Photography">
                                <label for="photography">Photography</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="art" value="ArtCraft">
                                <label for="art">Art/Crafts</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="outdoors" value="Outdoors">
                                <label for="outdoors">Outdoors</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="yoga" value="Yoga">
                                <label for="yoga">Yoga</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="music" value="Music">
                                <label for="music">Music</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="interest[]" id="cuisine" value="Cuisine">
                                <label for="cuisine">Cuisine</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="app-btn" type="submit">SIGN UP</button>
            </form>
        </div>
    </div>

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
    <script src="./src/getfilename.js"></script>
    <script src="./js/pop.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php unset($_SESSION["signup_errors"]) ?>
<?php unset($_SESSION["signup_data"]) ?>