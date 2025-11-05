<?php
session_start();

// --- AUTO-CREATE FILES ---
$files = ['users.txt', 'carts.txt', 'wishlists.txt', 'orders.txt'];
foreach ($files as $f) {
    if (!file_exists($f)) file_put_contents($f, "[]");
}

// --- FUNCTIONS ---
function readJson($file) {
    $a = json_decode(file_get_contents($file), true);
    return is_array($a) ? $a : [];
}
function writeJson($file, $arr) {
    file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT));
}

// --- CHECK USER SESSION ---
if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "error", "message" => "User not logged in!"]);
    exit;
}
$user = $_SESSION['user'];

// --- READ CART ---
$carts = readJson('carts.txt');
$orders = readJson('orders.txt');

$userCartKey = array_search($user, array_column($carts, 'user'));

if ($userCartKey === false || empty($carts[$userCartKey]['items'])) {
    echo json_encode(["status" => "error", "message" => "Your cart is empty!"]);
    exit;
}

$userCart = $carts[$userCartKey]['items'];

// --- CREATE ORDER ---
$newOrder = [
    "user" => $user,
    "name" => $_POST['name'] ?? "",
    "contact" => $_POST['contact'] ?? "",
    "address" => $_POST['address'] ?? "",
    "payment" => $_POST['payment'] ?? "Cash on Delivery",
    "items" => $userCart,
    "status" => "Order Placed",
    "time" => date("Y-m-d H:i:s")
];

$orders[] = $newOrder;
writeJson('orders.txt', $orders);

// --- EMPTY USER CART ---
$carts[$userCartKey]['items'] = [];
writeJson('carts.txt', $carts);

// --- SUCCESS MESSAGE ---
echo json_encode([
    "status" => "success",
    "message" => "Order placed successfully!",
    "order" => $newOrder
]);
?>
