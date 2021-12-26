<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookbookshuffler";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die(mysqli_error($conn));
} 