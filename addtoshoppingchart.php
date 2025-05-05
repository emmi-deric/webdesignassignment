<?php
session_start();
include('dbconnection.php');

if (isset($_POST['add_to_chart'])) {
    $userid = $_POST['userid'];
    $pdctid = $_POST['pdctid'];
    $datecaptured = $_POST['datecaptured'];
    $quantity = $_POST['quantity'];
    $selling = $_POST['selling'];
    $total = $_POST['total'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO shopping_chart (userid, pdctid, datecaptured, quantity, selling, total, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisiids", $userid, $pdctid, $datecaptured, $quantity, $selling, $total, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Item added to chart successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Failed to add item: " . $stmt->error . "'); window.history.back();</script>";
    }
    $stmt->close();
}
?>
