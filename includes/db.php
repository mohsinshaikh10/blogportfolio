<?php

$host = "localhost";
$username = "if0_42081057_mohsin_blog";
$password = "";
$database = "mohsin_blog";

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
