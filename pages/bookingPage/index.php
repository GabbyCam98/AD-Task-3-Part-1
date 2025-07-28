<?php
require_once LAYOUTS_PATH . '/main.layout.php';

$pageCss = [
    '/assets/css/style.css',
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/booking.css'
];

renderMainLayout(function () {
    ?>

    <div class="page">
        <div class="container">

            <h1>Coming Soon!</h1>
            <div class="coming-soon-description">
                <p>We're working hard to bring you an amazing bus booking experience!</p>

                <p>Our upcoming booking system will feature:</p>

                <ul>
                    <li>🎫 Easy online ticket booking</li>
                    <li>🚌 Real-time seat availability</li>
                    <li>💳 Secure payment processing</li>
                    <li>📱 Mobile-friendly interface</li>
                    <li>🎯 Route selection and scheduling</li>
                    <li>📧 Instant booking confirmations</li>
                </ul>

                <div class="cta-section">
                    <p>For now, you can check our <a href="/pages/timetable/index.php">Live Timetable</a> to plan your
                        journey!</p>

                    <div class="notify-section">
                        <p><strong>Want to be notified when booking is available?</strong></p>
                        <p>Follow us for updates or check back soon!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }, 'About Us', ['css' => $pageCss]) ?>