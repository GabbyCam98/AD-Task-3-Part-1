<?php
require_once LAYOUTS_PATH . '/main.layout.php';

$busRoutes = require STATICDATAS_PATH . '/busRoutes.staticData.php';

date_default_timezone_set("Asia/Manila"); // Set your timezone
$currentTime = strtotime(date("H:i"));

$pageCss = [
    '/assets/css/style.css',
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/timetable.css'

];

$busLogos = [
    "Victory Liner" => "/assets/img/vli-logo.png",
    "Genesis Transport Service" => "/assets/img/genesis_colored.png",
    "Partas Trans" => "/assets/img/partas-wordmark.png"
];


renderMainLayout(function () use ($busLogos, $busRoutes) { ?>




    <div class="content">



        <h1>Live Bus Timetable</h1>

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
                    } else if ($boardingTime <= 60 && $boardingTime >= 0) {
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

        <a href="/index.php" class="btn-2">Return to home</a>

        <div class="database-checker-container">
            <?php
            require_once HANDLERS_PATH . '/postgreChecker.handler.php';
            require_once HANDLERS_PATH . '/mongodbChecker.handler.php';
            ?>
        </div>

    </div>

<?php }, 'TravelEZ - Live Timetable', ['css' => $pageCss]); ?>