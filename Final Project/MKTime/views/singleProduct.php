<?php

include 'head.php';
include 'navbar.php';
 # Open database connection.
	require ( '../../MKTime/connect_db.php' );


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
   <body>
   <section class="individual-product px-4 px-lg-5 m-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-12" id='.$individual_item['id'].'>
              <img
                class="img-fluid w-100 pb-1"
                src='.$individual_item['img'].'
                alt="..."
              />
            </div>
            <div class="col-lg-7 col-md-6 col-12">
              <h1 class="display-5 montserrat-300 my-3">'.$individual_item['name'].'</h1>
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
                <a class="btn btn-outline-dark flex-shrink-0"p href="addToCart.php?id='.$individual_item['id'].'">
                  <i class="bi-cart-fill me-1"></i>
                  Add to cart
                </a>
              </div>
            </div>
          </div>
      </section>
  ';
}
	
	include ('footer.php');









?>