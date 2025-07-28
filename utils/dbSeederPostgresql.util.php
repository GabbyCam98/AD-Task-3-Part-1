<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../bootstrap.php';

require_once UTILS_PATH . '/envSetter.util.php';

if (!defined('DUMMIES_PATH')) {
    define('DUMMIES_PATH', BASE_PATH . '/staticDatas/dummies');
}

$users = require_once DUMMIES_PATH . '/users.staticData.php';


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

// creation  
echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');

if ($sql === false) {
    throw new RuntimeException("Could not read database/users.model.sql");
} else {
    echo "Creation Success from the database/users.model.sql";
}

$pdo->exec($sql);

// truncating
echo "Truncating tables…\n";
foreach (['users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}


//seeding
echo "Seeding users…\n";

$stmt = $pdo->prepare("INSERT INTO users (username, role, first_name, last_name, password, email)
VALUES (:username, :role, :fn, :ln, :pw, :email)
");

foreach ($users as $u) {
    $stmt->execute([
        ':username' => $u['username'],
        ':role' => $u['role'],
        ':fn' => $u['first_name'],
        ':ln' => $u['last_name'],
        ':pw' => password_hash($u['password'], PASSWORD_DEFAULT),
        ':email' => $u['email'],
    ]);
}

echo "✅ PostgreSQL seeding complete!\n";