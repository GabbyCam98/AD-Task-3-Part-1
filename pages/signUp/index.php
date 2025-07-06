<?php

date_default_timezone_set("Asia/Manila"); // Set your timezone
$currentTime = strtotime(date("H:i"));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Create Account</title>
    <link rel="icon" href="../../assets/img/travelez-icon-green.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/sections.css">



</head>

<body>

    <?php
    include_once("../../layouts/header.layout.php");
    ?>

    <!-- Timetable section -->
    <main>



        <div class="container sign-up">

            <!-- <img class="travelez-logo" src="/assets/img/travelez-purple.png" alt=""> -->
            <h1>Create Account</h1>



            <form action="../../pages/signUp/index.php" method="post">

                <label for="first_name">
                    <p>First name* </p>
                </label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter First name" required>
                <label for="middle_name">
                    <p>Middle name </p>
                </label>
                <input type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name">
                <label for="last_name">
                    <p>Last name* </p>
                </label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter Last name" required>
                <label for="username">
                    <p>Username </p>
                </label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <label for="password">
                    <p>Password* </p>
                </label>
                <input type="text" id="password" name="password" placeholder="Enter Password" required>

                <div class="action-buttons">
                    <button type="submit" class="btn-1 submit">Sign Up</button>

                </div>


            </form>

            <div>
                Have an account?
                <a href="../../pages/loginPage/index.php"> Log In</a>

            </div>

            <div class="db-connection-stat">

                <?php
                require_once('../../handlers/postgreChecker.handler.php');
                require_once('../../handlers/mongodbChecker.handler.php');
                ?>
            </div>



        </div>

    </main>





    <!-- footer section -->
    <?php
    include_once("../../layouts/footer.layout.php");
    ?>


</body>

</html>