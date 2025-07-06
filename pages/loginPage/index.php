<?php

date_default_timezone_set("Asia/Manila"); // Set your timezone
$currentTime = strtotime(date("H:i"));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/sections.css">



</head>

<body>

    <?php
    include_once("../../layouts/header.layout.php");
    ?>

    <!-- Timetable section -->
    <main>



        <div class="container login">

            <!-- <img class="travelez-logo" src="/assets/img/travelez-purple.png" alt=""> -->
            <h1>Log In</h1>


            <form action="../../pages/timetable/timetable.php" method="post">

                <label for="username">
                    <p>Username: </p>
                </label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <label for="password">
                    <p>Password: </p>
                </label>
                <input type="text" id="password" name="password" placeholder="Enter Password" required>

                <div class="action-buttons">
                    <button type="submit" class="btn-1 submit">Log In</button>

                </div>


            </form>


            <?php
            require_once('../../handlers/postgreChecker.handler.php');
            require_once('../../handlers/mongodbChecker.handler.php');
            ?>

        </div>

    </main>





    <!-- footer section -->
    <?php
    include_once("../../layouts/footer.layout.php");
    ?>


</body>

</html>