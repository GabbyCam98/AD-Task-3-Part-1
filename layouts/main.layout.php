<?php
declare(strict_types=1);

require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();

require_once TEMPLATES_PATH . '/head.component.php';
require_once TEMPLATES_PATH . '/header.component.php';
require_once TEMPLATES_PATH . '/footer.component.php';
require_once UTILS_PATH . '/envSetter.util.php';


$user = Auth::user();

function renderMainLayout(callable $content, string $pageTitle, array $customJsCss = []): void
{
    global $user; // external variables
    head($pageTitle, $customJsCss['css'] ?? []);
    headerComponent($user);
    $content();
    footerComponent($customJsCss['js'] ?? []);
}

?>