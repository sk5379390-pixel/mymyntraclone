<?php
session_start();

// --- AUTO-CREATE FILES ---
$files = ['users.txt','carts.txt','wishlists.txt','orders.txt'];
foreach($files as $f){
    if(!file_exists($f)) file_put_contents($f,"[]");
}

// --- FUNCTIONS ---
function readJson($file){
    $a = json_decode(file_get_contents($file), true);
    return is_array($a) ? $a : [];
}
function writeJson($file,$arr){
    file_put_contents($file,json_encode($arr,JSON_PRETTY_PRINT));
}

// --- PRODUCTS ---
$products = [
101=>["title"=>"Anouk Women Ethnic Kurta Set","price"=>2499,"img"=>"images/kurtaset1.webp","category"=>"Women","brand"=>"Anouk","description"=>"Beautiful ethnic kurta set with intricate embroidery work. Perfect for festive occasions and weddings.", "sizes"=>["S","M","L","XL"], "colors"=>["Red","Blue","Green"]],
102=>["title"=>"Louis Philippe Formal Shirt","price"=>2299,"img"=>"images/hrshirt.jpg","category"=>"Men","brand"=>"Louis Philippe","description"=>"Premium cotton formal shirt with perfect fit. Ideal for office wear and formal occasions.", "sizes"=>["38","40","42","44"], "colors"=>["White","Blue","Pink"]],
103=>["title"=>"White Cotton Casual Shirt","price"=>799,"img"=>"images/3.webp","category"=>"Men","brand"=>"White Shirt","description"=>"Comfortable cotton casual shirt for everyday wear. Easy to maintain and style.", "sizes"=>["S","M","L","XL"], "colors"=>["White","Black","Navy"]],
104=>["title"=>"Roadster Checked Casual Shirt","price"=>899,"img"=>"images/4.webp","category"=>"Men","brand"=>"Roadster","description"=>"Trendy checked shirt from Roadster. Perfect for casual outings and college wear.", "sizes"=>["S","M","L","XL"], "colors"=>["Red Check","Blue Check","Black Check"]],
105=>["title"=>"Peter England Premium Formal Shirt","price"=>1899,"img"=>"images/5.webp","category"=>"Men","brand"=>"Peter England","description"=>"Luxury premium shirt with superior fabric quality. For the sophisticated gentleman.", "sizes"=>["38","40","42","44"], "colors"=>["White","Blue","Grey"]],
106=>["title"=>"Adidas Black Sports T-Shirt","price"=>1299,"img"=>"images/6.webp","category"=>"Men","brand"=>"Adidas","description"=>"Performance sports t-shirt with moisture-wicking technology. Perfect for workouts and sports.", "sizes"=>["S","M","L","XL"], "colors"=>["Black","Blue","Red"]],
107=>["title"=>"Levi's Denim Shirt","price"=>2199,"img"=>"images/7.webp","category"=>"Men","brand"=>"Levi's","description"=>"Classic denim shirt from Levi's. Durable and stylish for casual occasions.", "sizes"=>["S","M","L","XL"], "colors"=>["Light Blue","Dark Blue","Black"]],
108=>["title"=>"Manyavar Traditional Wedding Sherwani","price"=>8999,"img"=>"images/8.webp","category"=>"Men","brand"=>"Manyavar","description"=>"Elegant wedding sherwani with intricate embroidery. Perfect for groom and wedding guests.", "sizes"=>["S","M","L","XL","XXL"], "colors"=>["Cream","Gold","Maroon"]],
109=>[
    "title"=>"Cotton Shirt",
    "price"=>199,
    "img"=>"images/9.jpg",
    "category"=>"Shirts",
    "brand"=>"Comfort Wear",
    "description"=>"Soft and comfortable cotton shirt perfect for casual wear. Made from 100% pure cotton fabric that is breathable and skin-friendly. Ideal for everyday use and comfortable in all seasons.",
    "sizes"=>["S","M","L","XL","XXL"],
    "colors"=>["White","Blue","Black","Grey","Navy"],
    "color_images"=>[
        "White"=>"images/9.jpg",
        "Blue"=>"images/9.jpg",
        "Black"=>"images/9.jpg",
        "Grey"=>"images/9.jpg",
        "Navy"=>"images/9.jpg"
    ]
],
110=>["title"=>"Bewakoof Graphic Printed T-Shirt","price"=>499,"img"=>"images/10.jpg","category"=>"Men","brand"=>"Bewakoof","description"=>"Cool graphic printed t-shirt with trendy designs. Express your style with unique prints.", "sizes"=>["S","M","L","XL"], "colors"=>["White","Black","Grey"]],
111=>[
    "title"=>"Maxi Summer Dress",
    "price"=>1299,
    "img"=>"images/11.jpg",
    "category"=>"Women Dresses",
    "brand"=>"Elegant Style",
    "description"=>"Elegant maxi dress perfect for summer parties and special occasions. Flowy design with comfortable fit and beautiful patterns. Great for weddings and festive events.",
    "sizes"=>["S","M","L","XL","XXL"],
    "colors"=>["Floral","Striped","Solid Black","Embroidered"],
    "color_images"=>[
        "Floral"=>"images/11.jpg",
        "Striped"=>"images/11.jpg",
        "Solid Black"=>"images/11.jpg",
        "Embroidered"=>"images/11.jpg"
    ]
],
113=>[
    "title"=>"Women's Casual Day Dress",
    "price"=>1299,
    "img"=>"images/12.webp",
    "category"=>"Women Dresses",
    "brand"=>"Casual Comfort",
    "description"=>"Comfortable and stylish casual dress perfect for everyday wear. Made from soft, breathable fabric that's perfect for office, shopping, or casual outings.",
    "sizes"=>["S","M","L","XL"],
    "colors"=>["Pink","Blue","Yellow","White"],
    "color_images"=>[
        "Pink"=>"images/12.webp",
        "Blue"=>"images/12.webp",
        "Yellow"=>"images/12.webp",
        "White"=>"images/12.webp"
    ]
],
114=>[
    "title"=>"Women's Cocktail Dress",
    "price"=>449,
    "img"=>"images/13.jpg",
    "category"=>"Women Dresses",
    "brand"=>"Night Glam",
    "description"=>"Chic cocktail dress perfect for parties and night outs. Features trendy design with comfortable fit that enhances your silhouette for special occasions.",
    "sizes"=>["XS","S","M","L"],
    "colors"=>["Black","Red","Royal Blue","Purple"],
    "color_images"=>[
        "Black"=>"images/13.jpg",
        "Red"=>"images/13.jpg",
        "Royal Blue"=>"images/13.jpg",
        "Purple"=>"images/13.jpg"
    ]
],
115=>["title"=>"H&M Floral Summer Dress","price"=>2299,"img"=>"images/new.jpg","category"=>"Women","brand"=>"H&M","description"=>"Beautiful floral summer dress with comfortable fit. Perfect for summer parties and outings.", "sizes"=>["XS","S","M","L"], "colors"=>["Floral Pink","Floral Blue","Floral Yellow"]],
116=>[
    "title"=>"Women Stylish Short Dress",
    "price"=>1199,
    "img"=>"images/15.jpg",
    "category"=>"Women Dresses",
    "brand"=>"Fashion Nova",
    "description"=>"Chic and trendy short dress perfect for parties and casual outings. Features a flattering fit with stylish design elements that enhance your silhouette. Made from comfortable, breathable fabric.",
    "sizes"=>["XS","S","M","L","XL"],
    "colors"=>["Black","Red","Navy Blue","Pink"],
    "color_images"=>[
        "Black"=>"images/15.jpg",
        "Red"=>"images/15.jpg",
        "Navy Blue"=>"images/15.jpg",
        "Pink"=>"images/15.jpg"
    ]
],
117=>["title"=>"H&M Pink Floral Dress","price"=>1999,"img"=>"images/16.jpg","category"=>"Women","brand"=>"H&M","description"=>"Elegant pink floral dress for women. Perfect for parties and special occasions.", "sizes"=>["XS","S","M","L"], "colors"=>["Pink","Red","Purple"]],
118=>["title"=>"Allen Solly Striped Polo Shirt","price"=>1399,"img"=>"images/17.jpg","category"=>"Men","brand"=>"Allen Solly","description"=>"Striped polo shirt for a sophisticated look. Comfortable fabric with perfect fit.", "sizes"=>["S","M","L","XL"], "colors"=>["Navy Stripes","Black Stripes","Red Stripes"]],
119=>["title"=>"Zara Leather Handbag","price"=>3599,"img"=>"images/bag.webp","category"=>"Accessories","brand"=>"Zara","description"=>"Genuine leather handbag from Zara. Spacious and stylish for everyday use.", "sizes"=>["One Size"], "colors"=>["Black","Brown","Tan"]],
120=>["title"=>"Philips Hair Dryer 1200W","price"=>2199,"img"=>"images/hair.webp","category"=>"Beauty","brand"=>"Philips","description"=>"Professional hair dryer with 1200W power. Quick drying with multiple heat settings.", "sizes"=>["Standard"], "colors"=>["White","Pink","Black"]],
121=>["title"=>"HomeStyle Cushion Cover Set","price"=>699,"img"=>"images/20.webp","category"=>"Home","brand"=>"HomeStyle","description"=>"Set of decorative cushion covers for home. Adds color and comfort to your living space.", "sizes"=>["18x18","20x20"], "colors"=>["Multicolor","Blue","Pink"]],
122=>["title"=>"HRX Running Shoes","price"=>2999,"img"=>"images/21.webp","category"=>"Men","brand"=>"HRX","description"=>"Professional running shoes with cushioning technology. Perfect for running and gym workouts.", "sizes"=>["6","7","8","9","10"], "colors"=>["Black","Blue","Red"]],
123=>["title"=>"Campus Kids Casual Sneakers","price"=>1299,"img"=>"images/22.webp","category"=>"Kids","brand"=>"Campus","description"=>"Comfortable casual sneakers for kids. Durable and stylish for everyday wear.", "sizes"=>["Kids 1","Kids 2","Kids 3"], "colors"=>["Blue","Pink","Black"]],
124=>["title"=>"Nykaa Glossy Nail Polish","price"=>199,"img"=>"images/23.jpg","category"=>"Beauty","brand"=>"Nykaa","description"=>"Long-lasting glossy nail polish. Quick drying with vibrant colors.", "sizes"=>["8ml"], "colors"=>["Red","Pink","Nude","Black"]],
125=>["title"=>"Samsung Galaxy Smart Watch","price"=>8999,"img"=>"images/24.jpg","category"=>"Accessories","brand"=>"Samsung","description"=>"Advanced smart watch with health monitoring features. Tracks steps, heart rate, and sleep.", "sizes"=>["Small","Large"], "colors"=>["Black","Silver","Pink"]],
126=>["title"=>"Woodland Genuine Leather Belt","price"=>1499,"img"=>"images/jbelt.jpg","category"=>"Accessories","brand"=>"Woodland","description"=>"Genuine leather belt from Woodland. Durable and stylish for formal and casual wear.", "sizes"=>["30","32","34","36"], "colors"=>["Brown","Black"]],
127=>["title"=>"Premium Leather Formal Belt","price"=>1799,"img"=>"images/26.webp","category"=>"Men","brand"=>"Belt","description"=>"Premium quality leather belt with metal buckle. Perfect for formal occasions.", "sizes"=>["32","34","36","38"], "colors"=>["Black","Brown"]],
128=>["title"=>"W for Woman Printed Kurti","price"=>1299,"img"=>"images/27n.webp","category"=>"Women","brand"=>"W for Woman","description"=>"Beautiful printed kurti for women. Comfortable fabric with elegant prints.", "sizes"=>["S","M","L","XL"], "colors"=>["Printed Blue","Printed Pink","Printed Green"]],
129=>[
    "title"=>"Black and White Printed Kurti",
    "price"=>1299,
    "img"=>"images/28.webp",
    "category"=>"Women",
    "brand"=>"Ethnic Wear",
    "description"=>"Beautiful black and white printed kurti with elegant patterns. Made from soft, comfortable fabric that's perfect for casual outings and traditional occasions. Features a comfortable fit with contemporary design elements.",
    "sizes"=>["S","M","L","XL","XXL"],
    "colors"=>["Black & White"],
    "color_images"=>[
        "Black & White"=>"images/28.webp"
    ]
],
130=>["title"=>"boAt Airdopes 141 Wireless Earbuds","price"=>1799,"img"=>"images/29.webp","category"=>"Accessories","brand"=>"boAt","description"=>"Wireless earbuds with immersive sound quality. Long battery life with quick charging.", "sizes"=>["One Size"], "colors"=>["Black","Blue","Red"]],
131=>["title"=>"The Man Company Premium Perfume","price"=>799,"img"=>"images/30.jpg","category"=>"Beauty","brand"=>"The Man Company","description"=>"Premium perfume with long-lasting fragrance. Elegant scent for modern men.", "sizes"=>["50ml","100ml"], "colors"=>[]],
132=>["title"=>"Sangria Ethnic Designer Saree","price"=>3299,"img"=>"images/31n.webp","category"=>"Women","brand"=>"Sangria","description"=>"Elegant ethnic designer saree with beautiful border. Perfect for traditional occasions.", "sizes"=>["Free Size"], "colors"=>["Red","Blue","Green","Purple"]],
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
    <title><?= $currentProduct ? $currentProduct['title'] . ' - Myntra Clone' : 'Myntra Clone' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* =============== GLOBAL STYLES =============== */
        :root {
            --primary-color: #ff3f6c;
            --secondary-color: #282c3f;
            --light-gray: #f5f5f6;
            --medium-gray: #d4d5d9;
            --dark-gray: #535766;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.08);
            --shadow-medium: 0 4px 12px rgba(0,0,0,0.12);
            --shadow-heavy: 0 8px 20px rgba(0,0,0,0.15);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--light-gray);
            font-family: 'Assistant', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
            color: var(--secondary-color);
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
            max-width: 100%;
        }

        /* =============== NAVBAR STYLES =============== */
        .navbar {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.3rem 1rem;
            box-shadow: var(--shadow-medium);
        }

        .navbar-brand img {
            height: 70px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .navbar-toggler {
            border: none;
            padding: 4px 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-nav .nav-link {
            color: var(--secondary-color) !important;
            margin: 0 8px;
            font-weight: 600;
            transition: color 0.3s;
            position: relative;
            padding: 8px 12px !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-medium);
            border-radius: 8px;
            animation: dropdownFadeIn 0.3s ease;
        }

        @keyframes dropdownFadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-menu .dropdown-item {
            color: var(--secondary-color) !important;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: var(--primary-color);
            color: #fff !important;
            transform: translateX(5px);
        }

        /* Search Container */
        .search-container {
            position: relative;
        }

        #searchInput {
            border-radius: 20px;
            border: 1px solid var(--medium-gray);
            padding: 8px 16px;
            transition: all 0.3s ease;
            width: 300px;
        }

        #searchInput:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 63, 108, 0.25);
        }

        /* =============== FULL WIDTH BANNER STYLES =============== */
        .banner-container {
            width: 100%;
            overflow: hidden;
            margin: 0;
            position: relative;
        }

        .banner-slider {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            margin: 0;
        }
        
        .banner-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .banner-slider img.active {
            opacity: 1;
        }

        /* =============== FULL WIDTH PRODUCT GRID STYLES =============== */
        .products-grid-container {
            width: 100%;
            padding: 20px 0;
            margin: 0;
            background: var(--light-gray);
        }

        .products-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: 0;
            width: 100%;
            gap: 0;
        }
        
        .product-item {
            padding: 8px;
            width: 20%;
            margin-bottom: 16px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .product-card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            background: #fff;
            box-shadow: var(--shadow-light);
            height: 100%;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            margin: 0;
            width: 100%;
            border: 1px solid var(--medium-gray);
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-heavy);
        }
        
        .product-img-container {
            position: relative;
            width: 100%;
            padding-top: 175%;
            overflow: hidden;
            background: #f8f9fa;
        }
        
        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            transition: transform 0.5s ease;
            background: white;
            padding: 10px;
        }
        
        .product-card:hover .product-img {
            transform: scale(1.05);
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
            wi/dth: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .wishlist.active,
        .wishlist:hover {
            color: var(--primary-color) !important;
            transform: scale(1.1);
            background: rgba(255,255,255,0.9);
        }
        
        .product-details {
            padding: 12px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .product-brand {
            font-size: 14px;
            color: var(--dark-gray);
            margin-bottom: 4px;
            font-weight: 600;
        }
        
        .product-title {
            font-size: 14px;
            font-weight: 500;
            color: var(--secondary-color);
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
            color: var(--secondary-color);
            margin-bottom: 8px;
        }
        
        .product-rating {
            font-size: 12px;
            color: var(--dark-gray);
            margin-bottom: 8px;
        }
        
        .product-size {
            font-size: 12px;
            color: var(--dark-gray);
            margin-bottom: 12px;
        }

        .product-card .btn {
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .product-card .btn:hover {
            transform: translateY(-2px);
        }

        /* =============== FULL WIDTH PRODUCT DETAILS STYLES =============== */
        .product-detail-container {
            background: white;
            padding: 30px 0;
            margin: 0;
            animation: fadeIn 0.5s ease;
            width: 100%;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .product-detail-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .product-detail-image-container {
            width: 100%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .product-detail-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            object-fit: contain;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        
        .product-detail-image:hover {
            transform: scale(1.02);
        }
        
        .product-detail-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }
        
        .product-detail-brand {
            font-size: 20px;
            color: var(--dark-gray);
            margin-bottom: 15px;
        }
        
        .product-detail-price {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .product-detail-description {
            font-size: 16px;
            line-height: 1.6;
            color: var(--dark-gray);
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
            color: var(--dark-gray);
            flex: 1;
        }
        
        .size-option, .color-option {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 8px;
            margin-bottom: 8px;
            border: 1px solid var(--medium-gray);
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .size-option:hover, .color-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .size-option.selected, .color-option.selected {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn-add-to-cart {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-weight: 600;
            flex: 2;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        
        .btn-add-to-cart:hover {
            background-color: #e8365f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255,63,108,0.3);
        }
        
        .btn-wishlist {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
            flex: 1;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        
        .btn-wishlist:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .back-to-products {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 10px 20px;
            background: white;
            border-radius: 5px;
            border: 1px solid var(--primary-color);
        }
        
        .back-to-products:hover {
            text-decoration: underline;
            transform: translateX(-5px);
            background: var(--light-gray);
        }

        /* =============== ORDER REMOVAL ANIMATION =============== */
        .order-removing {
            animation: slideOutLeft 0.5s ease forwards;
            opacity: 1;
            transform: translateX(0);
        }

        @keyframes slideOutLeft {
            from {
                opacity: 1;
                transform: translateX(0);
                max-height: 500px;
                margin-bottom: 15px;
            }
            to {
                opacity: 0;
                transform: translateX(-100%);
                max-height: 0;
                margin-bottom: 0;
                padding-top: 0;
                padding-bottom: 0;
                overflow: hidden;
            }
        }

        .order-cancelled {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-left: 4px solid #dc3545;
            opacity: 0.7;
        }

        .cancel-success {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #28a745;
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            z-index: 3000;
            box-shadow: var(--shadow-heavy);
            animation: popIn 0.5s ease, popOut 0.5s ease 2s forwards;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        @keyframes popOut {
            from {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            to {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
        }

        /* =============== MODAL STYLES =============== */
        .modal-bg {
            position: fixed;
            top: 0; 
            left: 0;
            width: 100vw; 
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1500;
            backdrop-filter: blur(3px);
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            box-shadow: var(--shadow-heavy);
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
            color: var(--dark-gray);
            transition: 0.3s;
            z-index: 10;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .close-modal:hover { 
            color: var(--secondary-color);
            background-color: var(--light-gray);
        }

        /* =============== ALERT POPUP STYLES =============== */
        #alertPopup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-color);
            color: #fff;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 500;
            z-index: 2000;
            display: none;
            box-shadow: var(--shadow-medium);
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { transform: translate(-50%, -20px); opacity: 0; }
            to { transform: translate(-50%, 0); opacity: 1; }
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
            border: 1px solid var(--medium-gray);
            border-radius: 10px;
            padding: 10px;
            background: #fafafa;
        }
        
        .cart-items-section::-webkit-scrollbar {
            width: 6px;
        }
        
        .cart-items-section::-webkit-scrollbar-thumb {
            background-color: var(--medium-gray);
            border-radius: 10px;
        }

        /* =============== CHECKOUT FORM STYLES =============== */
        .checkout-form .form-control,
        .checkout-form .form-select {
            border-radius: 10px;
            border: 1px solid var(--medium-gray);
            box-shadow: none;
            transition: 0.3s;
        }
        
        .checkout-form .form-control:focus,
        .checkout-form .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.15rem rgba(255,63,108,0.2);
        }

        /* =============== BUTTON STYLES =============== */
        .btn {
            transition: all 0.3s ease;
        }

        .btn-danger {
            background-color: var(--primary-color);
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #e8365f;
            transform: translateY(-2px);
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
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        /* =============== ORDER CARD STYLES =============== */
        .card {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-light);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }
        
        .card-body {
            padding: 15px;
        }

        /* =============== RESPONSIVE STYLES =============== */
        
        /* Large Desktops (1200px and up) */
        @media (min-width: 1200px) {
            .product-item {
                width: 20%;
            }
            
            .banner-slider {
                height: 500px;
            }
        }

        /* Desktops (992px to 1199px) */
        @media (max-width: 1199px) and (min-width: 992px) {
            .product-item {
                width: 25%;
            }
            
            .banner-slider {
                height: 450px;
            }
            
            #searchInput {
                width: 250px;
            }
        }

        /* Tablets (768px to 991px) */
        @media (max-width: 991px) and (min-width: 768px) {
            .product-item {
                width: 33.33%;
            }
            
            .banner-slider {
                height: 400px;
            }
            
            .navbar-nav .nav-link {
                margin: 0 5px;
                padding: 6px 10px !important;
                font-size: 14px;
            }
            
            #searchInput {
                width: 200px;
            }
            
            .product-detail-title {
                font-size: 24px;
            }
            
            .product-detail-price {
                font-size: 22px;
            }
            
            .search-container {
                order: 3;
                width: 100%;
                margin-top: 10px;
            }
            
            #searchInput {
                width: 100% !important;
            }
        }

        /* Small Tablets (576px to 767px) */
        @media (max-width: 767px) and (min-width: 576px) {
            .product-item {
                width: 50%;
            }
            
            .banner-slider {
                height: 350px;
            }
            
            .navbar-brand img {
                height: 50px;
            }
            
            .navbar-nav {
                text-align: center;
                padding: 10px 0;
            }
            
            .dropdown-menu {
                text-align: center;
                border: 1px solid var(--medium-gray);
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-add-to-cart,
            .btn-wishlist {
                width: 100%;
                margin-bottom: 10px;
            }
            
            .product-detail-content {
                padding: 0 15px;
            }
            
            .modal-content-myntra {
                width: 95%;
                padding: 15px;
                margin: 20px 10px;
            }
            
            .spec-item {
                flex-direction: column;
            }
            
            .spec-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }

        /* Mobile Phones (575px and down) */
        @media (max-width: 575px) {
            .product-item {
                width: 50%;
            }
            
            .banner-slider {
                height: 300px;
            }
            
            .navbar-brand img {
                height: 45px;
            }
            
            .navbar-toggler {
                padding: 3px 6px;
            }
            
            .btn-sm {
                padding: 5px 10px;
                font-size: 12px;
            }
            
            .product-detail-title {
                font-size: 22px;
            }
            
            .product-detail-price {
                font-size: 20px;
            }
            
            .product-detail-brand {
                font-size: 18px;
            }
            
            .modal-content-myntra {
                width: 95%;
                padding: 15px;
                margin: 10px;
            }
            
            .cart-items-section {
                max-height: 250px;
            }
            
            .checkout-form .form-control,
            .checkout-form .form-select {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        /* Extra Small Mobile Phones (400px and down) */
        @media (max-width: 400px) {
            .product-item {
                width: 100%;
                padding: 6px;
            }
            
            .banner-slider {
                height: 250px;
            }
            
            .navbar-brand img {
                height: 40px;
            }
            
            .product-img-container {
                padding-top: 140%;
            }
            
            .product-details {
                padding: 8px;
            }
            
            .product-title,
            .product-brand,
            .product-price {
                font-size: 13px;
            }
            
            .modal-content-myntra {
                padding: 10px;
                border-radius: 10px;
            }
            
            .close-modal {
                top: 8px;
                right: 12px;
                font-size: 18px;
            }
            
            #alertPopup {
                padding: 8px 16px;
                font-size: 14px;
                width: 90%;
                text-align: center;
            }
            
            .btn-sm {
                padding: 4px 8px;
                font-size: 11px;
            }
        }

        /* Ultra Small Mobile Phones (320px and down) */
        @media (max-width: 320px) {
            .banner-slider {
                height: 200px;
            }
            
            .product-card .btn {
                font-size: 12px;
                padding: 6px 8px;
            }
            
            .wishlist {
                width: 28px;
                height: 28px;
                font-size: 1.1rem;
            }
            
            .navbar-nav .nav-link {
                font-size: 13px;
                padding: 4px 8px !important;
            }
        }
    </style>
</head>
<body>

<div id="alertPopup" class="alert-popup"></div>

<!-- NAVBAR FIXED -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= $currentProduct ? '?' : '#' ?>">
            <img src="images/myntralogo.jpg" alt="Myntra Logo" style="height:90px; width:120px;">
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
            <div class="search-container me-3">
                <form class="d-flex">
                    <input id="searchInput" class="form-control" type="search" placeholder="Search for products, brands and more" style="width:300px;border-radius:20px;">
                </form>
            </div>

            <!-- User / Cart -->
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-dark btn-sm me-2 position-relative" onclick="openCartModal()">
                    <i class="fa fa-shopping-cart"></i> <span class="d-none d-md-inline">Cart</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0 ?>
                    </span>
                </button>
                
                <button class="btn btn-outline-primary btn-sm me-2 position-relative" onclick="openWishlistModal()">
                    <i class="fa fa-heart"></i> <span class="d-none d-md-inline">Wishlist</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= isset($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0 ?>
                    </span>
                </button>
                
                <?php if(isset($_SESSION['user'])): ?>
                <button class="btn btn-outline-primary btn-sm ms-2 d-none d-md-block" onclick="openOrdersModal()">
                    <i class="fa fa-list"></i> Orders
                </button>
                <?php endif; ?>

                <?php if(isset($_SESSION['user'])): ?>
                <div class="dropdown ms-2">
                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i> <span class="d-none d-md-inline"><?= htmlspecialchars($_SESSION['user']) ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#" onclick="openOrdersModal()"><i class="fa fa-list me-2"></i>My Orders</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" class="m-0">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit" class="dropdown-item text-dark"><i class="fa fa-sign-out me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <?php else: ?>
                <button class="btn btn-warning btn-sm ms-2" onclick="document.getElementById('auth').style.display='flex'">
                    <i class="fa fa-user"></i> <span class="d-none d-md-inline">Login / Signup</span>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<?php if($currentProduct): ?>
<!-- PRODUCT DETAILS PAGE -->
<div class="product-detail-container">
    <div class="product-detail-content">
        <a href="?" class="back-to-products"><i class="fa fa-arrow-left"></i> Back to Products</a>
        
        <div class="row">
            <div class="col-md-6">
                <div class="product-detail-image-container">
                    <img src="<?= $currentProduct['img'] ?>" class="product-detail-image" alt="<?= $currentProduct['title'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="product-detail-title"><?= $currentProduct['title'] ?></h1>
                <div class="product-detail-brand">by <?= $currentProduct['brand'] ?></div>
                <div class="product-detail-price">₹<?= $currentProduct['price'] ?></div>
                
                <div class="product-rating mb-3">
                    <span class="text-warning">★★★★☆</span>
                    <span class="text-muted">(4.0) | 124 Reviews</span>
                </div>
                
                <div class="product-detail-description">
                    <?= $currentProduct['description'] ?>
                </div>
                
                <div class="product-detail-specs">
                    <?php if(isset($currentProduct['sizes']) && !empty($currentProduct['sizes'])): ?>
                    <div class="spec-item">
                        <div class="spec-label">Size:</div>
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
                        <div class="spec-value"><?= $currentProduct['category'] ?></div>
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
                
                <div class="mt-4">
                    <button class="btn btn-outline-secondary" onclick="viewProductSource(<?= $currentProduct['id'] ?>)">
                        <i class="fa fa-code"></i> View Product Source
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

<!-- FULL WIDTH PRODUCTS GRID -->
<div class="products-grid-container">
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
                    <div class="product-price">₹<?= $p['price'] ?></div>
                    <div class="product-rating">
                        <span class="text-warning">★★★★☆</span>
                        <span class="text-muted">(4.0)</span>
                    </div>
                    <div class="product-size">Sizes: S, M, L, XL</div>
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

<!-- PRODUCT SOURCE MODAL -->
<div id="productSourceModal" class="modal-bg" style="display:none;">
    <div class="modal-content-myntra" style="max-width: 800px;">
        <span class="close-modal" onclick="document.getElementById('productSourceModal').style.display='none'">&times;</span>
        <h4 class="mb-3 text-center text-primary">Product Source Code</h4>
        <div id="productSourceContent" style="background: #f8f9fa; padding: 15px; border-radius: 5px; max-height: 400px; overflow-y: auto; font-family: monospace; font-size: 14px;"></div>
    </div>
</div>

<!-- PROPER SCRIPT LOADING ORDER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ===================== ALERT POPUP =====================
function showAlert(msg, color = "#ff3f6c") {
    const alertBox = document.getElementById("alertPopup");
    if (!alertBox) return;
    alertBox.style.background = color;
    alertBox.innerHTML = msg;
    alertBox.style.display = "block";
    alertBox.style.animation = "fadeInOut 2.5s ease";
    setTimeout(() => (alertBox.style.display = "none"), 2500);
}

// ===================== NAVBAR SCROLL EFFECT =====================
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

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

function viewProductSource(productId) {
    const productSource = `<?php
        if($currentProduct) {
            echo "Product ID: " . $currentProduct['id'] . "\\n";
            echo "Title: " . $currentProduct['title'] . "\\n";
            echo "Brand: " . $currentProduct['brand'] . "\\n";
            echo "Price: ₹" . $currentProduct['price'] . "\\n";
            echo "Category: " . $currentProduct['category'] . "\\n";
            echo "Description: " . $currentProduct['description'] . "\\n";
            echo "Sizes: " . implode(", ", $currentProduct['sizes']) . "\\n";
            if(!empty($currentProduct['colors'])) {
                echo "Colors: " . implode(", ", $currentProduct['colors']) . "\\n";
            }
            echo "Image: " . $currentProduct['img'] . "\\n";
        }
    ?>`;
    
    document.getElementById('productSourceContent').textContent = productSource;
    document.getElementById('productSourceModal').style.display = 'flex';
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
            <p>Add items you love to your wishlist</p>
        </div>`;
    } else {
        wishlistIds.forEach(productId => {
            const product = products[productId];
            if (product) {
                html += `
                <div class="d-flex align-items-center mb-3 p-2 border rounded">
                    <img src="${product.img}" width="60" height="60" class="me-3 object-fit-cover rounded">
                    <div class="flex-grow-1">
                        <div class="fw-semibold">${product.title}</div>
                        <div class="text-muted small">${product.brand}</div>
                        <div class="fw-bold text-primary">₹${product.price}</div>
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
                        <div class="text-muted small">₹${p.price} x 
                        <input type="number" value="${p.qty}" min="1" style="width:50px;" 
                                onchange="updateCart(${id}, this.value)" class="border-0 text-center">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-danger" onclick="removeCart(${id})">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>`;
            }
            html += `<div class="fw-bold fs-5 text-end border-top pt-2">Total: ₹${total}</div>`;
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

// ===================== PLACE ORDER =====================
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
                            <span>₹${it.price * it.qty}</span>
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
    
    const orderElement = document.getElementById(`order-${orderId}`);
    const cancelButton = orderElement?.querySelector('button');
    
    // Disable button and show loading
    if (cancelButton) {
        cancelButton.disabled = true;
        cancelButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Cancelling...';
    }
    
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
            // Show success message
            const successMsg = document.createElement('div');
            successMsg.className = 'cancel-success';
            successMsg.innerHTML = `
                <div class="text-center">
                    <i class="fa fa-check-circle fa-2x mb-2"></i>
                    <h5 class="mb-0">Order Cancelled Successfully!</h5>
                </div>
            `;
            document.body.appendChild(successMsg);
            
            // Add cancelled class for visual feedback
            if (orderElement) {
                orderElement.classList.add('order-cancelled');
                
                // Update status badge
                const statusBadge = orderElement.querySelector('.badge');
                if (statusBadge) {
                    statusBadge.textContent = 'Cancelled';
                    statusBadge.className = 'badge bg-danger';
                }
                
                // Remove cancel button
                const cancelBtn = orderElement.querySelector('button');
                if (cancelBtn) {
                    cancelBtn.remove();
                }
                
                // Start removal animation after a delay
                setTimeout(() => {
                    orderElement.classList.add('order-removing');
                    
                    // Remove element from DOM after animation completes
                    setTimeout(() => {
                        if (orderElement && orderElement.parentNode) {
                            orderElement.parentNode.removeChild(orderElement);
                        }
                        
                        // Remove success message
                        if (successMsg.parentNode) {
                            successMsg.parentNode.removeChild(successMsg);
                        }
                        
                        // Show alert if no orders left
                        const ordersList = document.getElementById('ordersList');
                        if (ordersList && ordersList.children.length === 0) {
                            ordersList.innerHTML = `
                                <div class="text-center p-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076504.png" width="100" class="mb-3 opacity-75">
                                    <h6 class="text-muted">No orders found.</h6>
                                </div>
                            `;
                        }
                    }, 500);
                }, 1500);
            }
            
            showAlert("✅ Order cancelled successfully", "green");
        } else {
            showAlert("⚠️ " + result.message, "red");
            // Re-enable button if failed
            if (cancelButton) {
                cancelButton.disabled = false;
                cancelButton.innerHTML = '<i class="fa fa-times-circle"></i> Cancel Order';
            }
        }
    })
    .catch(() => {
        showAlert("❌ Error cancelling order!", "red");
        // Re-enable button on error
        if (cancelButton) {
            cancelButton.disabled = false;
            cancelButton.innerHTML = '<i class="fa fa-times-circle"></i> Cancel Order';
        }
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

// ===================== INITIALIZATION =====================
document.addEventListener('DOMContentLoaded', function() {
    // Initialize wishlist icons
    const wishlistIds = <?= json_encode($_SESSION['wishlist'] ?? []) ?>;
    wishlistIds.forEach(pid => {
        document.querySelectorAll(`.wishlist[onclick*="${pid}"]`).forEach(el => {
            el.classList.add("active");
        });
    });

    // Session messages
    <?php if(isset($_SESSION['msg'])): ?>
    showAlert("<?= addslashes($_SESSION['msg']) ?>");
    <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>

    // Dropdown functionality
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