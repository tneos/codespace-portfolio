<?php

function retrieveCartItems($link)
{

    if (isset($_SESSION['first_name'])) {


        if (isset($_POST['add_to_cart'])) {
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
            } else {
                unset($_SESSION['cart']);
            }

            if (isset($_SESSION['cart'])) {
                $items_array_ids = array_column($_SESSION['cart'], "item_id_number");

                foreach ($items_array_ids as $value) {
                    echo "$value <br>";
                }

                // If item not already been to cart
                if (!in_array($_POST['item_id'], $items_array_ids)) {
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

                    //Add item to cart table
                    $stmt = $link->prepare("INSERT INTO cart (item_id_number, item_name, item_desc, item_img, item_price, user_id, item_quantity)
                    VALUES (?,?,?,?,?,?,?)");
                    $stmt->bind_param('issssii', $itemId, $itemName, $itemDesc, $itemImg, $itemPrice, $userId, $itemQuantity);

                    $stmt->execute();
                } else {
                    echo '<script>alert("Product already added!")</script>';
                }
            } else {

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

                //Add item to cart table
                $stmt = $link->prepare("INSERT INTO cart (item_id_number, item_name, item_desc, item_img, item_price, user_id, item_quantity)
                    VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param('issssii', $itemId, $itemName, $itemDesc, $itemImg, $itemPrice, $userId, $itemQuantity);

                $stmt->execute();
            }
        }  // Remove item from cart
        else if (isset($_POST['remove_item'])) {
            $itemId = $_POST['item_id'];
            unset($_SESSION['cart'][$itemId]);

            $query = "DELETE FROM cart WHERE item_id_number='$itemId'";
            mysqli_query($link, $query);
        } // Edit number of items
        else if (isset($_POST['edit_quantity'])) {
            $userId = $_SESSION['user_id'];

            // Get id and quantity from form
            $item_id = $_POST['item_id'];
            $item_quantity = $_POST['item_quantity'];

            $item_array = $_SESSION['cart'][$item_id];
            // Update quantity
            $item_array['item_quantity'] = $item_quantity;

            // Update quantity when user_id matches user session
            $query = "UPDATE cart SET item_quantity='$item_quantity' WHERE user_id='$userId' AND item_id_number='$item_id'";
            mysqli_query($link, $query);
            $_SESSION['cart'][$item_id] = $item_array;
        }
        // else {
        //     echo '<script>window.location="index.php";</script>';
        // }
    }
}
