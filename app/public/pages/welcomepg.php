<?php
/**
 * Welcome page.
 *
 * This file displays a welcome message to logged-in users.
 *
 * @package Module_Task
 */

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container container--welcome">
        <h2 class="welcome__title">Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h2>
        <p class="welcome__message">You have successfully logged in.</p>
        <a href="../index.html" class="logout__link">Logout</a>
    </div>
</body>

</html>
