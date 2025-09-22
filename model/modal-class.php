<?php
require_once "db_connection.php";

class Modal extends Database
{
    private $conn;

    public function __construct()
    {
        //just use parent::connect()
        $this->conn = $this->connect();
    }

    public function addBooking($data)
    {
        $insert = "INSERT INTO booking_model (booking_type, full_name, contact_no, car_model, booking_date, message)
                       VALUES (:plan, :name, :contact, :carModel, :date, :message)";
        $stmt = $this->conn->prepare($insert);
        $stmt->bindParam(":plan",       $data['booking_type']);
        $stmt->bindParam(":name",       $data['full_name']);
        $stmt->bindParam(":contact",    $data['contact_no']);
        $stmt->bindParam(":carModel",   $data['car_model']);
        $stmt->bindParam(":date",       $data['booking_date']);
        $stmt->bindParam(":message",    $data['message']);
        return $stmt->execute();
    }

    // 🔹 Fetch all bookings
    public function getBookings()
    {
        $sql = "SELECT * FROM booking_model ORDER BY id ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
