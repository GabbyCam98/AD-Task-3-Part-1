<?php
http_response_code(404);

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

        <h1>Not Found</h1>
        <p>The requested URL was not found on this server.</p>
        <a href="/index.php" class="btn-2">Return To Home</a>
    </div>
    <?php
}, 'Page Not Found', ['css' => $pageCss]);