<?php

$conn = new mysqli("localhost","root","chienmaureen","Act_db");

if ($conn->connection_error) {
    die("Connection failed");
    }

$json_string = file_get_contents('receipt.json');

$data = json_decode($json_string, true);

$order_id = json_encode($data["order_id"]);
$customer_id = json_encode($data["customer_id"]);
$quantity = json_encode($data["quantity"]);
$total_amount = json_encode($data["total_amount"]);


$sql = "INSERT INTO CustomerOrders(Receipt) VALUES (?)";

$stmt = $conn->prepare($sql);
$stmt->bint_param("s", receipt);

$conn->close();
?>
