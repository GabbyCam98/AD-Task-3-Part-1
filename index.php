<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEz - Know Where to Go, When to Go!</title>
    <link rel="icon" href="./assets/img/travelez-icon-green.png">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/sections.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">




</head>

<body>

    <!-- header section -->
    <?php
    include_once TEMPLATES_PATH . '/header.component.php';
    ?>


    <main>
        <div class="container">

            <h1>Welcome to TravelEZ!</h1>
            <p>TravelEZ is a user-friendly website that provides a comprehensive timetable of bus routes across the
                Philippines. Whether you're planning a trip from Manila to North Luzon or other key destinations,
                TravelEZ helps you explore available routes offered by various bus companies!</p>


            <div>
                <a href="pages/timetable/index.php">
                    <button class="btn">Continue as Guest</button>
                </a>
                <a href="pages/loginPage/index.php">
                    <button class="btn">Log In</button>
                </a>
            </div>

            <div class="db-connection-stat">

                <?php
                include_once HANDLERS_PATH . '/postgreChecker.handler.php';
                include_once HANDLERS_PATH . '/mongodbChecker.handler.php';

                ?>
            </div>

        </div>



    </main>

    <!-- footer section -->
    <?php
    include TEMPLATES_PATH . '/footer.component.php';
    ?>


</body>

</html>