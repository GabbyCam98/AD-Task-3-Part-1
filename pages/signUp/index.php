<?php

require_once '../../bootstrap.php';
require_once LAYOUTS_PATH . '/main.layout.php';
require_once UTILS_PATH . '/auth.util.php';

// Redirect logged-in users away from signup

$pageCss = [
    '../../assets/css/style.css',
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/signup.css'
];

// Pull any flash errors and old input, then clear them
$errors = $_SESSION['signup_errors'] ?? [];
$old = $_SESSION['signup_old'] ?? [];
unset($_SESSION['signup_errors'], $_SESSION['signup_old']);


renderMainLayout(function () use ($errors, $old) { ?>

    <div class="page">

        <div class="container">

            <!-- <img class="travelez-logo" src="/assets/img/travelez-purple.png" alt=""> -->
            <h1>Create Account</h1>

            <?php if (!empty($errors)): ?>
                <div class="error-message" style="color: #dc3545; margin-bottom: 15px;">
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="signup-form" action="../../handlers/signup.handler.php" method="post">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email"
                    value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>

                <div class="input-row">
                    <div>
                        <label for="first_name">First name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter First name"
                            value="<?= htmlspecialchars($old['first_name'] ?? '') ?>" required>
                    </div>
                    <div>
                        <label for="last_name">Last name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter Last name"
                            value="<?= htmlspecialchars($old['last_name'] ?? '') ?>" required>
                    </div>
                </div>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username"
                    value="<?= htmlspecialchars($old['username'] ?? '') ?>" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <label for="password">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter Password" required>

                <div class="action-buttons">
                    <button type="submit" class="btn-2">Sign Up</button>
                </div>

            </form>

            <div>
                Have an account?
                <a class="account" href="../../pages/loginPage/index.php"> Log In</a>
            </div>

            <div class="db-connection-stat">
                <?php
                require_once('../../handlers/postgreChecker.handler.php');
                require_once('../../handlers/mongodbChecker.handler.php');
                ?>
            </div>



        </div>

    </div>
<?php }, 'Sign Up', ['css' => $pageCss]);