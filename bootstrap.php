<?php
define('BASE_PATH', realpath(__DIR__));
define('HANDLERS_PATH', realpath(__DIR__ . '/handlers'));
define('UTILS_PATH', realpath(__DIR__ . '/utils'));
define('DATABASE_PATH', realpath(__DIR__ . '/database'));
define('PAGES_PATH', realpath(__DIR__ . '/pages'));
define('DUMMIES_PATH', realpath(__DIR__ . '/staticDatas/dummies'));
define('COMPONENTS_PATH', realpath(__DIR__ . '/components'));
define('TEMPLATES_PATH', realpath(__DIR__ . '/components/templates'));
define('STATICDATAS_PATH', realpath(__DIR__ . '/staticDatas'));
define('LAYOUTS_PATH', realpath(__DIR__ . '/layouts'));
define('ERRORS_PATH', realpath(__DIR__ . '/errors'));
define('UPLOADS_PATH', realpath(__DIR__ . '/uploads'));

chdir(BASE_PATH);

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
