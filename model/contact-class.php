<?php
require_once "db_connection.php";

class Contact extends Database {
    private $conn;

    public function __construct() {
        // just use parent::connect()
        $this->conn = $this->connect();
    }

    public function sendSMS($data) {
        $sql = "INSERT INTO contact_tb (user_name, user_email, subject, message) 
                VALUES (:name, :email, :subject, :message)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $data['user_name']);
        $stmt->bindParam(":email", $data['user_email']);
        $stmt->bindParam(":subject", $data['subject']);
        $stmt->bindParam(":message", $data['message']);
        return $stmt->execute();
    }

    public function getMessages() {
        $sql = "SELECT * FROM contact_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
