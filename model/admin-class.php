<?php
require_once "db_connection.php";

class admin extends Database
{
    private $conn;

    public function __construct()
    {

        // just use parent::connect()
        $this->conn = $this->connect();
    }

    public function adminRegister($data)
    {
        // ✅ Hash the password first
        $hashedPassword = password_hash($data['user_pass'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO administrator_tb (user_name, user_pass) 
                    VALUES (:name, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $data['user_name']);
        $stmt->bindParam(":password",$hashedPassword);
        return $stmt->execute();
    }

    // public function adminLogin($username) {
    //     $sql = "SELECT * FROM administrator_tb WHERE user_name = :name LIMIT 1";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(":name", $username, PDO::PARAM_STR);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    function adminLogin($username) {
        $sql = "SELECT user_name, user_pass FROM administrator_tb WHERE user_name = :Name LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":Name", $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // single row
    }

}
