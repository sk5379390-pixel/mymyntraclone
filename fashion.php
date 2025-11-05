<?php
session_start();

// --- AUTO-CREATE FILES ---
$files = ['users.txt','carts.txt','wishlists.txt','orders.txt'];
foreach($files as $f){ if(!file_exists($f)) file_put_contents($f,"[]"); }

// --- FUNCTIONS ---
function readJson($file){ $a=json_decode(file_get_contents($file),true); return is_array($a)?$a:[]; }
function writeJson($file,$arr){ file_put_contents($file,json_encode($arr,JSON_PRETTY_PRINT)); }

// --- PRODUCTS - GEN-Z FASHION COLLECTION ---
$products = [
    301 => [
        "title" => "Oversized Graphic Hoodie",
        "price" => 1899,
        "img" => "images/f1.jpg",
        "category" => "Gen-Z",
        "brand" => "Urban Street",
        "description" => "Comfortable oversized hoodie with bold graphic print. Perfect for casual streetwear looks with a relaxed fit and premium cotton fabric.",
        "sizes" => ["XS", "S", "M", "L", "XL"],
        "colors" => ["Black", "Grey", "Navy Blue", "Olive Green"],
        "style" => ["Oversized", "Streetwear", "Casual"],
        "features" => ["Premium Cotton", "Graphic Print", "Kangaroo Pocket", "Ribbed Cuffs"],
        "material" => ["100% Cotton", "Fleece Lining"],
        "color_images" => [
            "Black" => "images/f1.jpg",
            "Grey" => "images/f1.jpg",
            "Navy Blue" => "images/f1.jpg"
        ]
    ],
    302 => [
        "title" => "Cargo Pants with Chains",
        "price" => 2499,
        "img" => "images/f2.jpg",
        "category" => "Gen-Z",
        "brand" => "Street Rebel",
        "description" => "Trendy cargo pants with multiple pockets and detachable chain details. Perfect for creating edgy street-style outfits.",
        "sizes" => ["28", "30", "32", "34", "36"],
        "colors" => ["Black", "Khaki", "Grey", "Army Green"],
        "style" => ["Cargo", "Streetwear", "Utilitarian"],
        "features" => ["Multiple Pockets", "Detachable Chains", "Adjustable Waist", "Tapered Fit"],
        "material" => ["Cotton Twill", "Metal Hardware"],
        "color_images" => [
            "Black" => "images/f2.jpg",
            "Khaki" => "images/f2.jpg",
            "Grey" => "images/f2.jpg"
        ]
    ],
    303 => [
        "title" => "Vintage Band Tee",
        "price" => 899,
        "img" => "images/f3.jpg",
        "category" => "Gen-Z",
        "brand" => "Retro Vibes",
        "description" => "Soft vintage-style band t-shirt with distressed print. Made from premium cotton for ultimate comfort and nostalgic style.",
        "sizes" => ["XS", "S", "M", "L", "XL"],
        "colors" => ["White", "Black", "Grey", "Red"],
        "style" => ["Vintage", "Distressed", "Casual"],
        "features" => ["Vintage Wash", "Distressed Print", "Soft Fabric", "Relaxed Fit"],
        "material" => ["100% Combed Cotton"],
        "color_images" => [
            "White" => "images/f3.jpg",
            "Black" => "images/f3.jpg",
            "Grey" => "images/f3.jpg"
        ]
    ],
    304 => [
        "title" => "Platform Sneakers",
        "price" => 3499,
        "img" => "images/f4.jpg",
        "category" => "Gen-Z",
        "brand" => "Sole High",
        "description" => "Chunky platform sneakers with bold design and comfortable cushioning. Perfect for elevating your street style.",
        "sizes" => ["6", "7", "8", "9", "10"],
        "colors" => ["White", "Black", "Multi-color", "Pink"],
        "style" => ["Chunky", "Platform", "Streetwear"],
        "features" => ["Platform Sole", "Comfort Cushioning", "Bold Design", "Durable Outsole"],
        "material" => ["Synthetic Leather", "Rubber Sole", "Textile Lining"],
        "color_images" => [
            "White" => "images/f4.jpg",
            "Black" => "images/f4.jpg",
            "Multi-color" => "images/f4.jpg"
        ]
    ],
    305 => [
        "title" => "Distressed Denim Jacket",
        "price" => 2999,
        "img" => "images/f5.webp",
        "category" => "Gen-Z",
        "brand" => "Denim Culture",
        "description" => "Edgy denim jacket with strategic distressing and raw hem details. Perfect for layering over any outfit.",
        "sizes" => ["XS", "S", "M", "L", "XL"],
        "colors" => ["Light Blue", "Black", "Dark Blue"],
        "style" => ["Distressed", "Raw Hem", "Oversized"],
        "features" => ["Strategic Distressing", "Raw Hem Details", "Classic Denim", "Versatile Styling"],
        "material" => ["100% Cotton Denim", "Metal Hardware"],
        "color_images" => [
            "Light Blue" => "images/f5.webp",
            "Black" => "images/f5.webp",
            "Dark Blue" => "images/f5.webp"
        ]
    ],
    306 => [
        "title" => "Bucket Hat Collection",
        "price" => 699,
        "img" => "images/f6.jpg",
        "category" => "Gen-Z",
        "brand" => "Head Trend",
        "description" => "Trendy bucket hats in various colors and patterns. The perfect accessory to complete your streetwear look.",
        "sizes" => ["One Size"],
        "colors" => ["Black", "Beige", "Navy", "Floral Print", "Tie-Dye"],
        "style" => ["Streetwear", "Casual", "Fashion"],
        "features" => ["Adjustable Chin Strap", "Structured Brim", "Lightweight", "Packable"],
        "material" => ["Cotton Twill", "Polyester"],
        "color_images" => [
            "Black" => "images/f6.jpg",
            "Beige" => "images/f6.jpg",
            "Floral Print" => "images/f6.jpg"
        ]
    ],
    307 => [
        "title" => "Chain Necklace Set",
        "price" => 1299,
        "img" => "images/f7.webp",
        "category" => "Gen-Z",
        "brand" => "Metal Works",
        "description" => "Layered chain necklace set with pendant details. Adds an edgy touch to any outfit with mixed metal finishes.",
        "types" => ["Layered Set", "Single Chain", "Choker Style"],
        "finish" => ["Silver", "Gold", "Gunmetal"],
        "features" => ["Layered Design", "Pendant Details", "Adjustable Length", "Hypoallergenic"],
        "material" => ["Stainless Steel", "Alloy Pendants"],
        "color_images" => [
            "Silver" => "images/f7.webp",
            "Gold" => "images/f7.webp",
            "Gunmetal" => "images/f7.webp"
        ]
    ],
    308 => [
        "title" => "Wide Leg Jeans",
        "price" => 2299,
        "img" => "images/f8.webp",
        "category" => "Gen-Z",
        "brand" => "Denim Revolution",
        "description" => "90s inspired wide leg jeans with high waist and raw hem details. Perfect for creating vintage-inspired outfits.",
        "sizes" => ["26", "28", "30", "32", "34"],
        "colors" => ["Light Wash", "Black", "Dark Wash"],
        "style" => ["Wide Leg", "High Waist", "Vintage"],
        "features" => ["High Waist", "Wide Leg", "Raw Hem", "Stretch Denim"],
        "material" => ["98% Cotton", "2% Elastane"],
        "color_images" => [
            "Light Wash" => "images/f8.webp",
            "Black" => "images/f8.webp",
            "Dark Wash" => "images/f8.webp"
        ]
    ],
    309 => [
        "title" => "Graphic Sweatpants",
        "price" => 1699,
        "img" => "images/f9.webp",
        "category" => "Gen-Z",
        "brand" => "Comfort Zone",
        "description" => "Comfortable sweatpants with bold graphic prints and adjustable drawstring waist. Perfect for loungewear or casual outings.",
        "sizes" => ["XS", "S", "M", "L", "XL"],
        "colors" => ["Grey", "Black", "Navy", "Olive"],
        "style" => ["Athleisure", "Streetwear", "Comfort"],
        "features" => ["Graphic Print", "Adjustable Waist", "Ribbed Cuffs", "Kangaroo Pocket"],
        "material" => ["French Terry Cotton", "Fleece Lining"],
        "color_images" => [
            "Grey" => "images/f9.webp",
            "Black" => "images/f9.webp",
            "Navy" => "images/f9.webp"
        ]
    ],
    310 => [
        "title" => "Oversized Blazer",
        "price" => 3899,
        "img" => "images/f10.webp",
        "category" => "Gen-Z",
        "brand" => "Modern Tailor",
        "description" => "Oversized blazer with structured shoulders and modern silhouette. Perfect for creating fashion-forward formal or casual looks.",
        "sizes" => ["XS", "S", "M", "L", "XL"],
        "colors" => ["Black", "Beige", "Navy", "Grey"],
        "style" => ["Oversized", "Structured", "Modern"],
        "features" => ["Structured Shoulders", "Oversized Fit", "Notched Lapel", "Single Button"],
        "material" => ["Wool Blend", "Lining"],
        "color_images" => [
            "Black" => "images/f10.webp",
            "Beige" => "images/f10.webp",
            "Navy" => "images/f10.webp"
        ]
    ],
    311 => [
        "title" => "Mini Skirt Set",
        "price" => 1999,
        "img" => "images/f11.webp",
        "category" => "Gen-Z",
        "brand" => "Youth Culture",
        "description" => "Trendy mini skirt with matching top. Perfect for creating coordinated outfits with a youthful, fashionable vibe.",
        "sizes" => ["XS", "S", "M", "L"],
        "colors" => ["Black", "Pink", "Blue", "Green"],
        "style" => ["Mini", "Coordinated Set", "Youthful"],
        "features" => ["Matching Set", "Comfortable Fit", "Versatile Styling", "Trendy Design"],
        "material" => ["Cotton Blend", "Stretch Fabric"],
        "color_images" => [
            "Black" => "images/f11.webp",
            "Pink" => "images/f11.webp",
            "Blue" => "images/f11.webp"
        ]
    ],
    312 => [
        "title" => "Statement Socks Pack",
        "price" => 599,
        "img" => "images/f12.webp",
        "category" => "Gen-Z",
        "brand" => "Sock Game",
        "description" => "Pack of colorful statement socks with bold patterns and designs. Perfect for adding personality to any outfit.",
        "sizes" => ["One Size"],
        "colors" => ["Assorted Colors", "Neon Pack", "Pastel Pack"],
        "style" => ["Colorful", "Patterned", "Fun"],
        "features" => ["Multiple Designs", "Comfortable Fit", "Breathable Fabric", "Durable"],
        "material" => ["Cotton", "Nylon", "Elastane"],
        "color_images" => [
            "Assorted Colors" => "images/f12.webp",
            "Neon Pack" => "images/f12.webp",
            "Pastel Pack" => "images/f12.webp"
        ]
    ]
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
    <title><?= $currentProduct ? $currentProduct['title'] . ' - Myntra Clone' : 'Women Kurtas Collection - Myntra Clone' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #ff3f6c;
            --secondary-color: #282c3f;
            --light-bg: #f5f5f5;
        }
        
        body {
            background: var(--light-bg);
            font-family: 'Assistant', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 8px 0;
        }
        
        .navbar-brand img {
            height: 40px;
            width: auto;
        }
        
        .navbar-nav .nav-link {
            color: var(--secondary-color) !important;
            margin: 0 8px;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
            padding: 8px 12px !important;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        .navbar-toggler {
            border: none;
            padding: 4px 8px;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 10px 0;
        }
        
        .dropdown-item {
            padding: 8px 20px;
            transition: all 0.3s;
            color: #333 !important;
            font-size: 14px;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        .dropdown-toggle::after {
            margin-left: 4px;
        }
        
        /* Search Bar */
        #searchInput {
            border-radius: 20px;
            border: 1px solid #ddd;
            padding: 8px 15px;
            font-size: 14px;
            width: 100%;
            max-width: 400px;
        }
        
        /* Buttons */
        .btn-outline-dark, .btn-outline-primary {
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .btn-warning {
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .badge {
            font-size: 10px;
            padding: 4px 6px;
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #ff6b9c 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0;
        }
        
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* Banner */
        .banner-slider {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin: 0 auto 30px;
            border-radius: 0;
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
        
        /* Product Cards */
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
            margin-bottom: 20px;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
        }
        
        .product-img-container {
            position: relative;
            width: 100%;
            padding-top: 130%;
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
            background: rgba(255,255,255,0.8);
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
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
            font-weight: 600;
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
            margin-bottom: 10px;
        }
        
        /* Product Details Page */
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
            transition: opacity 0.3s ease;
        }
        
        .product-detail-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }
        
        .product-detail-brand {
            font-size: 16px;
            color: #535766;
            margin-bottom: 15px;
        }
        
        .product-detail-price {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .product-detail-description {
            font-size: 15px;
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
            flex-wrap: wrap;
        }
        
        .spec-label {
            font-weight: 600;
            width: 120px;
            color: var(--secondary-color);
            flex-shrink: 0;
        }
        
        .spec-value {
            color: #535766;
            flex: 1;
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
            font-size: 14px;
        }
        
        .size-option:hover, .color-option:hover {
            border-color: var(--primary-color);
        }
        
        .size-option.selected, .color-option.selected {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
        }
        
        .kurta-features {
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
            color: var(--primary-color);
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .btn-add-to-cart {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: 600;
            flex: 1;
            min-width: 150px;
        }
        
        .btn-wishlist {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            padding: 12px;
            border-radius: 5px;
            flex: 1;
            min-width: 120px;
        }
        
        .btn-wishlist .fa-heart.text-danger {
            color: #ff3366 !important;
        }
        
        .back-to-products {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-to-products:hover {
            text-decoration: underline;
        }
        
        /* Modal Styles */
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
            padding: 15px;
        }
        
        .modal-content-myntra {
            background: #fff;
            width: 100%;
            max-width: 550px;
            max-height: 85vh;
            overflow-y: auto;
            border-radius: 15px;
            padding: 20px;
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
        
        .close-modal:hover { 
            color: #000; 
        }
        
        /* Alert Popup */
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
            text-align: center;
            max-width: 90%;
        }
        
        @keyframes fadeInOut {
            0% {opacity: 0; transform: translate(-50%, -10px);}
            10% {opacity: 1; transform: translate(-50%, 0);}
            90% {opacity: 1; transform: translate(-50%, 0);}
            100% {opacity: 0; transform: translate(-50%, -10px);}
        }
        
        /* Footer */
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }
        
        .footer h5 {
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .footer ul {
            list-style: none;
            padding: 0;
        }
        
        .footer ul li {
            margin-bottom: 8px;
        }
        
        .footer ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer ul li a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            margin-top: 20px;
            text-align: center;
        }
        
        /* Responsive Styles */
        @media (max-width: 1200px) {
            .page-title {
                font-size: 2rem;
            }
            
            .banner-slider {
                height: 350px;
            }
        }
        
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
                margin-top: 10px;
            }
            
            .dropdown-menu {
                text-align: center;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .banner-slider {
                height: 300px;
            }
            
            .product-detail-title {
                font-size: 22px;
            }
            
            .product-detail-price {
                font-size: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-brand img {
                height: 35px;
            }
            
            .page-header {
                padding: 20px 0;
            }
            
            .page-title {
                font-size: 1.6rem;
            }
            
            .page-subtitle {
                font-size: 1rem;
            }
            
            .banner-slider {
                height: 250px;
            }
            
            .product-detail-container {
                padding: 15px;
            }
            
            .product-detail-title {
                font-size: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-add-to-cart, .btn-wishlist {
                width: 100%;
            }
            
            .spec-item {
                flex-direction: column;
            }
            
            .spec-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .modal-content-myntra {
                padding: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .navbar-brand img {
                height: 30px;
            }
            
            .page-title {
                font-size: 1.4rem;
            }
            
            .banner-slider {
                height: 200px;
            }
            
            .product-img-container {
                padding-top: 120%;
            }
            
            .product-detail-title {
                font-size: 18px;
            }
            
            .product-detail-price {
                font-size: 18px;
            }
            
            .size-option, .color-option {
                padding: 6px 10px;
                font-size: 12px;
            }
            
            .modal-content-myntra {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<div id="alertPopup" class="alert-popup"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= $currentProduct ? '?' : '#' ?>">
            <img src="images/myntralogo.jpg" alt="Myntra Logo" style="height:100px; width:120px;">
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
            <form class="d-flex me-3 my-2 my-lg-0">
                <input id="searchInput" class="form-control" type="search" placeholder="Search for kurtas, brands and more">
            </form>

            <!-- User / Cart -->
            <div class="d-flex align-items-center flex-wrap">
                <button class="btn btn-outline-dark btn-sm me-2 my-1 position-relative" onclick="openCartModal()">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0 ?>
                    </span>
                </button>
                
                <button class="btn btn-outline-primary btn-sm me-2 my-1 position-relative" onclick="openWishlistModal()">
                    <i class="fa fa-heart"></i> Wishlist
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0 ?>
                    </span>
                </button>
                
                <?php if(isset($_SESSION['user'])): ?>
                <button class="btn btn-outline-primary btn-sm ms-2 my-1" onclick="openOrdersModal()">
                    <i class="fa fa-list"></i> Orders
                </button>
                <?php endif; ?>

                <?php if(isset($_SESSION['user'])): ?>
                <div class="dropdown ms-2 my-1">
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
                <button class="btn btn-warning btn-sm ms-2 my-1" onclick="document.getElementById('auth').style.display='flex'">
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
        <h1 class="page-title">Gen-Z Fashion Collection</h1>
        <p class="page-subtitle">Discover trendy streetwear and fashion for the new generation</p>
    </div>
</div>

<?php if($currentProduct): ?>
<!-- PRODUCT DETAILS PAGE -->
<div class="container my-4">
    <a href="?" class="back-to-products"><i class="fa fa-arrow-left"></i> Back to Products</a>
    
    <div class="product-detail-container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $currentProduct['img'] ?>" class="product-detail-image" alt="<?= $currentProduct['title'] ?>" id="productMainImage">
                
                <!-- Thumbnail images for colors -->
                <div class="d-flex mt-3">
                    <?php 
                    $colorImages = $currentProduct['color_images'] ?? [];
                    foreach($colorImages as $color => $image): 
                    ?>
                    <img src="<?= $image ?>" class="me-2" width="60" height="60" style="cursor: pointer; border: 2px solid #ddd; border-radius: 5px;" 
                         onclick="changeProductImage('<?= $image ?>', '<?= $color ?>')"
                         onmouseover="previewProductImage('<?= $image ?>')"
                         onmouseout="resetProductImage()">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="product-detail-title"><?= $currentProduct['title'] ?></h1>
                <div class="product-detail-brand">by <?= $currentProduct['brand'] ?></div>
                <div class="product-detail-price">₹<?= number_format($currentProduct['price']) ?></div>
                
                <div class="product-rating mb-3">
                    <span class="text-warning">★★★★☆</span>
                    <span class="text-muted">(4.7) | 156 Reviews</span>
                </div>
                
                <div class="product-detail-description">
                    <?= $currentProduct['description'] ?>
                </div>
                
                <!-- Toy Features -->
                <div class="toy-features">
                    <h6 class="fw-bold mb-3">Key Features:</h6>
                    <div class="feature-item">
                        <i class="fas fa-child feature-icon"></i>
                        <span>Child-safe materials and non-toxic colors</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-brain feature-icon"></i>
                        <span>Educational value and skill development</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-puzzle-piece feature-icon"></i>
                        <span>Encourages creativity and imagination</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-truck feature-icon"></i>
                        <span>Free delivery & easy returns</span>
                    </div>
                </div>
                
                <div class="product-detail-specs">
                    <?php if(isset($currentProduct['sizes']) && !empty($currentProduct['sizes'])): ?>
                    <div class="spec-item">
                        <div class="spec-label">Size:</div>
                        <div class="spec-value">
                            <?php foreach($currentProduct['sizes'] as $size): ?>
                                <span class="size-option" onclick="selectSize(this, '<?= $size ?>')"><?= $size ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($currentProduct['colors']) && !empty($currentProduct['colors'])): ?>
                    <div class="spec-item">
                        <div class="spec-label">Color:</div>
                        <div class="spec-value">
                            <?php foreach($currentProduct['colors'] as $color): ?>
                                <span class="color-option" onclick="selectColor(this, '<?= $color ?>')"><?= $color ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="spec-item">
                        <div class="spec-label">Category:</div>
                        <div class="spec-value"><?= $currentProduct['category'] ?> Toys</div>
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
<!-- FULL WIDTH BANNER -->
<div class="banner-container">
    <div class="banner-slider">
        <img src="images/banner1nm.jpg" class="active">
        <img src="images/banner2n.webp">
        <img src="images/bannern.png">
    </div>
</div>

<!-- PRODUCTS GRID -->
<div class="container-fluid my-4">
    <div class="row" id="productsGrid">
        <?php foreach($products as $id => $p): 
            $isInWishlist = in_array($id, $_SESSION['wishlist'] ?? []);
            $wlClass = $isInWishlist ? 'active' : ''; 
        ?>
        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
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
                        <span class="text-muted">(4.3)</span>
                    </div>
                    <button class="btn btn-sm btn-primary w-100 mt-2" onclick="addToCart(<?= $id ?>)">Add to Cart</button>
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

        <h4 class="text-center mb-3 fw-bold text-uppercase text-primary">🛍 Your Shopping Cart</h4>
        <div id="cartItems" class="mb-3" style="max-height: 300px; overflow-y: auto;">
            <!-- Cart items will appear here dynamically -->
        </div>

        <hr class="my-3">

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
        <div id="wishlistItems">
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

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>ONLINE SHOPPING</h5>
                <ul>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Kids</a></li>
                    <li><a href="#">Home & Living</a></li>
                    <li><a href="#">Beauty</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>CUSTOMER POLICIES</h5>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">T&C</a></li>
                    <li><a href="#">Track Orders</a></li>
                    <li><a href="#">Shipping</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>EXPERIENCE APP</h5>
                <div class="d-flex mt-3">
                    <a href="#" class="me-2">
                        <img src="https://constant.myntassets.com/web/assets/img/80cc455a-92d2-4b5c-a038-7da0d92af33f1539674178924-google_play.png" height="40" alt="Google Play">
                    </a>
                    <a href="#">
                        <img src="https://constant.myntassets.com/web/assets/img/bc5e11ad-0250-420a-ac71-115a57ca35d51539674178941-apple_store.png" height="40" alt="App Store">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <h5>100% ORIGINAL</h5>
                <p>All products are 100% original with free shipping on orders above ₹799.</p>
                <h5 class="mt-3">RETURN WITHIN 30 DAYS</h5>
                <p>Return policy of 30 days for all items.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Myntra Clone. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- CORRECT SCRIPT LOADING ORDER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ===================== DROPDOWN FIX =====================
// Initialize all Bootstrap components
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dropdowns
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });

    // Prevent dropdown from closing when clicking inside
    document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
});

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

let selectedSize = '';
let selectedColor = '';

function selectSize(element, size) {
    document.querySelectorAll('.size-option').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    selectedSize = size;
    updateProductDisplay();
}

function selectColor(element, color) {
    document.querySelectorAll('.color-option').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    selectedColor = color;
    updateProductDisplay();
}

function changeProductImage(imageUrl, color) {
    document.getElementById('productMainImage').src = imageUrl;
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        if (option.textContent.trim() === color) {
            selectColor(option, color);
        }
    });
}

