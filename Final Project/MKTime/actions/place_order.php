<?php 
session_start();
require('../connect_db.php');
require('login_tools.php');

if(isset($_POST['place_order'])) {
    // 1. Get user info and store it in database
    $total = $_SESSION['total'];
    $cardNumber = $_POST['card_number'];
    $name = $_POST['user_name'];
    $expDate = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    // Testing database(login functionality to be implemented)
   $userId = $_SESSION['user_id'];
   $orderDate = date('Y-m-d H:i:s');




   $stmt = $link->prepare("INSERT INTO orders (order_total, order_name, user_id, card_expiration, cvv, card_number, order_date)
                    VALUES (?,?,?,?,?,?,?)");
   $stmt->bind_param('dsissss', $total, $name, $userId, $expDate, $cvv, $cardNumber, $orderDate);

   $stmt->execute();
   // 2. Issue new order and store order info in database
   // Retrieve order_id from database
   $orderId = $stmt->insert_id;

    // 3. Get products from cart (session)
    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $item_id = $product['item_id'];
        $item_name = $product['item_name'];
        $item_desc = $product['item_desc'];
        $item_img = $product['item_img'];
        $item_price = $product['item_price'];
        $item_quantity = $product['item_quantity'];
        
        // 4. Store each single item in order_items table
        $stmt1 = $link->prepare("INSERT INTO order_contents(order_id, item_id, item_quantity, item_price, user_id, item_name, item_desc, item_img)
                        VALUES (?,?,?,?,?,?,?,?)");
        $stmt1->bind_param('iiisisss', $orderId, $item_id, $item_quantity, $item_price, $userId, $item_name, $item_desc, $item_img);
        $stmt1->execute();
    }

    load('../views/index.php');
    
    

    

    // 5. Empty cart --> delay until payment is done
     unset($_SESSION['cart']);
     $query = "DELETE FROM cart WHERE item_id='$itemId'";
     mysqli_query($link, $query);

    // 6. Send message to user whether action successful or not
} 
?>