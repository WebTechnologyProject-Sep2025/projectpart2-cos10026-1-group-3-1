<?php
require_once "settings.php";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection FAILED.</p>";
} else {
    echo "<p>✅ Database connection SUCCESS.</p>";
}

mysqli_close($conn);
?>
