<?php
/**
 * User registration.
 *
 * This file includes all necessary files for handling user registration and login functionality
 *
 * @package Module_Task
 */
require_once "../php/includes.php";

class Register
{
    private $conn;

    public function __construct()
    {
        $db = new Database();   // Creating an object of the Database class
        $this->conn = $db->conn;
    }

    public function register($name, $email, $password)
    {
        // Hash the password to store in the database
        $hashpwd = password_hash($password, PASSWORD_DEFAULT);

        // SQL statement using prepared statements for inserting data
        $stmt = $this->conn->prepare('INSERT INTO user (name, email, password) VALUES (?, ?, ?)');
        if ($stmt === false) {
            return ['status' => 'error', 'message' => 'Prepare failed: ' . $this->conn->error];
        }

        // Bind parameters to the placeholders
        $stmt->bind_param('sss', $name, $email, $hashpwd);

        // Execute the statement (query)
        if ($stmt->execute()) {
            return ['status' => 'success', 'message' => 'User registered successfully'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to register user: ' . $stmt->error];
        }
    }

    public function isUserExists($email)
    {
        $checkUser = "SELECT email FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($checkUser);
        if ($stmt === false) {
            return ['status' => 'error', 'message' => 'Prepare failed: ' . $this->conn->error];
        }

        // Bind parameters to the placeholders
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        // Check number of records
        $exists = $stmt->num_rows > 0;
        return ['status' => 'success', 'exists' => $exists];
    }

    public function login($email, $password)
    {
        // Prepare the SQL statement for login 
        $stmt = $this->conn->prepare('SELECT name, password FROM user WHERE email = ? LIMIT 1');
        if ($stmt === false) {
            return ['status' => 'error', 'message' => 'Prepare failed: ' . $this->conn->error];
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name, $hashedPassword);
        $stmt->fetch();

        // Check if the user exists and verify the password
        if ($stmt->num_rows > 0) {
            if (password_verify($password, $hashedPassword)) {
                return ['status' => 'success', 'message' => 'Login successful', 'name' => $name];
            } else {
                return ['status' => 'error', 'message' => 'Invalid password'];
            }
        } else {
            return ['status' => 'error', 'message' => 'User does not exist'];
        }
    }
}


