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

// Connection
$dsn = "pgsql:host={$databases['pgHost']};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Test connection first
echo "Testing database connection...\n";
try {
    $result = $pdo->query("SELECT version()");
    echo "✅ Connected to PostgreSQL\n";
} catch (Exception $e) {
    echo "❌ Connection failed: " . $e->getMessage() . "\n";
    exit(1);
}

// Drop tables in reverse dependency order (child tables first)
echo "Dropping old tables…\n";
$tablesToDrop = [
    'project_users',  // Junction table (has foreign keys) - drop first
    'projects',       // Referenced by project_users
    'users'          // Referenced by project_users and projects
];

foreach ($tablesToDrop as $table) {
    try {
        $pdo->exec("DROP TABLE IF EXISTS \"$table\" CASCADE;");
        echo "✅ Dropped $table\n";
    } catch (Exception $e) {
        echo "⚠️  Warning: Could not drop $table ({$e->getMessage()})\n";
    }
}

// Create tables in dependency order (parent tables first)
echo "Creating tables...\n";
$sqlmodels = [
    'database/users.model.sql',        // No dependencies
    'database/projects.model.sql',     // No dependencies  
    'database/project_users.model.sql' // Depends on users and projects
];

foreach ($sqlmodels as $model) {
    echo "Applying schema from $model\n";

    $sql = file_get_contents($model);
    if ($sql === false) {
        echo "❌ Error: Could not read $model\n";
    } else {
        echo "✅ Creation Success from $model\n";

    }
    $pdo->exec($sql);

}


echo "\n🎉 PostgreSQL migration complete!\n";