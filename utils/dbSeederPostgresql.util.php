<?php
declare(strict_types=1);
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require_once BASE_PATH . '/vendor/autoload.php';

require_once BASE_PATH . '/bootstrap.php';

require_once ENVSETTER_PATH;

if (!defined('DUMMIES_PATH')) {
    define('DUMMIES_PATH', BASE_PATH . '/staticDatas/dummies');
}

// Load both dummy data files
$users = require_once DUMMIES_PATH . '/users.staticData.php';
$projects = require_once DUMMIES_PATH . '/projects.staticData.php';

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

// Apply schemas in correct order
$sqlmodels = [
    'database/users.model.sql',
    'database/projects.model.sql',
    'database/project_users.model.sql',
];

foreach ($sqlmodels as $model) {
    echo "Applying schema from $model\n";
    $sql = file_get_contents($model);
    if ($sql === false) {
        throw new RuntimeException("Could not read $model");
    } else {
        echo "Creation Success from $model\n";
    }
    $pdo->exec($sql);
}

// Truncating tables in reverse dependency order
echo "Truncating tables…\n";
$tables = [
    'project_users',
    'projects',
    'users',
];
foreach ($tables as $table) {
    $pdo->exec("TRUNCATE TABLE \"$table\" RESTART IDENTITY CASCADE;");
}

// 1. SEEDING USER TABLE (same structure as before)
echo "Seeding users…\n";
$userIds = []; // Initialize array to store user IDs

if (is_array($users) && count($users)) {
    $stmt = $pdo->prepare('
        INSERT INTO public."users" (username, first_name, last_name, password, role, email) 
        VALUES (:username, :first_name, :last_name, :password, :role, :email)
        RETURNING user_id
    ');

    foreach ($users as $u) {
        $stmt->execute([
            ':username' => $u['username'],
            ':first_name' => $u['first_name'],
            ':last_name' => $u['last_name'],
            ':password' => password_hash($u['password'], PASSWORD_DEFAULT),
            ':role' => $u['role'],
            ':email' => $u['email'],
        ]);
        // Capture the returned user_id
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $userIds[] = $result['user_id'];
    }
    echo "Inserted " . count($users) . " users into users table.\n";
} else {
    echo "No user dummy data found.\n";
}

// 2. SEEDING PROJECTS TABLE (same structure as users)
echo "Seeding projects…\n";
$projectIds = []; // Initialize array to store project IDs

if (is_array($projects) && count($projects)) {
    $stmt = $pdo->prepare('
        INSERT INTO projects (name, description, status, priority) 
        VALUES (:name, :description, :status, :priority)
        RETURNING id
    ');

    foreach ($projects as $p) {
        $stmt->execute([
            ':name' => $p['name'],
            ':description' => $p['description'],
            ':status' => $p['status'],
            ':priority' => $p['priority']
        ]);
        // Capture the returned project id
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $projectIds[] = $result['id'];
    }
    echo "Inserted " . count($projects) . " projects into projects table.\n";
} else {
    echo "No project dummy data found.\n";
}

// 3. SEEDING PROJECT-USER ASSIGNMENTS (same structure pattern)
echo "Seeding project-user assignments…\n";
$assignmentCount = 0;

// Only proceed if we have both users and projects
if (!empty($userIds) && !empty($projectIds)) {
    $stmt = $pdo->prepare('
        INSERT INTO project_users (project_id, user_id, role_in_project)
        VALUES (:project_id, :user_id, :role_in_project)
        ON CONFLICT (project_id, user_id) DO NOTHING
    ');

    // Assign first user (admin) to all projects as project manager
    foreach ($projectIds as $projectId) {
        $stmt->execute([
            ':project_id' => $projectId,
            ':user_id' => $userIds[0],
            ':role_in_project' => 'project_manager'
        ]);
        $assignmentCount++;
    }

    // Assign other users to random projects as members
    for ($i = 1; $i < count($userIds); $i++) {
        $numProjects = rand(2, min(3, count($projectIds)));
        $randomProjects = array_rand($projectIds, $numProjects);

        if (!is_array($randomProjects)) {
            $randomProjects = [$randomProjects];
        }

        foreach ($randomProjects as $projectIndex) {
            $stmt->execute([
                ':project_id' => $projectIds[$projectIndex],
                ':user_id' => $userIds[$i],
                ':role_in_project' => 'member'
            ]);
            $assignmentCount++;
        }
    }

    echo "Inserted $assignmentCount project-user assignments.\n";
} else {
    echo "Cannot seed project-user assignments: missing users or projects.\n";
}

echo "\n🎉 PostgreSQL seeding complete for all tables!\n";