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
   <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6" id='.$individual_item['id'].'>
              <img
                class="card-img-top mb-5 mb-md-0"
                src='.$individual_item['img'].'
                alt="..."
              />
            </div>
            <div class="col-md-6">
              <h1 class="display-5 montserrat-300">'.$individual_item['name'].'</h1>
              <div class="fs-5 mb-5">
                <span class="h-25 montserrat-300">£'.$individual_item['price'].'</span>
                
              </div>
              <p class="lead card-text h-25 montserrat-300">
                '.$individual_item['desc'].'
              </p>
              <div class="d-flex">
                <input
                  class="form-control text-center me-3"
                  id="inputQuantity"
                  type="num"
                  value="1"
                  style="max-width: 3rem"
                />
                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                  <i class="bi-cart-fill me-1"></i>
                  Add to cart
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
  ';
}
	
	include ('footer.php');

// Close the Connection: After you're done fetching data, it's good practice to close the database connection to free up resources.







?>