<?php
declare(strict_types=1);
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require_once BASE_PATH . '/vendor/autoload.php';

require_once BASE_PATH . '/bootstrap.php';

require_once ENVSETTER_PATH;

$host = $databases['pgHost'];
$port = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname = $databases['pgDB'];

// connection
$dsn = "pgsql:host={$databases['pgHost']};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

$tables = [
    'project_users',
    'projects',
    'users'
];
echo "Dropping tables…\n";
foreach ($tables as $table) {
    try {
        $pdo->exec("DROP TABLE IF EXISTS \"$table\" CASCADE;");
        echo "Dropped $table\n";
    } catch (Exception $e) {
        echo "Warning: Could not drop $table ({$e->getMessage()})\n";
    }
}

// creation  
$sqlmodels = [
    'database/users.model.sql',
    'database/projects.model.sql',
    'database/project_users.model.sql'
];

foreach ($sqlmodels as $model) {
    echo "Applying schema from $model\n";
    $sql = file_get_contents($model);
    if ($sql === false) {
        throw new RuntimeException("Could not read $model");
    } else {
        echo "Creation Success from the $model";
    }
    $pdo->exec($sql);
}

echo "✅ PostgreSQL reset complete!\n";


