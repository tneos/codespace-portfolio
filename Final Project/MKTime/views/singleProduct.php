<?php
include 'navbar.php';


if (isset($_GET['item_id'])) {
  $id = $_GET['item_id'];


  $sql_item = "SELECT * FROM products WHERE item_id='$id'";
  $result_item = mysqli_query($link, $sql_item);
  $row_item = mysqli_fetch_array($result_item, MYSQLI_ASSOC);
  $id_item = $row_item['item_id'];
  $individual_item = array(
    "id" => $row_item['item_id'],
    "name" => $row_item['item_name'],
    "desc" => $row_item['item_desc'],
    "img" => $row_item['item_img'],
    "price" => $row_item['item_price']
  );

  $_SESSION['product_id'] = $individual_item['id'];
}

?>






<body>
  <section class="individual-product px-1 px-lg-5 m-5">
    <div class="row gx-4 gx-lg-5 align-items-center">



      <div class="col-lg-5 col-md-6 col-sm-12" id='<?php echo $individual_item['id']; ?>'>
        <img
          class="img-fluid w-100 pb-1"
          src='<?php echo $individual_item['img']; ?>'
          alt="product image" />
      </div>
      <div class="col-lg-7 col-md-6 col-12">
        <h1 class="display-5 montserrat-300 my-3"><?php echo $individual_item['name']; ?></h1>
        <div class="fs-5 mb-5">
          <span class="h-25 montserrat-300">£<?php echo $individual_item['price']; ?></span>
          <p class="lead card-text h-25 montserrat-300">
            <?php echo $individual_item['desc']; ?>
          </p>
          <form method="POST" action="cart.php">
            <input type="hidden" name="item_id" value="<?php echo $individual_item['id'] ?>" />
            <input type="hidden" name="item_img" value="<?php echo $individual_item['img']; ?>" />
            <input type="hidden" name="item_name" value="<?php echo $individual_item['name']; ?>" />
            <input type="hidden" name="item_price" value="<?php echo $individual_item['price']; ?>" />
            <input type="hidden" name="item_desc" value="<?php echo $individual_item['desc']; ?>" />
            <div class="d-flex">
              <input
                class="form-control text-center me-4"
                id="inputQuantity"
                name="item_quantity"
                type="num"
                value="1"
                style="max-width: 3rem" />
              <button type="submit" name="add_to_cart" id="add_to_cart" class=" btn btn-outline-dark flex-shrink-0" p>
                Add to cart
              </button>
            </div>

          </form>
        </div>


      </div>

    </div>
  </section>

  <?php
  include('footer.php');









  ?>