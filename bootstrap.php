<?php
define('BASE_PATH', realpath(__DIR__));
define('HANDLERS_PATH', realpath(BASE_PATH . "/handlers"));
define('UTILS_PATH', realpath(BASE_PATH . "/utils"));
define('DATABASE_PATH', realpath(BASE_PATH . "/database"));
define('DUMMIES_PATH', realpath(BASE_PATH . "/staticDatas/dummies"));
define('TEMPLATES_PATH', realpath(BASE_PATH . '/components/templates'));
define('STATICDATAS_PATH', realpath(BASE_PATH . '/staticDatas'));
define('LAYOUTS_PATH', realpath(BASE_PATH . '/layouts'));
define('ERRORS_PATH', realpath(BASE_PATH . '/errors'));
define('UPLOADS_PATH', realpath(BASE_PATH . '/uploads'));
define('ENVSETTER_PATH', realpath(UTILS_PATH . '/envSetter.util.php'));

chdir(BASE_PATH);

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
