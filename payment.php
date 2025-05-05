<?php
session_start();
include('dbconnection.php');

if (!isset($_SESSION['userData'])) {
    header('Location: login.php');
    exit();
}

$storedData = $_SESSION['userData'];
$userid = $storedData['userid'];
$datecaptured = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $quantities = $_POST['quantity'];
    $sellings = $_POST['selling'];
    $totals = $_POST['total'];
    $userids = $_POST['userid'];
    $pdctids = $_POST['pdctid'];
    $totalSum = $_POST['totalSum'];

    // connect to payment gateway


    // proceed to update tables if successful payment is done (have to implement if)

    foreach ($quantities as $rowId => $quantity) {
        $selling = isset($sellings[$rowId]) ? $sellings[$rowId] : 0;
        $total = isset($totals[$rowId]) ? $totals[$rowId] : 0;
        $userid = isset($userids[$rowId]) ? $userids[$rowId] : 0;
        $pdctid = isset($pdctids[$rowId]) ? $pdctids[$rowId] : 0;

        echo "id: ".$rowId." <br>";
        echo "userid: ".$userid." <br>";
        echo "pdctid: ".$pdctid." <br>";
        echo "quantity: ".$quantity." <br>";
        echo "selling: ".$selling." <br>";
        echo "total: ".$total."<br>";
        echo "totalSum: ".$totalSum." <br> <br>";

        // Insert into table customer_transactions

        $stmt = $conn->prepare("INSERT INTO customer_transactions(userid, pdctid, datecaptured, quantity, price, total) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisiii", $userid, $pdctid, $datecaptured, $quantity, $selling, $total);
        $stmt->execute();
        $stmt->close(); 

        // Update status
        $status = 'completed';
        // Prepare update statement
        $stmt = $conn->prepare("UPDATE shopping_chart SET status = ? WHERE id = ? ");
        $stmt->bind_param("si", $status, $rowId);
        $stmt->execute();
        $stmt->close(); 
    }

    // Optional: redirect back with success message
   /* header("Location: shoppingchart.php?updated=1");
    exit(); */
} else {
    echo "No valid data submitted.";
}
?>
