<?php
$db_connection = mysqli_connect("localhost", "username", "password", "database_name");

if (!$db_connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
