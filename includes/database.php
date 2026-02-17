<?php

$hostname = '127.0.0.1';
$dbName   = 'activityDB';
$username = 'root';
$password = '';

$conn = new mysqli($hostname, $username, $password, $dbName);

function getConnection(): mysqli
{
    global $conn;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
// โหลดโมเดลที่ต้องการใช้
require_once MODEL_DIR . '/users.php';
require_once MODEL_DIR . '/events.php';