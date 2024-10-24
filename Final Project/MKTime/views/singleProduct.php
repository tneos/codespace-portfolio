<?php

include 'head.php';
include 'navbar.php';
 # Open database connection.
	require ( '../../MKTime/connect_db.php' );

// if (!isset($_GET['product_id'])) {
//     echo "<p class='text-danger'>Product not found.</p>";
//     include 'footer.php';
//     exit();
// }

// $productId = $_GET['product_id'];
// $query = 'SELECT * FROM products WHERE item_id = "'.$_GET['product_id'].'"';
// echo $query;

if (isset($_GET['item_id'])) {
        $id = $_GET['item_id'];

        $sql_item = "SELECT * FROM products WHERE item_id='$id'";
        $result_item = mysqli_query($link,$sql_item);
        $row_item = mysqli_fetch_array($result_item, MYSQLI_ASSOC);
        $id_item = $row_item['item_id'];
        $individual_item = array("id" => $row_item['item_id'],
                        "name" => $row_item['item_name'],
                        "desc" => $row_item['item_desc'],
                        "img" => $row_item['item_img'],
                        "price" => $row_item['item_price']);
    } else {
        $individual_item = array("img" => "img/no_img.jpg");
    }








{
echo '
<div class="row">
   <div class="col-6">
                    <div class="card my-5" style="height: 80vh;" id=' . $individual_item['id'] .'>
                        <img
                            class="card-img-top"
                            src='. $individual_item['img'].'
                            alt="analog-2"
                        >
                        <div class="card-body">
                            <h5 class="card-title montserrat-300">' . $individual_item['name'] .'</h5>
                            <p class="card-text h-25 montserrat-300">'. $individual_item['desc'] . '</p>
                            <div class="card-details d-flex justify-content-between">
                            <p class="card-text h-25 montserrat-300">£'. $individual_item['price'] . '</p>
                            
                            <a href="#" class="btn btn-light card-button card-button montserrat-300">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
             
  ';
  }
 

  echo '
    <div class="col-6">
      <div class="card-details d-flex justify-content-between">
                            <a href="added.php?id='.$individual_item['id'].'" class="btn btn-success btn-block">Add to Cart</a>
                            <a href="added.php?id='.$individual_item['id'].'" class="btn btn-danger btn-block">Remove from Cart</a>
      </div>
    </div>
</div>
  ';
	
	include ('footer.php');

// Close the Connection: After you're done fetching data, it's good practice to close the database connection to free up resources.







