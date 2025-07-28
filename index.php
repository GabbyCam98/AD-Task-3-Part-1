<?php

require_once 'bootstrap.php';
require_once LAYOUTS_PATH . '/main.layout.php';
require_once UTILS_PATH . '/auth.util.php';


$pageCss = [
    'assets/css/style.css',
    'assets/css/header.css',
    'assets/css/footer.css'
];

$pageJs = ['/assets/js/header.js'];


$services = [
    [
        'service' => 'Live Timetable',
        'description' => 'Know the schedule of the next bus'
    ],
    [
        'service' => 'Book a trip',
        'description' => 'Check the timetable and go!'
    ]

];

renderMainLayout(function () use ($services) { ?>


    <div class="page landing">

        <section class="container welcome align-center">


            <h1>Welcome to TravelEZ!</h1>
            <p>TravelEZ is a user-friendly website that provides a comprehensive timetable of bus routes across the
                Philippines. Whether you're planning a trip from Manila to North Luzon or other key destinations,
                TravelEZ helps you explore available routes offered by various bus companies!</p>


            <div class="action-buttons">
                <?php
                $user = Auth::user();
                if (Auth::check()):
                    if (isset($user['role']) && strtolower($user['role']) === 'admin'): ?>
                        <a class="btn-2" href="/pages/adminDashboard/index.php">Get Started (admmin)</a>
                    <?php else: ?>
                        <a class="btn-2" href="/pages/timetable/index.php">Get Started</a>
                    <?php endif;
                else: ?>
                    <a class="btn-2" href="/pages/signUp/index.php">Create Account</a>
                    <a href="/pages/loginPage/index.php" class="btn-2">Log In</a>
                <?php endif; ?>

            </div>

            <div class="db-connection-stat">
                <?php
                require_once HANDLERS_PATH . '/postgreChecker.handler.php';
                require_once HANDLERS_PATH . '/mongodbChecker.handler.php';
                ?>
            </div>
        </section>

    </div>


<?php }, 'TravelEz - Know Where to Go, When to Go!', ['css' => $pageCss, 'js' => $pageJs]); ?>