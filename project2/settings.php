<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$sql_db = "project2"; 

// Not show the errors to the user and log the errors to error.log 
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/error.log');
error_reporting(E_ALL);

try {
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
} catch (mysqli_sql_exception $e) {
    // log the detailed error to server logs
    error_log("DB connection failed: " . $e->getMessage());
    // show safe message to user
    die("Cannot connect to the service right now. Please try again later.");
}
?>
