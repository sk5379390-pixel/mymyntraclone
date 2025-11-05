<?php
session_start();

// --- AUTO-CREATE FILES ---
$files = ['users.txt','carts.txt','wishlists.txt','orders.txt'];
foreach($files as $f){ if(!file_exists($f)) file_put_contents($f,"[]"); }

// --- FUNCTIONS ---
function readJson($file){ $a=json_decode(file_get_contents($file),true); return is_array($a)?$a:[]; }
function writeJson($file,$arr){ file_put_contents($file,json_encode($arr,JSON_PRETTY_PRINT)); }

// --- PRODUCTS ---
$products = [
101=>["title"=>"Nike Air Max 270 shoes","price"=>11999,"img"=>"images/s1.jpg","category"=>"Men","brand"=>"Nike","description"=>"Revolutionary Air Max 270 with superior cushioning and modern design. Perfect for running and casual wear.", "sizes"=>["8","9","10","11"], "colors"=>["Black","White","Blue"]],
102=>["title"=>"Adidas Ultraboost 21 shoes","price"=>15999,"img"=>"images/s2.webp","category"=>"Men","brand"=>"Adidas","description"=>"Premium running shoes with Boost technology for maximum energy return and comfort.", "sizes"=>["8","9","10","11","12"], "colors"=>["Black","White","Grey"]],
103=>["title"=>"Puma RS-X Reinvention shoes","price"=>8999,"img"=>"images/s3.jpg","category"=>"Men","brand"=>"Puma","description"=>"Bold and chunky sneakers with retro-inspired design and modern comfort technology.", "sizes"=>["7","8","9","10","11"], "colors"=>["White","Black","Red"]],
104=>["title"=>"Reebok Classic Leather shoes","price"=>7499,"img"=>"images/s4.webp","category"=>"Men","brand"=>"Reebok","description"=>"Timeless classic leather sneakers with vintage appeal and everyday comfort.", "sizes"=>["8","9","10","11"], "colors"=>["White","Black","Navy"]],
105=>["title"=>"New Balance 574 shoes","price"=>8499,"img"=>"images/s5.jpg","category"=>"Men","brand"=>"New Balance","description"=>"Iconic 574 series with ENCAP cushioning technology for superior support and style.", "sizes"=>["8","9","10","11","12"], "colors"=>["Grey","Blue","Green"]],
106=>["title"=>"Under Armour HOVR Phantom shoes","price"=>12999,"img"=>"images/s6.jpg","category"=>"Men","brand"=>"Under Armour","description"=>"High-performance running shoes with HOVR technology for zero gravity feel.", "sizes"=>["8","9","10","11"], "colors"=>["Black","Red","White"]],
107=>["title"=>"Skechers Go Walk 5 shoes","price"=>6999,"img"=>"images/s7.webp","category"=>"Men","brand"=>"Skechers","description"=>"Lightweight walking shoes with 5GEN cushioning and breathable mesh upper.", "sizes"=>["8","9","10","11"], "colors"=>["Black","Navy","Grey"]],
108=>["title"=>"ASICS Gel-Kayano 28 shoes","price"=>14999,"img"=>"images/s8.jpg","category"=>"Men","brand"=>"ASICS","description"=>"Premium stability running shoes with GEL technology cushioning for long-distance comfort.", "sizes"=>["8","9","10","11","12"], "colors"=>["White","Blue","Black"]],
109=>["title"=>"Vans Old Skool shoes","price"=>5999,"img"=>"images/s9.jpeg","category"=>"Men","brand"=>"Vans","description"=>"Classic skate shoes with iconic side stripe and durable canvas construction.", "sizes"=>["8","9","10","11"], "colors"=>["Black","White","Checkerboard"]],
110=>["title"=>"Converse Chuck Taylor All Star shoes","price"=>4999,"img"=>"images/s10.jpeg","category"=>"Men","brand"=>"Converse","description"=>"Legendary canvas sneakers that have stood the test of time with timeless style.", "sizes"=>["8","9","10","11","12"], "colors"=>["Black","White","Red"]],
111=>["title"=>"Jordan Air 1 Retro High shoes","price"=>17999,"img"=>"images/s11.jpg","category"=>"Men","brand"=>"Jordan","description"=>"Iconic basketball shoes with Air cushioning and premium leather construction.", "sizes"=>["8","9","10","11","12"], "colors"=>["Black/Red","White/Black","University Blue"]],
112=>["title"=>"Hoka One One Bondi 7 shoes","price"=>15999,"img"=>"images/s12.jpg","category"=>"Men","brand"=>"Hoka","description"=>"Maximum cushioning running shoes with meta-rocker technology for smooth transitions.", "sizes"=>["8","9","10","11"], "colors"=>["Black","White","Blue"]],
113=>["title"=>"Brooks Ghost 14 shoes","price"=>12999,"img"=>"images/s13.jpg","category"=>"Men","brand"=>"Brooks","description"=>"Neutral running shoes with DNA LOFT cushioning for soft and smooth ride.", "sizes"=>["8","9","10","11","12"], "colors"=>["Grey","Blue","Black"]],
114=>["title"=>"Saucony Endorphin Speed 2 shoes","price"=>13999,"img"=>"images/s14.jpg","category"=>"Men","brand"=>"Saucony","description"=>"Performance running shoes with SPEEDROLL technology for faster transitions.", "sizes"=>["8","9","10","11"], "colors"=>["White","Yellow","Black"]],
115=>["title"=>"On Cloudstratus shoes","price"=>16999,"img"=>"images/s15.webp","category"=>"Men","brand"=>"On","description"=>"Premium running shoes with double CloudTec® elements for maximum cushioning.", "sizes"=>["8","9","10","11"], "colors"=>["White","Black","Blue"]],
116=>["title"=>"Mizuno Wave Rider 25 shoes","price"=>11999,"img"=>"images/s16.webp","category"=>"Men","brand"=>"Mizuno","description"=>"Neutral running shoes with MIZUNO WAVE technology for stability and cushioning.", "sizes"=>["8","9","10","11","12"], "colors"=>["Blue","White","Black"]],
117=>["title"=>"Altra Torin 5 shoes","price"=>13999,"img"=>"images/s17.jpg","category"=>"Men","brand"=>"Altra","description"=>"Natural running shoes with FootShape™ toe box and balanced cushioning.", "sizes"=>["8","9","10","11"], "colors"=>["Black","White","Green"]],
118=>["title"=>"Salomon Speedcross 5 shoes","price"=>12999,"img"=>"images/s18.webp","category"=>"Men","brand"=>"Salomon","description"=>"Trail running shoes with aggressive grip and precise foothold for rough terrain.", "sizes"=>["8","9","10","11"], "colors"=>["Black","Blue","Green"]],
119=>["title"=>"Merrell Moab 2 Vent shoes","price"=>8999,"img"=>"images/s19.jpg","category"=>"Men","brand"=>"Merrell","description"=>"Hiking shoes with air cushion in heel and breathable mesh lining.", "sizes"=>["8","9","10","11","12"], "colors"=>["Brown","Green","Black"]],
120=>["title"=>"Timberland Premium Boots","price"=>15999,"img"=>"images/s20.webp","category"=>"Men","brand"=>"Timberland","description"=>"Classic waterproof leather boots with premium construction and durability.", "sizes"=>["8","9","10","11","12"], "colors"=>["Wheat","Black","Brown"]],
121=>["title"=>"Clarks Desert Boots","price"=>10999,"img"=>"images/s21.webp","category"=>"Men","brand"=>"Clarks","description"=>"Iconic desert boots with crepe sole and premium suede leather.", "sizes"=>["8","9","10","11"], "colors"=>["Brown","Black","Sand"]],
122=>["title"=>"HRX Running Shoes","price"=>2599,"img"=>"images/21.webp","category"=>"Men","brand"=>"HRX","description"=>"Performance running shoes with superior comfort and modern design.", "sizes"=>["8","9","10","11"], "colors"=>["Black","Blue","Grey"]],
123=>["title"=>"Nike Air Force 1 shoes","price"=>8999,"img"=>"images/22.webp","category"=>"Men","brand"=>"Nike","description"=>"Classic basketball-inspired sneakers with durable leather construction.", "sizes"=>["8","9","10","11","12"], "colors"=>["White","Black","Triple White"]],
124=>["title"=>"Adidas Stan Smith shoes","price"=>7999,"img"=>"images/s24.webp","category"=>"Men","brand"=>"Adidas","description"=>"Iconic tennis shoes with premium leather and classic green heel tab.", "sizes"=>["8","9","10","11"], "colors"=>["White","Green","Black"]],
];

