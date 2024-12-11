<?php

function retrieveCartItems($link)
{
    $userId = $_SESSION['user_id'];

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
    } else if (!isset($_SESSION['cart'])) {
        $itemId = $_POST['item_id'];
        $itemName = $_POST['item_name'];
        $itemDesc = $_POST['item_desc'];
        $itemImg = $_POST['item_img'];
        $itemPrice = $_POST['item_price'];
        $itemQuantity = $_POST['item_quantity'];

        $item_array = array(
            'item_id_number' => $itemId,
            'item_name' => $itemName,
            'item_desc' => $itemDesc,
            'item_img' => $itemImg,
            'item_price' => $itemPrice,
            'item_quantity' => $itemQuantity,
        );

        $_SESSION['cart'][$itemId] = $item_array;
    }

    return $_SESSION['cart'];
}
