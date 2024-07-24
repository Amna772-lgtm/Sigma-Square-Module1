<?php
/**
 * User authentication initialization.
 *
 * This file includes all necessary files for handling user authentication 
 *
 * @package Module_Task
 */
require_once "../php/includes.php";

// Start a session
session_start();

// Function to validate email format
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $action = $_POST['action'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format
    if (!validateEmail($email)) {
        echo "<script>alert('Invalid email format'); window.location.href = 'signup.php';</script>";
        exit();
    }

    // Create an instance of the Register class
    $register = new Register();

    if ($action === 'register') {
        $name = $_POST['name'];

        // Check if the user already exists
        $userExistsResult = $register->isUserExists($email);
        if ($userExistsResult['exists']) {
            echo "<script>alert('User already exists'); window.location.href = 'login.php';</script>";
        } else {
            // Register the user
            $result = $register->register($name, $email, $password);

            // Check if the registration was successful
            if ($result['status'] === 'success') {
                // Redirect to login page
                echo "<script>alert('Successfully registered'); window.location.href = 'login.php';</script>";
                exit();
            } else {
                echo "<script>alert('" . $result['message'] . "'); window.location.href = 'signup.php';</script>";
            }
        }
    } elseif ($action === 'login') {
        // Check if the user exists and the password is correct
        $result = $register->login($email, $password);
        if ($result['status'] === 'success') {
            // Store user information in session
            $_SESSION['user'] = [
                'email' => $email,
                'name' => $result['name']
            ];
            echo "<script>alert('Successfully logged in'); window.location.href = 'welcomepg.php';</script>";
        } else {
            echo "<script>alert('" . $result['message'] . "'); window.location.href = 'login.php';</script>";
        }
    }
}
?>
