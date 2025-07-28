<?php


require_once LAYOUTS_PATH . '/main.layout.php';

$mongoCheckerResult = require_once HANDLERS_PATH . '/mongodbChecker.handler.php';
$postgresCheckerResult = require_once HANDLERS_PATH . '/postgreChecker.handler.php';

$pageCss = [
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/login.css',
    '/assets/css/style.css'
];

Auth::init();

if (Auth::check()) {
    header('Location: /index.php');
    echo '<script>alert("User is already logged in, redirecting to index.php");</script>';
    exit;
}



$error = $_GET['error'] ?? '';

renderMainLayout(function () use ($error) { ?>

    <div class="page">

        <!-- <img class="travelez-logo" src="/assets/img/travelez-purple.png" alt=""> -->
        <div class="container login-form">
            <h1>Log In</h1>

            <?php if ($error === 'login_required'): ?>
                <div class="info-message"
                    style="color: #0066cc; background-color: #e6f3ff; padding: 10px; border-radius: 5px; margin-bottom: 15px; border-left: 4px solid #0066cc;">
                    <strong>Access Restricted:</strong> You must be logged in to access that page.
                </div>
            <?php endif; ?>

            <?php if ($error === 'invalid_credential'): ?>
                <div class="error-message" style="color: red; margin-bottom: 10px;">
                    Invalid username or password!
                </div>
            <?php endif; ?>

            <form action="../../handlers/auth.handler.php?action=login" method="post">

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>

                <div class="action-buttons submit">
                    <button type="submit" class="btn-2 submit">Log In</button>

                </div>


            </form>

            <div>
                Not a member yet?
                <a class="account" href="../../pages/signUp/index.php"> Create account</a>

            </div>

            <div class="db-connection-stat">
                <?php
                require_once('../../handlers/postgreChecker.handler.php');
                require_once('../../handlers/mongodbChecker.handler.php');
                ?>

            </div>
        </div>

    </div>

<?php }, 'Log In', ['css' => $pageCss]);