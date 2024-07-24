<?php
/**
 * User logout.
 *
 * This file handles user logout by destroying the session.
 *
 * @package Module_Task
 */

// Start session
session_start();

// Destroy session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>
