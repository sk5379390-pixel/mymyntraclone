<?php
session_start();

function readJson($file) {
    $a = json_decode(file_get_contents($file), true);
    return is_array($a) ? $a : [];
}
function writeJson($file, $arr) {
    file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT));
}

if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "error", "message" => "User not logged in!"]);
    exit;
}

$user = $_SESSION['user'];
$orders = readJson('orders.txt');

if (!isset($_POST['time'])) {
    echo json_encode(["status" => "error", "message" => "Order identifier missing!"]);
    exit;
}

$orderTime = $_POST['time'];
$found = false;

foreach ($orders as &$o) {
    if ($o['user'] === $user && $o['time'] === $orderTime) {
        $o['status'] = "Cancelled";
        $found = true;
        break;
    }
}

if ($found) {
    writeJson('orders.txt', $orders);
    echo json_encode(["status" => "success", "message" => "Order cancelled successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Order not found!"]);
}
?>
