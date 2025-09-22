<?php
include "../nav/header.php";
require_once "../model/modal-class.php";

$modal = new Modal();
$bookings = $modal->getBookings(); // Fetch lahat ng bookings
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Booking</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="http://localhost/Cabelin/edit/assets/custom.css">
    <link rel="stylesheet" href="http://localhost/Cabelin/edit/assets/header.css">
    <link rel="stylesheet" href="http://localhost/Cabelin/edit/assets/styles.css">

    <style>
        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 15px;
        }
        .booking-table th, .booking-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .booking-table th {
            background: #263238;
            color: white;
        }
        .booking-table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .status-pending {
            color: #d32f2f;
            font-weight: bold;
        }
        .status-approved {
            color: #388e3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Client Booking</h1>

        <table class="booking-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Booking Type</th>
                    <th>Full Name</th>
                    <th>Contact No</th>
                    <th>Car Model</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bookings)) { 
                    foreach ($bookings as $index => $b) { ?>
                        <tr>
                            <td><?= htmlspecialchars($b['id']) ?></td>
                            <td><?= htmlspecialchars($b['booking_type']) ?></td>
                            <td><?= htmlspecialchars($b['full_name']) ?></td>
                            <td><?= htmlspecialchars($b['contact_no']) ?></td>
                            <td><?= htmlspecialchars($b['car_model']) ?></td>
                            <td><?= htmlspecialchars($b['booking_date']) ?></td>
                            <td><?= htmlspecialchars($b['message']) ?></td>
                            <td class="<?= strtolower($b['status']) == 'pending' ? 'status-pending' : 'status-approved' ?>">
                                <?= htmlspecialchars($b['status']) ?>
                            </td>
                        </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="8">No bookings found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>
