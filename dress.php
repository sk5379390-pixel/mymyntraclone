<?php
session_start();

// --- AUTO-CREATE FILES ---
$files = ['users.txt','carts.txt','wishlists.txt','orders.txt'];
foreach($files as $f){ if(!file_exists($f)) file_put_contents($f,"[]"); }

// --- FUNCTIONS ---
function readJson($file){ $a=json_decode(file_get_contents($file),true); return is_array($a)?$a:[]; }
function writeJson($file,$arr){ file_put_contents($file,json_encode($arr,JSON_PRETTY_PRINT)); }

// --- PRODUCTS - WOMEN DRESSES COLLECTION ---
$products = [
101=>["title"=>"Floral Print Maxi Dress","price"=>2499,"img"=>"images/d1.webp","category"=>"Women","brand"=>"H&M","description"=>"Beautiful floral print maxi dress with flowy fabric perfect for summer outings and casual occasions.", "sizes"=>["S","M","L","XL"], "colors"=>["Pink","Blue","White"], "color_images"=>["Pink"=>"images/d1.webp","Blue"=>"images/d1_blue.jpg","White"=>"images/d1_white.jpg"]],
102=>["title"=>"A-Line Party Dress","price"=>3499,"img"=>"images/d2.webp","category"=>"Women","brand"=>"Zara","description"=>"Elegant A-line party dress with sequin details, perfect for evening parties and special occasions.", "sizes"=>["XS","S","M","L"], "colors"=>["Black","Red","Navy"], "color_images"=>["Black"=>"images/d2.webp","Red"=>"images/d2_red.jpg","Navy"=>"images/d2_navy.jpg"]],
103=>["title"=>"Cotton Summer Dress","price"=>1599,"img"=>"images/d3.jpg","category"=>"Women","brand"=>"Marks & Spencer","description"=>"Comfortable cotton summer dress with breathable fabric, ideal for daily wear and casual outings.", "sizes"=>["S","M","L","XL"], "colors"=>["Yellow","Green","White"], "color_images"=>["Yellow"=>"images/d3.jpg","Green"=>"images/d3_green.jpg","White"=>"images/d3_white.jpg"]],
104=>["title"=>"Bodycon Cocktail Dress","price"=>2999,"img"=>"images/d4.webp","category"=>"Women","brand"=>"Forever 21","description"=>"Stylish bodycon cocktail dress that accentuates your curves, perfect for parties and night outs.", "sizes"=>["XS","S","M","L"], "colors"=>["Red","Black","Royal Blue"], "color_images"=>["Red"=>"images/d4.webp","Black"=>"images/d4_black.jpg","Royal Blue"=>"images/d4_blue.jpg"]],
105=>["title"=>"Embroidered Anarkali Dress","price"=>4499,"img"=>"images/d5.webp","category"=>"Women","brand"=>"Manyavar","description"=>"Traditional embroidered Anarkali dress with intricate work, perfect for festivals and weddings.", "sizes"=>["S","M","L","XL"], "colors"=>["Pink","Purple","Maroon"], "color_images"=>["Pink"=>"images/d5.webp","Purple"=>"images/d5_purple.jpg","Maroon"=>"images/d5_maroon.jpg"]],
106=>["title"=>"Wrap Front Midi Dress","price"=>2199,"img"=>"images/d6.webp","category"=>"Women","brand"=>"Mango","description"=>"Chic wrap front midi dress that flatters all body types, great for office and semi-formal events.", "sizes"=>["S","M","L","XL"], "colors"=>["Navy","Burgundy","Emerald"], "color_images"=>["Navy"=>"images/d6.webp","Burgundy"=>"images/d6_burgundy.jpg","Emerald"=>"images/d6_emerald.jpg"]],
107=>["title"=>"Designer Gown Dress","price"=>5999,"img"=>"images/d7.jpg","category"=>"Women","brand"=>"Sabyasachi","description"=>"Luxurious designer gown dress with heavy embroidery and premium fabric for grand occasions.", "sizes"=>["S","M","L","XL"], "colors"=>["Gold","Silver","Red"], "color_images"=>["Gold"=>"images/d7.jpg","Silver"=>"images/d7_silver.jpg","Red"=>"images/d7_red.jpg"]],
108=>["title"=>"Casual Shirt Dress","price"=>1799,"img"=>"images/d8.webp","category"=>"Women","brand"=>"Uniqlo","description"=>"Versatile casual shirt dress that can be dressed up or down, perfect for everyday wear.", "sizes"=>["XS","S","M","L","XL"], "colors"=>["White","Blue","Khaki"], "color_images"=>["White"=>"images/d8.webp","Blue"=>"images/d8_blue.jpg","Khaki"=>"images/d8_khaki.jpg"]],
109=>["title"=>"Bohemian Maxi Dress","price"=>2799,"img"=>"images/d9.jpg","category"=>"Women","brand"=>"Free People","description"=>"Bohemian style maxi dress with ethnic prints and flowy silhouette for a free-spirited look.", "sizes"=>["S","M","L","XL"], "colors"=>["Multicolor","Orange","Teal"], "color_images"=>["Multicolor"=>"images/d9.jpg","Orange"=>"images/d9_orange.jpg","Teal"=>"images/d9_teal.jpg"]],
110=>["title"=>"Office Formal Dress","price"=>3299,"img"=>"images/d10.jpg","category"=>"Women","brand"=>"Van Heusen","description"=>"Professional office formal dress with sophisticated design and comfortable fit for corporate wear.", "sizes"=>["S","M","L","XL"], "colors"=>["Black","Navy","Grey"], "color_images"=>["Black"=>"images/d10.jpg","Navy"=>"images/d10_navy.jpg","Grey"=>"images/d10_grey.jpg"]],
111=>["title"=>"Summer Beach Dress","price"=>1299,"img"=>"images/d11.webp","category"=>"Women","brand"=>"H&M","description"=>"Light and airy beach dress perfect for summer vacations and casual beach outings.", "sizes"=>["S","M","L","XL"], "colors"=>["White","Yellow","Pink"], "color_images"=>["White"=>"images/d11.webp","Yellow"=>"images/d11_yellow.jpg","Pink"=>"images/d11_pink.jpg"]],
112=>["title"=>"Velvet Party Dress","price"=>3999,"img"=>"images/d12.jpg","category"=>"Women","brand"=>"Zara","description"=>"Luxurious velvet party dress with elegant design, perfect for winter parties and formal events.", "sizes"=>["XS","S","M","L"], "colors"=>["Burgundy","Emerald","Navy"], "color_images"=>["Burgundy"=>"images/d12.jpg","Emerald"=>"images/d12_emerald.jpg","Navy"=>"images/d12_navy.jpg"]],
113=>["title"=>"Floral Sundress","price"=>1899,"img"=>"images/d13.jpg","category"=>"Women","brand"=>"Marks & Spencer","description"=>"Beautiful floral sundress with spaghetti straps, ideal for summer days and casual occasions.", "sizes"=>["S","M","L","XL"], "colors"=>["Pink","Blue","Lavender"], "color_images"=>["Pink"=>"images/d13.jpg","Blue"=>"images/d13_blue.jpg","Lavender"=>"images/d13_lavender.jpg"]],
114=>["title"=>"Designer Lehenga Dress","price"=>8999,"img"=>"images/d14.webp","category"=>"Women","brand"=>"Manish Malhotra","description"=>"Exquisite designer lehenga dress with heavy embroidery for weddings and grand celebrations.", "sizes"=>["S","M","L","XL"], "colors"=>["Red","Pink","Gold"], "color_images"=>["Red"=>"images/d14.webp","Pink"=>"images/d14_pink.jpg","Gold"=>"images/d14_gold.jpg"]],
115=>["title"=>"Knit Bodycon Dress","price"=>2299,"img"=>"images/d15.webp","category"=>"Women","brand"=>"Forever 21","description"=>"Comfortable knit bodycon dress that hugs your curves perfectly, great for parties and dates.", "sizes"=>["XS","S","M","L"], "colors"=>["Black","Grey","Burgundy"], "color_images"=>["Black"=>"images/d15.webp","Grey"=>"images/d15_grey.jpg","Burgundy"=>"images/d15_burgundy.jpg"]],
116=>["title"=>"Embroidered Gown","price"=>5499,"img"=>"images/d16.webp","category"=>"Women","brand"=>"Sabyasachi","description"=>"Heavily embroidered gown with traditional motifs, perfect for red carpet events and weddings.", "sizes"=>["S","M","L","XL"], "colors"=>["Royal Blue","Purple","Black"], "color_images"=>["Royal Blue"=>"images/d16.webp","Purple"=>"images/d16_purple.jpg","Black"=>"images/d16_black.jpg"]],
117=>["title"=>"Casual T-Shirt Dress","price"=>999,"img"=>"images/d17.webp","category"=>"Women","brand"=>"H&M","description"=>"Comfortable t-shirt dress for everyday casual wear, easy to style and maintain.", "sizes"=>["XS","S","M","L","XL"], "colors"=>["White","Black","Grey"], "color_images"=>["White"=>"images/d17.webp","Black"=>"images/d17_black.jpg","Grey"=>"images/d17_grey.jpg"]],
118=>["title"=>"Designer Saree Gown","price"=>6999,"img"=>"images/d18.webp","category"=>"Women","brand"=>"Tarun Tahiliani","description"=>"Contemporary designer saree gown that combines traditional and modern aesthetics.", "sizes"=>["S","M","L","XL"], "colors"=>["Peach","Mint","Blush"], "color_images"=>["Peach"=>"images/d18.webp","Mint"=>"images/d18_mint.jpg","Blush"=>"images/d18_blush.jpg"]],
119=>["title"=>"Evening Cocktail Dress","price"=>3799,"img"=>"images/d19.webp","category"=>"Women","brand"=>"Michael Kors","description"=>"Elegant evening cocktail dress with sophisticated design for formal parties and events.", "sizes"=>["XS","S","M","L"], "colors"=>["Navy","Burgundy","Emerald"], "color_images"=>["Navy"=>"images/d19.webp","Burgundy"=>"images/d19_burgundy.jpg","Emerald"=>"images/d19_emerald.jpg"]],
120=>["title"=>"Floral Print Wrap Dress","price"=>2599,"img"=>"images/d20.png","category"=>"Women","brand"=>"Anthropologie","description"=>"Beautiful floral print wrap dress that flatters all body shapes, perfect for brunches and outings.", "sizes"=>["S","M","L","XL"], "colors"=>["Pink","Blue","Yellow"], "color_images"=>["Pink"=>"images/d20.png","Blue"=>"images/d20_blue.jpg","Yellow"=>"images/d20_yellow.jpg"]],
121=>["title"=>"Designer Anarkali","price"=>4299,"img"=>"images/d21.jpg","category"=>"Women","brand"=>"Ritu Kumar","description"=>"Traditional designer Anarkali with intricate embroidery and luxurious fabric.", "sizes"=>["S","M","L","XL"], "colors"=>["Red","Green","Blue"], "color_images"=>["Red"=>"images/d21.jpg","Green"=>"images/d21_green.jpg","Blue"=>"images/d21_blue.jpg"]],
122=>["title"=>"Casual Denim Dress","price"=>1999,"img"=>"images/d22.jpg","category"=>"Women","brand"=>"Levi's","description"=>"Stylish casual denim dress perfect for casual outings and weekend wear.", "sizes"=>["XS","S","M","L"], "colors"=>["Light Blue","Dark Blue","Black"], "color_images"=>["Light Blue"=>"images/d22.jpg","Dark Blue"=>"images/d22_dark.jpg","Black"=>"images/d22_black.jpg"]],
123=>["title"=>"Party Sequins Dress","price"=>4999,"img"=>"images/d23.webp","category"=>"Women","brand"=>"BCBG","description"=>"Glamorous party dress with sequin details that sparkle under lights.", "sizes"=>["XS","S","M","L"], "colors"=>["Silver","Gold","Rose Gold"], "color_images"=>["Silver"=>"images/d23.webp","Gold"=>"images/d23_gold.jpg","Rose Gold"=>"images/d23_rose.jpg"]],
124=>["title"=>"Summer Linen Dress","price"=>2399,"img"=>"images/d24.jpg","category"=>"Women","brand"=>"Mango","description"=>"Breathable linen dress perfect for hot summer days with comfortable fit.", "sizes"=>["S","M","L","XL"], "colors"=>["White","Beige","Sky Blue"], "color_images"=>["White"=>"images/d24.jpg","Beige"=>"images/d24_beige.jpg","Sky Blue"=>"images/d24_blue.jpg"]],
125=>["title"=>"Designer Lehenga","price"=>12999,"img"=>"images/27n.webp","category"=>"Women","brand"=>"Neeta Lulla","description"=>"Grand designer lehenga with heavy embroidery and luxurious fabric for bridal wear.", "sizes"=>["S","M","L","XL"], "colors"=>["Red","Gold","Pink"], "color_images"=>["Red"=>"images/27n.webp","Gold"=>"images/27n_gold.jpg","Pink"=>"images/27n_pink.jpg"]],
126=>["title"=>"Cocktail Mini Dress","price"=>2999,"img"=>"images/28.webp","category"=>"Women","brand"=>"Reformation","description"=>"Chic cocktail mini dress perfect for parties and night outs.", "sizes"=>["XS","S","M","L"], "colors"=>["Black","Red","Navy"], "color_images"=>["Black"=>"images/28.webp","Red"=>"images/28_red.jpg","Navy"=>"images/28_navy.jpg"]],
127=>["title"=>"Embroidered Maxi","price"=>3699,"img"=>"images/28n.jpg","category"=>"Women","brand"=>"Anthropologie","description"=>"Beautiful embroidered maxi dress with bohemian vibes and comfortable fit.", "sizes"=>["S","M","L","XL"], "colors"=>["White","Ivory","Beige"], "color_images"=>["White"=>"images/28n.jpg","Ivory"=>"images/28n_ivory.jpg","Beige"=>"images/28n_beige.jpg"]],
128=>["title"=>"Designer Gown","price"=>7999,"img"=>"images/31n.webp","category"=>"Women","brand"=>"Valentino","description"=>"Luxurious designer gown with intricate details and premium fabric for special occasions.", "sizes"=>["S","M","L","XL"], "colors"=>["Black","Navy","Burgundy"], "color_images"=>["Black"=>"images/31n.webp","Navy"=>"images/31n_navy.jpg","Burgundy"=>"images/31n_burgundy.jpg"]],
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
$filteredProducts = $products;
if ($searchQuery !== '' && !$currentProduct) {
    $filteredProducts = array_filter($products, function ($p) use ($searchQuery) {
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
    <title><?= $currentProduct ? htmlspecialchars($currentProduct['title']) . ' - Myntra Clone' : 'Women Dresses Collection - Myntra Clone' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: #f5f5f5;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar-nav .nav-link {
            color: pink;
            margin: 0 10px;
            font-weight: 600;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: pink;
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 10px 0;
        }
        
        .dropdown-item {
            padding: 8px 20px;
            transition: all 0.3s;
            color: pink;
        }
        
        .dropdown-item:hover {
            background-color: pink;
            color: pink;
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
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
            margin-bottom: 20px;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
        }
        
        .product-img-container {
            position: relative;
            width: 100%;
            padding-top: 125%;
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

        /* Product Details Page Styles */
        .product-detail-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
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
            font-size: 28px;
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
            font-size: 24px;
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
        
        .dress-features {
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

        /* FIXED NAVBAR DROPDOWN STYLES */
        .navbar .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        
        .dropdown-menu {
            margin-top: 0;
        }

        @media (max-width: 768px) {
            .product-item {
                width: 50%;
            }
            
            .banner-slider {
                height: 250px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .product-detail-title {
                font-size: 24px;
            }
            
            .navbar-nav {
                text-align: center;
            }
            
            .dropdown-menu {
                text-align: center;
                border: none;
                box-shadow: none;
                background-color: pink;
            }
            
            .spec-item {
                flex-direction: column;
            }
            
            .spec-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            /* Mobile dropdown fixes */
            .navbar-collapse {
                padding: 10px 0;
            }
            
            .dropdown-menu {
                position: static !important;
                transform: none !important;
                float: none;
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .product-card {
                margin-bottom: 15px;
            }
            
            .banner-slider {
                height: 200px;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .modal-content-myntra {
                width: 95%;
                padding: 15px;
            }
            
            .navbar-brand img {
                height: 80px;
                width: 80px;
            }
        }
    </style>
</head>
<body>

<div id="alertPopup" class="alert-popup"></div>

<!-- FIXED NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= $currentProduct ? '?' : '#' ?>">
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
            <form class="d-flex me-3" id="searchForm">
                <input id="searchInput" class="form-control" type="search" placeholder="Search for dresses, brands and more" style="width:300px;border-radius:20px;" value="<?= htmlspecialchars($searchQuery) ?>">
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
        <h1 class="page-title">Women Dresses Collection</h1>
        <p class="page-subtitle">Discover the latest trends in women's fashion from top brands</p>
    </div>
</div>

<?php if($currentProduct): ?>
<!-- PRODUCT DETAILS PAGE -->
<div class="container my-4">
    <a href="?" class="back-to-products"><i class="fa fa-arrow-left"></i> Back to Products</a>
    
    <div class="product-detail-container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $currentProduct['img'] ?>" class="product-detail-image" alt="<?= htmlspecialchars($currentProduct['title']) ?>" id="productMainImage">
                
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
                <h1 class="product-detail-title"><?= htmlspecialchars($currentProduct['title']) ?></h1>
                <div class="product-detail-brand">by <?= htmlspecialchars($currentProduct['brand']) ?></div>
                <div class="product-detail-price">₹<?= number_format($currentProduct['price']) ?></div>
                
                <div class="product-rating mb-3">
                    <span class="text-warning">★★★★☆</span>
                    <span class="text-muted">(4.3) | 156 Reviews</span>
                </div>
                
                <div class="product-detail-description">
                    <?= htmlspecialchars($currentProduct['description']) ?>
                </div>
                
                <!-- Dress Features -->
                <div class="dress-features">
                    <h6 class="fw-bold mb-3">Key Features:</h6>
                    <div class="feature-item">
                        <i class="fas fa-tshirt feature-icon"></i>
                        <span>Premium quality fabric for maximum comfort</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-palette feature-icon"></i>
                        <span>Beautiful designs and elegant patterns</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-cut feature-icon"></i>
                        <span>Perfect fit with flattering silhouette</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-truck feature-icon"></i>
                        <span>Free delivery & easy 30-day returns</span>
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
                        <div class="spec-value"><?= htmlspecialchars($currentProduct['category']) ?> Dresses</div>
                    </div>
                    
                    <div class="spec-item">
                        <div class="spec-label">Brand:</div>
                        <div class="spec-value"><?= htmlspecialchars($currentProduct['brand']) ?></div>
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
    <div class="row" id="productsGrid">
        <?php foreach($filteredProducts as $id => $p): 
            $isInWishlist = in_array($id, $_SESSION['wishlist'] ?? []);
            $wlClass = $isInWishlist ? 'active' : ''; 
        ?>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card product-card">
                <div class="product-img-container">
                    <img src="<?= $p['img'] ?>" class="product-img" alt="<?= htmlspecialchars($p['title']) ?>">
                    <span class="wishlist <?= $wlClass ?>" onclick="toggleWishlist(<?= $id ?>)">&#10084;</span>
                </div>
                <div class="product-details">
                    <div class="product-brand"><?= htmlspecialchars($p['brand']) ?></div>
                    <div class="product-title"><?= htmlspecialchars($p['title']) ?></div>
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
        
        <?php if(empty($filteredProducts)): ?>
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">No products found matching your search.</h4>
            <p>Try different keywords or browse all products</p>
            <a href="?" class="btn btn-primary">View All Products</a>
        </div>
        <?php endif; ?>
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

<!-- CORRECT SCRIPT LOADING ORDER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ===================== DROPDOWN FIX =====================
// Initialize all Bootstrap components properly
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dropdowns
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });

    // Fix for hover dropdown on desktop
    if (window.innerWidth > 768) {
        document.querySelectorAll('.nav-item.dropdown').forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                var dropdown = bootstrap.Dropdown.getInstance(this.querySelector('.dropdown-toggle'));
                if (dropdown) {
                    dropdown.show();
                }
            });
            item.addEventListener('mouseleave', function() {
                var dropdown = bootstrap.Dropdown.getInstance(this.querySelector('.dropdown-toggle'));
                if (dropdown) {
                    dropdown.hide();
                }
            });
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown-toggle') && !e.target.closest('.dropdown-menu')) {
            var openDropdowns = document.querySelectorAll('.dropdown-menu.show');
            openDropdowns.forEach(function(dropdown) {
                var bsDropdown = bootstrap.Dropdown.getInstance(dropdown.previousElementSibling);
                if (bsDropdown) {
                    bsDropdown.hide();
                }
            });
        }
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
            <p>Add dresses you love to your wishlist</p>
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
    document.querySelectorAll(".col-xl-2, .col-lg-3, .col-md-4, .col-sm-6").forEach((item) => {
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

<?php include 'footer1.php'; ?>
</body>
</html>