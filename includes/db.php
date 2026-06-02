<?php

$host = "sql309.infinityfree.com";
$username = "if0_42081057";
$password = "gK7Q8z5Dr0";
$database = "if0_42081057_mohsin_blog";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die(
        "Database Connection Failed: " .
        $conn->connect_error
    );
}

?>