// Check if viewing product details
$viewProduct = isset($_GET['view']) ? intval($_GET['view']) : null;
$currentProduct = null;
if ($viewProduct && isset($products[$viewProduct])) {
    $currentProduct = $products[$viewProduct];
    $currentProduct['id'] = $viewProduct;
}

// --- SEARCH FUNCTIONALITY ---
$searchQuery = strtolower(trim($_GET['search'] ?? ''));
if ($searchQuery !== '' && !$currentProduct) {
    $products = array_filter($products, function ($p) use ($searchQuery) {
        return strpos(strtolower($p['title']), $searchQuery) !== false ||
               strpos(strtolower($p['brand']), $searchQuery) !== false;
    });
}

// --- USERS & AUTH ---
$users = readJson('users.txt');
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['action'])){
    $action=$_POST['action']; 
    $email=strtolower(trim($_POST['email']??'')); 
    $password=trim($_POST['password']??'');

    if($action==='signup'){
        foreach($users as $u) if($u['email']===$email){ $_SESSION['msg']="❌ Email already registered!"; header("Location:".$_SERVER['PHP_SELF']); exit; }
        $users[]=['email'=>$email,'password'=>password_hash($password,PASSWORD_DEFAULT)];
        writeJson('users.txt',$users);
        $_SESSION['user']=$email; $_SESSION['msg']="✅ Signup successful!";
        header("Location:".$_SERVER['PHP_SELF']); exit;
    }

    if($action==='login'){
        $found=false;
        foreach($users as $u) if($u['email']===$email && password_verify($password,$u['password'])){$found=true; break;}
        $_SESSION['msg']=$found?"✅ Login successful!":"❌ Invalid credentials!";
        if($found) $_SESSION['user']=$email;
        header("Location:".$_SERVER['PHP_SELF']); exit;
    }

    if($action==='logout'){
        session_destroy(); session_start();
        $_SESSION['msg']="✅ Logged out!";
        header("Location:".$_SERVER['PHP_SELF']); exit;
    }
}

// --- SESSION CART & WISHLIST ---
if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if(!isset($_SESSION['wishlist'])) $_SESSION['wishlist']=[];

if(isset($_SESSION['user'])){
    $carts = readJson('carts.txt');
    foreach($carts as $c) if($c['user']===$_SESSION['user'] && isset($c['cart'])) $_SESSION['cart']=$c['cart'];
    $wishlists = readJson('wishlists.txt');
    foreach($wishlists as $w) if($w['user']===$_SESSION['user'] && isset($w['wishlist'])) $_SESSION['wishlist']=$w['wishlist'];
}

// --- CART ACTIONS (AJAX) ---
if(isset($_POST['cart_action'])){
    $pid = intval($_POST['product_id']??0);
    $qty = intval($_POST['qty']??1);
    $carts = readJson('carts.txt');
    $foundIndex = null;
    foreach($carts as $i=>$c){ if($c['user']===($_SESSION['user']??'')) { $foundIndex=$i; break; } }
    if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
    switch($_POST['cart_action']){
        case 'add':
            if(isset($_SESSION['cart'][$pid])) $_SESSION['cart'][$pid]['qty']+=1;
            else $_SESSION['cart'][$pid]=['title'=>$products[$pid]['title'],'price'=>$products[$pid]['price'],'img'=>$products[$pid]['img'],'qty'=>1];
            break;
        case 'update':
            if(isset($_SESSION['cart'][$pid])) $_SESSION['cart'][$pid]['qty']=$qty;
            break;
        case 'remove':
            if(isset($_SESSION['cart'][$pid])) unset($_SESSION['cart'][$pid]);
            break;
        case 'fetch':
            echo json_encode($_SESSION['cart']); exit;
    }
    if($foundIndex!==null){ $carts[$foundIndex]['cart']=$_SESSION['cart']; }
    else if(isset($_SESSION['user'])){ $carts[]=['user'=>$_SESSION['user'],'cart'=>$_SESSION['cart']]; }
    writeJson('carts.txt',$carts);
    echo json_encode($_SESSION['cart']); exit;
}

