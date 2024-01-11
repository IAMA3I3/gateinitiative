<?php

require_once "./includes/session_config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/base.css">
    <title>gateinitiative | admin</title>
</head>

<body>
    <div class="form-page">
        <div class="form-card-container">
            <div class="title"><span>GATE</span> INITIATIVE</div>
            <div class="form-card">
                <div class="font-lg mb">LOGIN AS ADMIN</div>
                <!--  -->
                <?php if (isset($_SESSION["admin_login_errors"])) { ?>
                    <?php $errors = $_SESSION["admin_login_errors"]; ?>

                    <?php foreach ($errors as $error) { ?>
                        <div class="error-message" id="pop-up">
                            <div class="error-text"><?php echo $error ?></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--  -->

                <!--  -->
                <form action="./includes/admin_login/admin_login_inc.php" method="post">
                    <div class="mb">
                        <input type="email" name="email" id="email" placeholder="Enter Email">
                    </div>
                    <div>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn">LOGIN</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/pop.js"></script>
</body>

</html>

<?php unset($_SESSION["admin_login_errors"]) ?>