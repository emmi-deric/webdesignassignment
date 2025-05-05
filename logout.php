<?php
// Start the session
session_start();

// Check if the user is logged in (you might have a different condition to check)
if(isset($_SESSION['userData'])) {

    // Close the database connection if it's stored in the session
    /*if (isset($_SESSION['db_connection'])) {
        $_SESSION['db_connection']->close();
    } */

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page after logout
    header("Location: index.php");
    exit();
}
?>