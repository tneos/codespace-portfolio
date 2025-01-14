<?php
include_once '../views/head.php';
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
    $q = "SELECT * FROM order_contents WHERE user_id='$userId' AND order_id='$orderId'";
    $r = mysqli_query($link, $q);

    // Display message to user
    if ($r) {
        echo
        '
         <section class="vh-75 pt-2">
             <div class="container h-75">
                 <div class="row d-flex justify-content-center align-items-center confirmation-container">
                    
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center montserrat-300 h4 mb-5 mx-1 mx-md-4 mt-4">Your payment was successful</p>
                <a class="link-underline-dark" href="../views/index.php">Back Home</a>
                
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    ';
    } else {
        echo
        '
    <div id="user-msg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <h3 class="item-added-message montserrat-300 text-center">There was a problem with your payment. Please try again.</h3>
          <button type="button" id="close-msg" class="btn-close me-2 m-auto"></button>
        </div>
    </div>
    ';
    }
}
