<?php
declare(strict_types=1);


function headerComponent(array $user = null): void
{

    $guestNavList = [
        ['label' => 'Book', 'link' => '/pages/loginPage/index.php?error=login_required'],
        ['label' => 'Timetable', 'link' => '/pages/timetable/index.php'],
        ['label' => 'About Us', 'link' => '/pages/aboutUs/index.php']
    ];

    $userActionList = [
        'login' => 'Login',
        'loginLink' => '/pages/loginPage/index.php',
        'signup' => 'SignUp',
        'signupLink' => '/pages/signUp/index.php',
        'logout' => 'Logout',
        'logoutLink' => '/handlers/auth.handler.php?action=logout'
    ];

    $userNavList = [
        ['label' => 'Book', 'link' => '/pages/bookingPage/index.php'],
        ['label' => 'Timetable', 'link' => '/pages/timetable/index.php'],
        ['label' => 'About Us', 'link' => '/pages/aboutUs/index.php']
    ];

    $hideButtons = [
        '/pages/loginPage/index.php',
        '/pages/signUp/index.php'
    ];


    $navList = (Auth::check() && $user) ? $userNavList : $guestNavList;

    ?>
    <header>
        <div class="header-container">

            <div class="left-section">
                <a class="travelez-button" href="/index.php">
                    <img src="../../assets/img/travelez-white.png" alt="travelEZ logo">
                </a>
                <?php if (Auth::check() && $user): ?>
                    <span class="username">
                        <strong>Hello, <?php echo htmlspecialchars($user['username']); ?></strong>
                    </span>
                <?php endif; ?>
            </div>

            <!-- middle section -->
            <div class="middle-section">

                <?php foreach ($navList as $item): ?>
                    <a href="<?php echo htmlspecialchars($item['link']); ?>">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- right section -->
            <div class="right-section">
                <?php if (Auth::check() && $user): ?>
                    <a href="<?php echo htmlspecialchars($userActionList['logoutLink']); ?>"
                        class="btn"><?php echo htmlspecialchars($userActionList['logout']); ?>
                    </a>
                <?php else: ?>
                    <a href="<?php echo htmlspecialchars($userActionList['loginLink']); ?>"
                        class="btn"><?php echo htmlspecialchars($userActionList['login']); ?>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </header>
<?php } ?>