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

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

    <!-- header section -->
    <?php
    include_once("./layouts/header.layout.php");
    ?>



    <main>
        <section class="landing-page">
            <div class="description-container">
                <div class="travelez-description">
                    <h1>Welcome to TravelEZ!</h1>
                    <p class="description">TravelEZ is a user-friendly website that provides a comprehensive timetable
                        of bus routes across the Philippines. Whether you're planning a trip from Manila to North Luzon
                        or other key destinations, TravelEZ helps you explore available routes offered by various bus
                        companies!</p>
                </div>

                <?php
                include('handlers/postgreChecker.handler.php');
                include('handlers/mongodbChecker.handler.php');
                ?>

                <div class="action-button">
                    <a href="pages/timetable/index.php">
                        <button class="proceed-btn">Let's Go!</button>
                    </a>
                    <a href="pages/loginPage/index.php">
                        <button class="login-btn">login</button>
                    </a>
                </div>
            </div>


        </section>

    </main>

    <!-- footer section -->
    <?php
    include_once('./layouts/footer.layout.php');
    ?>


</body>

</html>