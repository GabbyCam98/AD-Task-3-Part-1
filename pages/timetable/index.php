<?php
require '../../staticDatas/busRoutes.staticData.php';

date_default_timezone_set("Asia/Manila"); // Set your timezone
$currentTime = strtotime(date("H:i"));

$busLogos = [
    "Victory Liner" => "/assets/img/vli-logo.png",
    "Genesis Transport Service" => "/assets/img/genesis_colored.png",
    "Partas Trans" => "/assets/img/partas-wordmark.png"
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEZ - Live Timetable</title>
    <link rel="icon" href="/assets/img/travelez-icon-green.png">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

</head>

<body>

    <!-- header section -->
    <?php
    include_once "../../layouts/header.layout.php";
    ?>


    <!-- Timetable section -->
    <div class="content">

        <div class="database-checker-container">
            <?php
            require_once('../../handlers/postgreChecker.handler.php');
            require_once('../../handlers/mongodbChecker.handler.php');
            ?>
        </div>


        <?php

        foreach ($busRoutes as $company => $routes) {
            echo "<div class='schedule-container'>";

            echo "<div class='company-container'>";
            if (isset($busLogos[$company])) {
                $logo = $busLogos[$company];
                echo "<img class='company-logo' src='$logo'>";
            } else {
                echo "<h1 style='display: inline-block; vertical-align: middle;'>$company</h1>";
            }
            echo "</div>";

            /* Route, sched, and class table */
            echo "<div class='company-grid'>";

            foreach ($routes as $route) {
                echo "<div class='route'>";
                echo "<h2>" . $route['origin'] . " → " . $route['destination'] . "</h2>";
                echo "<div class='schedule'>";
                echo "</div>";
                echo "<table cellpadding='5' cellspacing='0'>";
                echo "<tr><th>Time</th><th>Bus Class</th><th>Status</th></tr>";

                /* Schedule and Bus Class */
                for ($i = 0; $i < count($route['schedules']); $i++) {
                    $trip = $route['schedules'][$i];

                    echo "<tr>";
                    echo "<td class='time'>" . $trip['time'] . "</td>";
                    echo "<td class='class'>" . $trip['class'] . "</td>";

                    /* Trip status */
                    $currentTime = strtotime("now");
                    $tripSched = strtotime(date("Y-m-d") . " " . $trip['time']);
                    $boardingTime = ($tripSched - $currentTime) / 60;

                    if ($tripSched < $currentTime) {
                        echo "<td class='departed' style='text-align: right' >Departed</td>";
                    } elseif ($boardingTime <= 45 && $boardingTime >= 30) {
                        echo "<td class='boarding' style='text-align: right'>Boarding</td>";
                    } else {
                        echo "<td class='not-departed' style='text-align: right' >Scheduled</td>";
                    }
                    echo "</tr>";
                }
                echo "</table><br>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>

        <a href="../../index.php">
            <button class="btn-2">Return to Home</button>
        </a>


    </div>;

    <!-- footer section -->
    <?php
    include "../../layouts/footer.layout.php";
    ?>



</body>

</html>