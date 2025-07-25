<?php

require_once UTILS_PATH . '/envSetter.util.php';

$host = "host.docker.internal";
$port = "5116";
$username = "user";
$password = "password";
$dbname = "taskManagerDB";

$postgresqlCheckerResult = "";

$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";

$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo "❌ Connection Failed: ", pg_last_error() . "  <br>";
    exit();
} else {
    echo "✔️ PostgreSQL Connection  <br>";
    pg_close($dbconn);
}

return $postgresqlCheckerResult;