<?php
$databaseHost = 'localhost';
$databaseName = 'e_inviteme';
$databaseUsername = 'root';
$databasePassword = '';

$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>