<?php
/**
 * User authentication initialization.
 *
 * This file includes all necessary files for handling user authentication
 *
 * @package Module_Task
 */
require_once "../php/includes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <div class="container__form-container" id="login-form">
            <h1 class="form-container__title">Login</h1>
            <form method="POST" id="login">
                <input type="hidden" name="action" value="login">
                <div class="form-container__input-group">
                    <label for="email" class="input-group__label">Email</label>
                    <input type="email" class="input-group__input" id="email" name="email" placeholder="abc@gmail.com" required>
                    <span id="email-error" class="input-group__error-message"></span>
                </div>
                <div class="form-container__input-group">
                    <label for="password" class="input-group__label">Password</label>
                    <input type="password" class="input-group__input" id="login-password" name="password" placeholder="Enter your password" required>
                    <span id="password-error" class="input-group__error-message"></span>
                </div>
                <button type="submit" class="form-container__button">Login</button>
                <p class="register-link">Don't have an account? <a href="signup.php" class="register-link__a">Register</a></p>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>
