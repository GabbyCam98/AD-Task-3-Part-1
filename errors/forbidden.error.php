<?php
http_response_code(403);

require_once LAYOUTS_PATH . '/main.layout.php';

$pageCss = [
    '/assets/css/header.css',
    '/assets/css/style.css',
    '/assets/css/errors.css',
    '/assets/css/footer.css'
];

renderMainLayout(function () {
    ?>
    <div class="page">

        <h1>Forbidden</h1>
        <p>You do not have permission to access this page.</p>
        <a href="/index.php" class="btn-2">Return To Home</a>
    </div>
    <?php
}, 'Page Not Found', ['css' => $pageCss]);