// --- WISHLIST ACTIONS (AJAX) ---
if(isset($_POST['wishlist_action'])){
    $pid = intval($_POST['product_id']??0);
    
    // Initialize wishlist if not set
    if(!isset($_SESSION['wishlist'])) $_SESSION['wishlist'] = []; 
    
    // Check if product is already in wishlist
    $wishlistIndex = array_search($pid, $_SESSION['wishlist']);
    
    if($wishlistIndex !== false) {
        // Remove from wishlist
        unset($_SESSION['wishlist'][$wishlistIndex]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Reindex array
        $action = 'removed';
    } else {
        // Add to wishlist
        $_SESSION['wishlist'][] = $pid;
        $action = 'added';
    }

    // Save to file if user is logged in
    if(isset($_SESSION['user'])) {
        $wishlists = readJson('wishlists.txt');
        $foundIndex = null;
        
        // Find user's wishlist
        foreach($wishlists as $i=>$w) { 
            if($w['user'] === $_SESSION['user']) { 
                $foundIndex = $i; 
                break; 
            } 
        }
        
        if($foundIndex !== null) {
            $wishlists[$foundIndex]['wishlist'] = $_SESSION['wishlist'];
        } else {
            $wishlists[] = ['user' => $_SESSION['user'], 'wishlist' => $_SESSION['wishlist']];
        }
        
        writeJson('wishlists.txt', $wishlists);
    }
    
    echo json_encode([
        'status' => 'success',
        'action' => $action,
        'wishlist' => $_SESSION['wishlist'],
        'isInWishlist' => ($action === 'added')
    ]);
    exit;
}

// --- CHECKOUT ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    if (!isset($_SESSION['user'])) {
        echo "Please login to checkout!";
        exit;
    }
    $name = trim($_POST['name'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $payment = $_POST['payment'] ?? 'COD';
    if ($name && $contact && $address) {
        $orders = readJson('orders.txt');
        $orders[] = [
            'id' => uniqid(),
            'user' => $_SESSION['user'],
            'name' => $name,
            'contact' => $contact,
            'address' => $address,
            'payment' => $payment,
            'items' => $_SESSION['cart'],
            'date' => date('Y-m-d H:i:s'),
            'status' => 'Success'
        ];
        writeJson('orders.txt', $orders);
        $_SESSION['cart'] = [];
        $carts = readJson('carts.txt');
        $carts = array_filter($carts, function ($c) {
            return $c['user'] !== ($_SESSION['user'] ?? '');
        });
        writeJson('carts.txt', array_values($carts));
        echo "Order placed successfully!";
        exit;
    } else {
        echo "Please fill all fields!";
        exit;
    }
}

// --- FILTERS ---
$categories = array_unique(array_map(fn($p)=>$p['category'],$products));
$brands = array_unique(array_map(fn($p)=>$p['brand'],$products));
sort($categories); sort($brands);

// --- FETCH USER ORDERS (AJAX) ---
if(isset($_POST['orders_action'])){
    if(!isset($_SESSION['user'])){ echo json_encode([]); exit; }
    $orders = readJson('orders.txt');
    $userOrders = array_filter($orders, fn($o)=>$o['user']===$_SESSION['user']);
    echo json_encode(array_values($userOrders));
    exit;
}

// --- CANCEL ORDER (AJAX) ---
if(isset($_POST['cancel_order'])){
    $orderId = $_POST['order_id'] ?? '';
    if(!isset($_SESSION['user']) || !$orderId){
        echo json_encode(['status'=>0,'message'=>'❌ Invalid request!']); exit;
    }
    $orders = readJson('orders.txt');
    $found = false;
    foreach($orders as &$order){
        if($order['user']===$_SESSION['user'] && $order['id']===$orderId){
            if(isset($order['status']) && strtolower($order['status'])==='cancelled'){
                echo json_encode(['status'=>0,'message'=>'❌ Order already cancelled!']); exit;
            }
            $order['status'] = 'Cancelled';
            $found = true;
            break;
        }
    }
    if($found){
        writeJson('orders.txt',$orders);
        echo json_encode(['status'=>1,'message'=>'✅ Order cancelled successfully!']);
    } else {
        echo json_encode(['status'=>0,'message'=>'❌ Order not found!']);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentProduct ? $currentProduct['title'] . ' - Myntra Clone' : 'Premium Shoes Collection - Myntra Clone' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* =============== GLOBAL STYLES =============== */
        body {
            background: #f5f5f5;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        /* =============== NAVBAR STYLES =============== */
        .navbar {
            padding: 0.5rem 1rem;
        }
        .navbar-nav .nav-link {
            color: #000 !important;
            margin: 0 10px;
            font-weight: 600;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ff3f6c !important;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .dropdown-menu .dropdown-item {
            color: #000 !important;
            padding: 8px 16px;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #ff3f6c;
            color: #fff !important;
        }

        /* =============== PRODUCT CARD STYLES =============== */
        .products-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: 0 -8px;
        }
        
        .product-item {
            padding: 8px;
            width: 20%; /* 5 products per row on large screens */
            margin-bottom: 16px;
        }
        
        .product-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .08);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
        }
        
        .product-img-container {
            position: relative;
            width: 100%;
            padding-top: 125%; /* 4:5 aspect ratio */
            overflow: hidden;
        }
        
        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .wishlist {
            position: absolute;
            top: 8px;
            right: 10px;
            font-size: 1.3rem;
            color: #ccc;
            cursor: pointer;
            transition: all 0.3s ease;
            user-select: none;
            z-index: 10;
        }
        .wishlist.active,
        .wishlist:hover {
            color: #ff3366 !important;
            transform: scale(1.1);
        }
        
        .product-details {
            padding: 12px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .product-brand {
            font-size: 14px;
            color: #535766;
            margin-bottom: 4px;
        }
        
        .product-title {
            font-size: 14px;
            font-weight: 500;
            color: #282c3f;
            line-height: 1.2;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }
        
        .product-price {
            font-size: 14px;
            font-weight: 700;
            color: #282c3f;
            margin-bottom: 8px;
        }
        
        .product-rating {
            font-size: 12px;
            color: #535766;
            margin-bottom: 8px;
        }
        
        .product-size {
            font-size: 12px;
            color: #535766;
            margin-bottom: 12px;
        }

        /* =============== PRODUCT DETAILS PAGE STYLES =============== */
        .product-detail-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .product-detail-image {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .product-detail-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #282c3f;
        }
        
        .product-detail-brand {
            font-size: 18px;
            color: #535766;
            margin-bottom: 15px;
        }
        
        .product-detail-price {
            font-size: 22px;
            font-weight: 700;
            color: #ff3f6c;
            margin-bottom: 15px;
        }
        
        .product-detail-description {
            font-size: 16px;
            line-height: 1.6;
            color: #535766;
            margin-bottom: 20px;
        }
        
        .product-detail-specs {
            margin-bottom: 20px;
        }
        
        .spec-item {
            margin-bottom: 10px;
            display: flex;
        }
        
        .spec-label {
            font-weight: 600;
            width: 120px;
            color: #282c3f;
        }
        
        .spec-value {
            color: #535766;
        }
        
        .size-option, .color-option {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 8px;
            margin-bottom: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .size-option:hover, .color-option:hover {
            border-color: #ff3f6c;
        }
        
        .size-option.selected, .color-option.selected {
            border-color: #ff3f6c;
            background-color: #ff3f6c;
            color: white;
        }
        
        .shoe-features {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .feature-icon {
            width: 30px;
            margin-right: 10px;
            color: #ff3f6c;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn-add-to-cart {
            background-color: #ff3f6c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 600;
            flex: 2;
        }
        
        .btn-wishlist {
            background-color: white;
            color: #ff3f6c;
            border: 1px solid #ff3f6c;
            padding: 12px;
            border-radius: 5px;
            flex: 1;
        }
        
        .btn-wishlist .fa-heart.text-danger {
            color: #ff3366 !important;
        }
        
        .back-to-products {
            display: inline-block;
            margin-bottom: 20px;
            color: #ff3f6c;
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-to-products:hover {
            text-decoration: underline;
        }

        /* =============== WISHLIST PAGE STYLES =============== */
        .wishlist-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .wishlist-empty {
            text-align: center;
            padding: 40px;
            color: #535766;
        }
        
        .wishlist-empty i {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ddd;
        }

        /* =============== BANNER SLIDER STYLES =============== */
        .banner-slider {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin: 0 auto;
            border-radius: 10px;
        }
        .banner-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .banner-slider img.active {
            opacity: 1;
        }

        /* =============== MODAL STYLES =============== */
        .modal-bg {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1500;
            backdrop-filter: blur(3px);
        }
        .modal-content-myntra {
            background: #fff;
            width: 90%;
            max-width: 550px;
            max-height: 85vh;
            overflow-y: auto;
            border-radius: 15px;
            padding: 20px 25px;
            position: relative;
            animation: scaleIn 0.3s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        @keyframes scaleIn {
            from {transform: scale(0.8); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }
        .close-modal {
            position: absolute;
            top: 12px;
            right: 18px;
            font-size: 22px;
            cursor: pointer;
            color: #666;
            transition: 0.2s;
            z-index: 10;
        }
        .close-modal:hover { color: #000; }

        /* =============== ALERT POPUP STYLES =============== */
        #alertPopup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #0d6efd;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 500;
            z-index: 2000;
            display: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            animation: fadeInOut 2.5s ease;
        }
        @keyframes fadeInOut {
            0% {opacity: 0; transform: translate(-50%, -10px);}
            10% {opacity: 1; transform: translate(-50%, 0);}
            90% {opacity: 1; transform: translate(-50%, 0);}
            100% {opacity: 0; transform: translate(-50%, -10px);}
        }

        /* =============== CART ITEMS SECTION =============== */
        .cart-items-section {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 10px;
            background: #fafafa;
        }
        .cart-items-section::-webkit-scrollbar {
            width: 6px;
        }
        .cart-items-section::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        /* =============== CHECKOUT FORM STYLES =============== */
        .checkout-form .form-control,
        .checkout-form .form-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: none;
            transition: 0.2s;
        }
        .checkout-form .form-control:focus,
        .checkout-form .form-select:focus {
            border-color: #ff3f6c;
            box-shadow: 0 0 0 0.15rem rgba(255,63,108,0.2);
        }

        /* =============== BUTTON STYLES =============== */
        .btn-danger {
            background-color: #ff3f6c;
            border: none;
            border-radius: 10px;
            transition: 0.3s;
        }
        .btn-danger:hover {
            background-color: #e8365f;
        }
        .btn-outline-danger {
            border: 1px solid #dc3545;
            color: #dc3545;
            background: transparent;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-outline-danger:hover {
            background: #dc3545;
            color: #fff;
        }
        .btn-outline-success {
            border: 1px solid #198754;
            color: #198754;
            border-radius: 20px;
        }
        .btn-outline-success:hover {
            background: #198754;
            color: #fff;
        }

        /* =============== ORDER CARD STYLES =============== */
        .card {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            transition: all 0.25s ease;
        }
        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card-body {
            padding: 15px;
        }

        /* =============== RESPONSIVE STYLES =============== */
        @media (max-width: 1200px) {
            .product-item {
                width: 25%; /* 4 products per row */
            }
        }
        
        @media (max-width: 992px) {
            .product-item {
                width: 33.33%; /* 3 products per row */
            }
        }
        
        @media (max-width: 768px) {
            .product-item {
                width: 50%; /* 2 products per row */
            }
            
            .banner-slider {
                height: 250px;
            }
            .navbar-nav {
                text-align: center;
            }
            .dropdown-menu {
                text-align: center;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
        
        @media (max-width: 576px) {
            .product-item {
                width: 50%; /* 2 products per row */
            }
            
            .banner-slider {
                height: 180px;
            }
            .modal-content-myntra {
                width: 95%;
                padding: 15px;
            }
        }
        
        /* =============== PAGE HEADER STYLES =============== */
        .page-header {
            background: linear-gradient(135deg, #ff3f6c 0%, #ff6b9c 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0 0 15px 15px;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        
        .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }
        
        .breadcrumb-item.active {
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>

<div id="alertPopup" class="alert-popup"></div>

<!-- NAVBAR FIXED -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="images/myntralogo.jpg" height="70" width="100" alt="Myntra Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Men Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="menDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Men
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="menDropdown">
                        <li><a class="dropdown-item" href="shirt.php">Shirts</a></li>
                        <li><a class="dropdown-item" href="tshirt.php">T-Shirts</a></li>
                        <li><a class="dropdown-item" href="shoes.php">Shoes</a></li>
                    </ul>
                </li>

                <!-- Women Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="womenDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Women
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="womenDropdown">
                        <li><a class="dropdown-item" href="kurtasets.php">Kurta Sets</a></li>
                        <li><a class="dropdown-item" href="dress.php">Dresses</a></li>
                    </ul>
                </li>

                <!-- Kids Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="kidsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kids
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kidsDropdown">
                        <li><a class="dropdown-item" href="clothing.php">Clothing</a></li>
                        <li><a class="dropdown-item" href="toys.php">Toys</a></li>
                    </ul>
                </li>

                <!-- Home Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Home
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="homeDropdown">
                        <li><a class="dropdown-item" href="homeDecor.php">Home Decor</a></li>
                        <li><a class="dropdown-item" href="kitchen.php">Kitchen</a></li>
                    </ul>
                </li>

                <!-- Beauty Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="beautyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Beauty
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="beautyDropdown">
                        <li><a class="dropdown-item" href="skincare.php">Skincare</a></li>
                        <li><a class="dropdown-item" href="makeup.php">Makeup</a></li>
                    </ul>
                </li>

                <!-- Gen-Z Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" id="genzDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gen-Z
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="genzDropdown">
                        <li><a class="dropdown-item" href="fashion.php">Fashion</a></li>
                        <li><a class="dropdown-item" href="as.php">Accessories</a></li>
                    </ul>
                </li>
            </ul>

                
            
            <!-- Search -->
            <form class="d-flex me-3">
                <input id="searchInput" class="form-control" type="search" placeholder="Search for shoes, brands and more" style="width:300px;border-radius:20px;">
            </form>

            <!-- User / Cart -->
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-dark btn-sm me-2 position-relative" onclick="openCartModal()">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0 ?>
                    </span>
                </button>
                
                <button class="btn btn-outline-primary btn-sm me-2 position-relative" onclick="openWishlistModal()">
                    <i class="fa fa-heart"></i> Wishlist
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0 ?>
                    </span>
                </button>
                
                <?php if(isset($_SESSION['user'])): ?>
                <button class="btn btn-outline-primary btn-sm ms-2" onclick="openOrdersModal()">
                    <i class="fa fa-list"></i> Orders
                </button>
                <?php endif; ?>

                <?php if(isset($_SESSION['user'])): ?>
                <div class="dropdown ms-2">
                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i> <?= htmlspecialchars($_SESSION['user']) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form method="POST" class="m-0">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit" class="dropdown-item text-dark">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <?php else: ?>
                <button class="btn btn-warning btn-sm ms-2" onclick="document.getElementById('auth').style.display='flex'">
                    <i class="fa fa-user"></i> Login / Signup
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Premium Shoes Collection</li>
            </ol>
        </nav>
        <h1 class="page-title">Premium Shoes Collection</h1>
        <p class="page-subtitle">Discover the latest trends in footwear from top brands</p>
    </div>
</div>

<?php if($currentProduct): ?>
<!-- PRODUCT DETAILS PAGE -->
<div class="container my-4">
   <a href="?" class="back-to-products"><i class="fa fa-arrow-left"></i> Back to All Shoes</a>
    
    <div class="product-detail-container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $currentProduct['img'] ?>" class="product-detail-image" alt="<?= $currentProduct['title'] ?>">
            </div>
            <div class="col-md-6">
                <h1 class="product-detail-title"><?= $currentProduct['title'] ?></h1>
                <div class="product-detail-brand">by <?= $currentProduct['brand'] ?></div>
                <div class="product-detail-price">₹<?= number_format($currentProduct['price']) ?></div>
                
                <div class="product-rating mb-3">
                    <span class="text-warning">★★★★☆</span>
                    <span class="text-muted">(4.2) | 186 Reviews</span>
                </div>
                
                <div class="product-detail-description">
                    <?= $currentProduct['description'] ?>
                </div>
                
                <!-- Shoe Features -->
                <div class="shoe-features">
                    <h6 class="fw-bold mb-3">Key Features:</h6>
                    <div class="feature-item">
                        <i class="fas fa-running feature-icon"></i>
                        <span>Premium cushioning for maximum comfort</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-wind feature-icon"></i>
                        <span>Breathable mesh upper</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shoe-prints feature-icon"></i>
                        <span>Durable rubber outsole</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-truck feature-icon"></i>
                        <span>Free delivery & 30-day returns</span>
                    </div>
                </div>
                
                <div class="product-detail-specs">
                    <?php if(isset($currentProduct['sizes']) && !empty($currentProduct['sizes'])): ?>
                    <div class="spec-item">
                        <div class="spec-label">Size (US):</div>
                        <div class="spec-value">
                            <?php foreach($currentProduct['sizes'] as $size): ?>
                                <span class="size-option" onclick="selectSize(this)"><?= $size ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($currentProduct['colors']) && !empty($currentProduct['colors'])): ?>
                    <div class="spec-item">
                        <div class="spec-label">Color:</div>
                        <div class="spec-value">
                            <?php foreach($currentProduct['colors'] as $color): ?>
                                <span class="color-option" onclick="selectColor(this)"><?= $color ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="spec-item">
                        <div class="spec-label">Category:</div>
                        <div class="spec-value"><?= $currentProduct['category'] ?> Shoes</div>
                    </div>
                    
                    <div class="spec-item">
                        <div class="spec-label">Brand:</div>
                        <div class="spec-value"><?= $currentProduct['brand'] ?></div>
                    </div>
                    
                    <div class="spec-item">
                        <div class="spec-label">Delivery:</div>
                        <div class="spec-value">Free delivery within 3-5 days</div>
                    </div>
                    
                    <div class="spec-item">
                        <div class="spec-label">Returns:</div>
                        <div class="spec-value">Easy 30-day return policy</div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button class="btn-add-to-cart" onclick="addToCart(<?= $currentProduct['id'] ?>)">
                        <i class="fa fa-shopping-cart"></i> ADD TO CART
                    </button>
                    <button class="btn-wishlist" onclick="toggleWishlist(<?= $currentProduct['id'] ?>)">
                        <i class="fa fa-heart <?= in_array($currentProduct['id'], $_SESSION['wishlist'] ?? []) ? 'text-danger' : '' ?>"></i> 
                        <?= in_array($currentProduct['id'], $_SESSION['wishlist'] ?? []) ? 'IN WISHLIST' : 'WISHLIST' ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>
<!-- BANNER -->
<div class="container-fluid my-3">
    <div class="banner-slider">
        <img src="images/banner1nm.jpg" class="active">
        <img src="images/banner2n.webp">
        <img src="images/bannern.png">
    </div>
</div>

<!-- PRODUCTS GRID -->
<div class="container-fluid my-4">
    <div class="products-grid" id="productsGrid">
        <?php foreach($products as $id => $p): 
            $isInWishlist = in_array($id, $_SESSION['wishlist'] ?? []);
            $wlClass = $isInWishlist ? 'active' : ''; 
        ?>
        <div 
            class="product-item" 
            data-title="<?= strtolower($p['title']) ?>" 
            data-brandname="<?= strtolower($p['brand']) ?>"
        >
            <div class="card product-card">
                <div class="product-img-container">
                    <img src="<?= $p['img'] ?>" class="product-img" alt="<?= $p['title'] ?>">
                    <span class="wishlist <?= $wlClass ?>" onclick="toggleWishlist(<?= $id ?>)">&#10084;</span>
                </div>
                <div class="product-details">
                    <div class="product-brand"><?= $p['brand'] ?></div>
                    <div class="product-title"><?= $p['title'] ?></div>
                    <div class="product-price">₹<?= number_format($p['price']) ?></div>
                    <div class="product-rating">
                        <span class="text-warning">★★★★☆</span>
                        <span class="text-muted">(4.2)</span>
                    </div>
                    <div class="product-size">Category: <?= $p['category'] ?></div>
                    <button class="btn btn-sm btn-primary w-100" onclick="addToCart(<?= $id ?>)">Add to Cart</button>
                    <button class="btn btn-sm btn-outline-secondary w-100 mt-1" onclick="viewProduct(<?= $id ?>)">View Details</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- CART MODAL -->
<div id="cartModal" class="modal-bg" style="display:none;">
    <div class="modal-content-myntra" id="cartContent">
        <span class="close-modal" onclick="document.getElementById('cartModal').style.display='none'">&times;</span>

        <!-- Header -->
        <h4 class="text-center mb-3 fw-bold text-uppercase text-primary">🛍 Your Shopping Cart</h4>
        <div id="cartItems" class="cart-items-section mb-3">
            <!-- Cart items will appear here dynamically -->
        </div>

        <hr class="my-3">

        <!-- Checkout Section -->
        <h5 class="fw-semibold text-center mb-2 text-success">Checkout Details</h5>
        <form id="checkoutForm" class="checkout-form p-2">
            <div class="mb-2">
                <label class="form-label fw-semibold">Full Name</label>
                <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label fw-semibold">Contact Number</label>
                <input type="text" name="contact" placeholder="Enter contact number" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" required 
                    value="<?=isset($_SESSION['user'])?htmlspecialchars($_SESSION['user']):''?>">
            </div>
            <div class="mb-2">
                <label class="form-label fw-semibold">Delivery Address</label>
                <textarea name="address" rows="3" placeholder="Enter complete address" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Payment Method</label>
                <select name="payment" class="form-select">
                    <option value="COD">💵 Cash on Delivery</option>
                    <option value="UPI">📱 UPI</option>
                    <option value="Card">💳 Credit/Debit Card</option>
                </select>
            </div>

            <button type="button" class="btn btn-danger w-100 py-2 fw-bold" onclick="placeOrder()">Place Order</button>
        </form>
    </div>
</div>

<!-- WISHLIST MODAL -->
<div id="wishlistModal" class="modal-bg" style="display:none;">
    <div class="modal-content-myntra">
        <span class="close-modal" onclick="document.getElementById('wishlistModal').style.display='none'">&times;</span>
        <h4 class="mb-3 text-center text-danger"><i class="fa fa-heart"></i> My Wishlist</h4>
        <div id="wishlistItems" class="cart-items-section">
            <!-- Wishlist items will appear here dynamically -->
        </div>
    </div>
</div>

<!-- ORDERS MODAL -->
<div id="ordersModal" class="modal-bg" style="display:none;">
    <div class="modal-content-myntra">
        <span class="close-modal" onclick="document.getElementById('ordersModal').style.display='none'">&times;</span>
        <h4 class="mb-3 text-center text-danger"><i class="fa fa-box"></i> My Orders</h4>
        <div id="ordersList"></div>
    </div>
</div>

<!-- LOGIN/SIGNUP MODAL -->
<div id="auth" class="modal-bg" style="display:none;">
    <div class="modal-content-myntra">
        <span class="close-modal" onclick="document.getElementById('auth').style.display='none'">&times;</span>
        <h5>Login / Signup</h5>
        <form method="POST" class="mb-2">
            <input type="hidden" name="action" value="login">
            <input type="email" name="email" class="form-control my-1" placeholder="Email" required>
            <input type="password" name="password" class="form-control my-1" placeholder="Password" required>
            <button class="btn btn-primary w-100">Login</button>
        </form>
        <form method="POST">
            <input type="hidden" name="action" value="signup">
            <input type="email" name="email" class="form-control my-1" placeholder="Email" required>
            <input type="password" name="password" class="form-control my-1" placeholder="Password" required>
            <button class="btn btn-warning w-100">Signup</button>
        </form>
    </div>
</div>

<!-- PROPER SCRIPT LOADING ORDER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ===================== ALERT POPUP =====================
function showAlert(msg, color = "#0d6efd") {
    const alertBox = document.getElementById("alertPopup");
    if (!alertBox) return;
    alertBox.style.background = color;
    alertBox.innerHTML = msg;
    alertBox.style.display = "block";
    setTimeout(() => (alertBox.style.display = "none"), 2500);
}

// ===================== PRODUCT DETAILS FUNCTIONS =====================
function viewProduct(productId) {
    window.location.href = "?view=" + productId;
}

function selectSize(element) {
    document.querySelectorAll('.size-option').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
}

function selectColor(element) {
    document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
}

// ===================== WISHLIST FUNCTIONS =====================
function openWishlistModal() {
    document.getElementById("wishlistModal").style.display = "flex";
    fetchWishlist();
}

function fetchWishlist() {
    const wishlistIds = <?= json_encode($_SESSION['wishlist'] ?? []) ?>;
    const products = <?= json_encode($products) ?>;
    
    let html = "";
    
    if (wishlistIds.length === 0) {
        html = `
        <div class="wishlist-empty">
            <i class="fa fa-heart"></i>
            <h5>Your wishlist is empty</h5>
            <p>Add shoes you love to your wishlist</p>
        </div>`;
    } else {
        wishlistIds.forEach(productId => {
            const product = products[productId];
            if (product) {
                html += `
                <div class="d-flex align-items-center mb-3 p-2 border rounded">
                    <img src="${product.img}" width="60" height="60" class="me-3 object-fit-cover rounded" 
                         style="object-fit: cover; border-radius: 8px;">
                    <div class="flex-grow-1">
                        <div class="fw-semibold">${product.title}</div>
                        <div class="text-muted small">${product.brand}</div>
                        <div class="fw-bold text-primary">₹${product.price.toLocaleString()}</div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <button class="btn btn-sm btn-primary" onclick="addToCart(${productId})">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="toggleWishlist(${productId}, true)">
                            <i class="fa fa-trash"></i> Remove
                        </button>
                    </div>
                </div>`;
            }
        });
    }
    
    document.getElementById("wishlistItems").innerHTML = html;
}

function toggleWishlist(pid, fromWishlistModal = false) {
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "wishlist_action=toggle&product_id=" + pid
    })
    .then((r) => r.json())
    .then((data) => {
        if (data.status === 'success') {
            // Update all wishlist icons on the page
            document.querySelectorAll(`.wishlist[onclick*="${pid}"]`).forEach(el => {
                if (data.isInWishlist) {
                    el.classList.add("active");
                    if (!fromWishlistModal) {
                        showAlert("❤️ Added to wishlist");
                    }
                } else {
                    el.classList.remove("active");
                    if (!fromWishlistModal) {
                        showAlert("💔 Removed from wishlist");
                    }
                }
            });
            
            // Update product details page wishlist button if on that page
            const wishlistBtn = document.querySelector('.btn-wishlist');
            if (wishlistBtn && <?= $currentProduct ? 'true' : 'false' ?>) {
                if (data.isInWishlist) {
                    wishlistBtn.innerHTML = '<i class="fa fa-heart text-danger"></i> IN WISHLIST';
                } else {
                    wishlistBtn.innerHTML = '<i class="fa fa-heart"></i> WISHLIST';
                }
            }
            
            // Update wishlist badge count
            const wishlistBadge = document.querySelector('.btn-outline-primary .badge');
            if (wishlistBadge) {
                wishlistBadge.textContent = data.wishlist.length;
            }
            
            // Refresh wishlist modal if open
            if (document.getElementById("wishlistModal").style.display === "flex") {
                fetchWishlist();
            }
        }
    })
    .catch(error => {
        console.error('Error toggling wishlist:', error);
        showAlert("❌ Error updating wishlist", "red");
    });
}

// Initialize wishlist icons on page load
document.addEventListener('DOMContentLoaded', function() {
    const wishlistIds = <?= json_encode($_SESSION['wishlist'] ?? []) ?>;
    
    // Set initial state for all wishlist icons
    wishlistIds.forEach(pid => {
        document.querySelectorAll(`.wishlist[onclick*="${pid}"]`).forEach(el => {
            el.classList.add("active");
        });
    });
});

// ===================== PLACE ORDER (AJAX) =====================
function placeOrder() {
    // Get form data
    const formData = new FormData(document.getElementById('checkoutForm'));
    formData.append('checkout', '1');

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        // Check if order was successful
        if (result.includes("Order placed successfully")) {
            // Show success message
            showAlert("✅ Order placed successfully!", "green");
            
            // Close cart modal
            document.getElementById('cartModal').style.display = 'none';
            
            // Clear cart and refresh page
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            showAlert("❌ " + result, "red");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert("❌ Something went wrong!", "red");
    });
}

// ===================== ORDERS MODAL =====================
function openOrdersModal() {
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "orders_action=fetch"
    })
    .then((res) => res.json())
    .then((data) => {
        let html = '';
        
        if (data.length === 0) {
            html = `
            <div class="text-center p-4">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076504.png" width="100" class="mb-3 opacity-75">
                <h6 class="text-muted">No orders found.</h6>
            </div>`;
        } else {
            data.reverse().forEach((order) => {
                html += `
                <div class="card shadow-sm border-0 mb-3" id="order-${order.id}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">🛍️ Order #${order.id}</h6>
                            <small class="text-muted">${order.date}</small>
                        </div>
                        <hr class="my-2">
                        <p class="mb-1"><strong>Name:</strong> ${order.name}</p>
                        <p class="mb-1"><strong>Contact:</strong> ${order.contact}</p>
                        <p class="mb-1"><strong>Address:</strong> ${order.address}</p>
                        <p class="mb-1"><strong>Payment:</strong> ${order.payment}</p>
                        <p class="mb-1"><strong>Status:</strong> 
                            <span class="badge bg-${order.status === "Cancelled" ? "danger" : "success"}">${order.status}</span>
                        </p>
                        <div class="mt-2">
                            <strong>Items:</strong>
                            <ul class="list-group list-group-flush small mt-2">
                `;
                Object.values(order.items).forEach((it) => {
                    html += `
                    <li class="list-group-item px-0">
                        <div class="d-flex justify-content-between">
                            <span>${it.title} <span class="text-muted">x ${it.qty}</span></span>
                            <span>₹${(it.price * it.qty).toLocaleString()}</span>
                        </div>
                    </li>`;
                });

                html += `
                            </ul>
                        </div>
                        ${
                            order.status !== "Cancelled"
                            ? `<div class="text-end mt-3">
                                <button class="btn btn-sm btn-outline-danger" onclick="cancelOrder('${order.id}')">
                                    <i class="fa fa-times-circle"></i> Cancel Order
                                </button>
                            </div>`
                            : ""
                        }
                    </div>
                </div>`;
            });
        }
        
        document.getElementById("ordersList").innerHTML = html;
        document.getElementById("ordersModal").style.display = "flex";
    })
    .catch(() => showAlert("❌ Failed to load orders!", "red"));
}

// ===================== CANCEL ORDER =====================
function cancelOrder(orderId) {
    if (!confirm("Are you sure you want to cancel this order?")) return;
    
    const formData = new FormData();
    formData.append('cancel_order', '1');
    formData.append('order_id', orderId);

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 1) {
            showAlert("✅ Order cancelled successfully", "green");
            document.getElementById(`order-${orderId}`)?.remove();
        } else {
            showAlert("⚠️ " + result.message, "red");
        }
    })
    .catch(() => showAlert("❌ Error cancelling order!", "red"));
}

// ===================== CART FUNCTIONS =====================
function openCartModal() {
    document.getElementById("cartModal").style.display = "flex";
    fetchCart();
}

function fetchCart() {
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "cart_action=fetch"
    })
    .then((r) => r.json())
    .then((data) => {
        let html = "";
        let total = 0;
        
        if (Object.keys(data).length === 0) {
            html = '<div class="text-center text-muted p-4">Your cart is empty</div>';
        } else {
            for (let id in data) {
                let p = data[id];
                total += p.price * p.qty;
                html += `
                <div class="d-flex align-items-center mb-3 p-2 border rounded">
                    <img src="${p.img}" width="50" height="50" class="me-3 object-fit-cover rounded">
                    <div class="flex-grow-1">
                        <div class="fw-semibold">${p.title}</div>
                        <div class="text-muted small">₹${p.price.toLocaleString()} x 
                        <input type="number" value="${p.qty}" min="1" style="width:50px;" 
                                onchange="updateCart(${id}, this.value)" class="border-0 text-center">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-danger" onclick="removeCart(${id})">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>`;
            }
            html += `<div class="fw-bold fs-5 text-end border-top pt-2">Total: ₹${total.toLocaleString()}</div>`;
        }
        
        document.getElementById("cartItems").innerHTML = html;
    });
}

function addToCart(pid) {
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "cart_action=add&product_id=" + pid
    })
    .then((r) => r.json())
    .then(() => {
        showAlert("✅ Added to cart");
        fetchCart();
    });
}