function previewProductImage(imageUrl) {
    document.getElementById('productMainImage').style.opacity = '0.7';
    setTimeout(() => {
        document.getElementById('productMainImage').src = imageUrl;
        document.getElementById('productMainImage').style.opacity = '1';
    }, 150);
}

function resetProductImage() {
    const currentProduct = <?= json_encode($currentProduct) ?>;
    if (currentProduct && selectedColor) {
        const colorImages = currentProduct.color_images || {};
        if (colorImages[selectedColor]) {
            document.getElementById('productMainImage').src = colorImages[selectedColor];
        } else {
            document.getElementById('productMainImage').src = currentProduct.img;
        }
    } else if (currentProduct) {
        document.getElementById('productMainImage').src = currentProduct.img;
    }
}

function updateProductDisplay() {
    if (selectedColor) {
        const currentProduct = <?= json_encode($currentProduct) ?>;
        const colorImages = currentProduct?.color_images || {};
        if (colorImages[selectedColor]) {
            document.getElementById('productMainImage').src = colorImages[selectedColor];
        }
    }
    
    if (selectedSize || selectedColor) {
        console.log('Selection updated:', { size: selectedSize, color: selectedColor });
    }
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
        <div class="text-center p-4">
            <i class="fa fa-heart text-muted" style="font-size: 48px;"></i>
            <h5>Your wishlist is empty</h5>
            <p>Add kurtas you love to your wishlist</p>
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
            
            const wishlistBtn = document.querySelector('.btn-wishlist');
            if (wishlistBtn && <?= $currentProduct ? 'true' : 'false' ?>) {
                if (data.isInWishlist) {
                    wishlistBtn.innerHTML = '<i class="fa fa-heart text-danger"></i> IN WISHLIST';
                } else {
                    wishlistBtn.innerHTML = '<i class="fa fa-heart"></i> WISHLIST';
                }
            }
            
            const wishlistBadge = document.querySelector('.btn-outline-primary .badge');
            if (wishlistBadge) {
                wishlistBadge.textContent = data.wishlist.length;
            }
            
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
    
    wishlistIds.forEach(pid => {
        document.querySelectorAll(`.wishlist[onclick*="${pid}"]`).forEach(el => {
            el.classList.add("active");
        });
    });
});

// ===================== PLACE ORDER (AJAX) =====================
function placeOrder() {
    const formData = new FormData(document.getElementById('checkoutForm'));
    formData.append('checkout', '1');

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        if (result.includes("Order placed successfully")) {
            showAlert("✅ Order placed successfully!", "green");
            document.getElementById('cartModal').style.display = 'none';
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
                <i class="fa fa-box text-muted" style="font-size: 48px;"></i>
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
    document.querySelectorAll(".col-xxl-2, .col-xl-2, .col-lg-3, .col-md-4, .col-sm-6, .col-6").forEach((item) => {
        const title = item.querySelector('.product-title')?.textContent.toLowerCase() || '';
        const brand = item.querySelector('.product-brand')?.textContent.toLowerCase() || '';
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
</script>
</body>
</html>