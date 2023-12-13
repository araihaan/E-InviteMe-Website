<?php
session_start(); // Start the session
if (isset($_SESSION['logged_in'])) {
    // Unset all session variables
    $_SESSION['logged_in'] = false;
    $_SESSION = array();
    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: index.html");
    exit;
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.html");
    exit;
}