function updateCart(pid, qty) {
    if (qty < 1) {
        removeCart(pid);
        return;
    }
    
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "cart_action=update&product_id=" + pid + "&qty=" + qty
    })
    .then((r) => r.json())
    .then(fetchCart);
}

function removeCart(pid) {
    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "cart_action=remove&product_id=" + pid
    })
    .then((r) => r.json())
    .then(() => {
        showAlert("🗑️ Item removed from cart");
        fetchCart();
    });
}

// ===================== SEARCH FILTER =====================
document.getElementById("searchInput")?.addEventListener("input", function () {
    const val = this.value.toLowerCase().trim();
    document.querySelectorAll(".product-item").forEach((item) => {
        const title = (item.getAttribute("data-title") || "").toLowerCase();
        const brand = (item.getAttribute("data-brandname") || "").toLowerCase();
        item.style.display = title.includes(val) || brand.includes(val) ? "" : "none";
    });
});

// ===================== BANNER SLIDER =====================
let banners = document.querySelectorAll(".banner-slider img");
let idx = 0;
if (banners.length > 0) {
    setInterval(() => {
        banners[idx].classList.remove("active");
        idx = (idx + 1) % banners.length;
        banners[idx].classList.add("active");
    }, 3000);
}

// ===================== SESSION MESSAGES =====================
<?php if(isset($_SESSION['msg'])): ?>
showAlert("<?= addslashes($_SESSION['msg']) ?>");
<?php unset($_SESSION['msg']); ?>
<?php endif; ?>

// Simple dropdown functionality as fallback
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to all dropdown toggles
    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownMenu = this.nextElementSibling;
            const isOpen = dropdownMenu.classList.contains('show');
            
            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.classList.remove('show');
            });
            
            // Toggle current dropdown
            if (!isOpen) {
                dropdownMenu.classList.add('show');
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
            menu.classList.remove('show');
        });
    });
    
    // Prevent dropdowns from closing when clicking inside them
    document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
        menu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
});
</script>

<?php include 'footer1.php'; ?>
</body>
</html>