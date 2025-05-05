<?php
session_start();
include('dbconnection.php');

$data = json_decode(file_get_contents("php://input"), true);

if ($data && $data['status'] === "successful") {
    $txRef = $data['tx_ref'];
    $amount = $data['amount'];
    $userid = $_SESSION['userData']['userid'];

    // Confirm and update shopping_chart as 'paid'
    $stmt = $conn->prepare("UPDATE shopping_chart SET status='paid' WHERE userid=? AND status='pending'");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->close();

    echo "Transaction recorded.";
} else {
    echo "Invalid or failed transaction.";
}
?>
