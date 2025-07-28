<?php
require_once '../../bootstrap.php';
require_once LAYOUTS_PATH . '/main.layout.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();

// Check if user is logged in
if (!Auth::check()) {
    require_once ERRORS_PATH . '/forbidden.error.php';
    exit;
}

$user = Auth::user();

// Check if user is admin
if (!isset($user['role']) || strtolower($user['role']) !== 'admin') {
    require_once ERRORS_PATH . '/forbidden.error.php';
    exit;
}

$pageCss = [
    '/assets/css/style.css',
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/admin.css'
];

renderMainLayout(function () use ($user) { ?>
    <div class="page">
        <div class="container">
            <h1>Admin Dashboard</h1>
            <p>Welcome, <?= htmlspecialchars($user['first_name']) ?>!</p>

            <div class="admin-stats">
                <h2>System Status</h2>
                <div class="db-connection-stat">
                    <?php
                    require_once HANDLERS_PATH . '/postgreChecker.handler.php';
                    require_once HANDLERS_PATH . '/mongodbChecker.handler.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php }, 'Admin Dashboard - TravelEZ', ['css' => $pageCss]); ?>