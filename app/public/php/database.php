<?php
/**
 * Database connection class.
 *
 * This class is responsible for establishing a connection
 * with the MySQL database.
 *
 * @package Module_Task
 */
class Database
{
    private $_servername = "localhost";
    private $_username = "root";
    private $_password = "root";
    private $_db = "register";
    public $conn;

    //constructor
    public function __construct()
    {
        $this->connect();
    }

    // Method to create connection with the database
    private function connect()
    {
        $this->conn = new mysqli($this->_servername, $this->_username, $this->_password, $this->_db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }
    //function to get connection
    public function getConnection()
    {
        return $this->conn;
    }
}
