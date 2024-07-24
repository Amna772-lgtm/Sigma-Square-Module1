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
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <div class="container__form-container" id="register-form">
            <h1 class="form-container__title">Register</h1>
            <form method="POST" id="register">
                <input type="hidden" name="action" value="register">
                <div class="form-container__input-group">
                    <label for="register-name" class="input-group__label">Name</label>
                    <input type="text" class="input-group__input" id="name" name="name" placeholder="Enter your name"
                        required>
                    <span id="name-error" class="input-group__error-message"></span>
                </div>
                <div class="form-container__input-group">
                    <label for="register-email" class="input-group__label">Email</label>
                    <input type="email" class="input-group__input" id="email" name="email" placeholder="abc@gmail.com"
                        required>
                    <span id="email-error" class="input-group__error-message"></span>
                </div>
                <div class="form-container__input-group">
                    <label for="register-password" class="input-group__label">Password</label>
                    <input type="password" class="input-group__input" id="password" name="password"
                        placeholder="Enter your password" required>
                    <span id="password-error" class="input-group__error-message"></span>
                </div>
                <div class="form-container__input-group">
                    <label for="register-confpassword" class="input-group__label">Confirm Password</label>
                    <input type="password" class="input-group__input" id="confpassword" name="confpassword"
                        placeholder="Enter password again" required>
                    <span id="confpassword-error" class="input-group__error-message"></span>
                </div>
                <button type="submit" class="form-container__button">Register</button>
                <p class="register-link">Already have an account? <a href="login.php" class="register-link__a">Login</a></p>
            </form>
        </div>
    </div>
    <script src="../js/signup.js"></script>
</body>

</html>