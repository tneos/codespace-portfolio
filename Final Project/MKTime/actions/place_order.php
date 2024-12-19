<?php
include('../actions/session.php');
require('../connect_db.php');
require('login_tools.php');

if (isset($_POST['place_order'])) {
    // 1. Get user info and store it in database
    $total = $_SESSION['total'];
    $cardNumber = $_POST['card_number'];
    $name = $_POST['user_name'];
    $expDate = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    // Get user's id from session
    $userId = $_SESSION['user_id'];
    $orderDate = date("Y-m-d H:i:s");


    $stmt = $link->prepare("INSERT INTO orders (order_total, order_name, user_id, card_expiration, cvv, card_number, order_date)
                    VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('dsissss', $total, $name, $userId, $expDate, $cvv, $cardNumber, $orderDate);

    $stmt->execute();
    // 2. Issue new order and store order info in database

    // Retrieve order_id from database
    $orderId = $stmt->insert_id;


    // Retrieve cart items from database table
    $sql_item = "SELECT * FROM cart WHERE user_id='$userId'";
    $result_item = mysqli_query($link, $sql_item);
    $row_item = mysqli_fetch_array($result_item, MYSQLI_ASSOC);

    // There are items in cart table

    if (isset($row_item['item_id_number'])) {
        $itemId = $row_item['item_id_number'];
        $item_array = array(
            'item_id_number' => $row_item['item_id_number'],
            'item_name' => $row_item['item_name'],
            'item_desc' => $row_item['item_desc'],
            'item_img' => $row_item['item_img'],
            'item_price' => $row_item['item_price'],
            'item_quantity' => $row_item['item_quantity'],
        );
        $_SESSION['cart'][$itemId] = $item_array;
    }

    // 3. Get products from cart (session)
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $item_id = $product['item_id_number'];
        $item_name = $product['item_name'];
        $item_desc = $product['item_desc'];
        $item_img = $product['item_img'];
        $item_price = $product['item_price'];
        $item_quantity = $product['item_quantity'];
        echo $item_name;

        // 4. Store each single item in order_items table
        $stmt1 = $link->prepare("INSERT INTO order_contents(order_id, item_id, item_quantity, item_price, user_id, item_name, item_desc, item_img)
                        VALUES (?,?,?,?,?,?,?,?)");
        $stmt1->bind_param('iiisisss', $orderId, $item_id, $item_quantity, $item_price, $userId, $item_name, $item_desc, $item_img);
        $stmt1->execute();
    }

    // 5. Empty cart 
    unset($_SESSION['cart'][$item_id]);
    $query = "DELETE FROM cart WHERE user_id='$userId'";
    mysqli_query($link, $query);

    // 6. Send message to user whether action successful or not
    load('../views/index.php');
}
