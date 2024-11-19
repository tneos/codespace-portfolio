<?php 
session_start();
require('../connect_db.php');

if(isset($_POST['place_order'])) {
    // 1. Get user info and store it in database
    $total = $_SESSION['total'];
    $cardNumber = $_POST['card_number'];
    $name = $_POST['user_name'];
    $expDate = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    //$cvv = "pass";
    // Testing database(login functionality to be implemented)
   $userId = 2;
   $orderDate = date('Y-m-d H:i:s');

//    echo gettype($total), $total,  gettype($cardNumber), gettype($name), gettype($expDate), gettype($cvv), gettype($orderDate);
//    echo $total, $cardNumber, $name, $expDate, $cvv, $orderDate, $userId;
     echo gettype($total), $total;


   $stmt = $link->prepare("INSERT INTO orders (order_total, order_name, user_id, card_expiration, cvv, card_number, order_date)
                    VALUES (?,?,?,?,?,?,?)");
   $stmt->bind_param('dsissss', $total, $name, $userId, $expDate, $cvv, $cardNumber, $orderDate);

   $stmt->execute();
   // Retrieve order_id from database
   $orderId = $stmt->insert_id;

   echo $orderId;
    // 2. Get products from cart (session)
    
    // 3. Issue new order and store order info in database

    // 4. Store each single item in order_items table

    // 5. Empty cart

    // 6. Send message to user whether action successful or not
} 
?>