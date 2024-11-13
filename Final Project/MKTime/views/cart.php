<?php 
  include('head.php');
  include('navbar.php');

  

  if(isset($_POST['add_to_cart'])){

    // If there are items in the cart
    if(isset($_SESSION['cart'])){

      $items_array_ids = array_column($_SESSION['cart'], 'item_id');
      // If item not already been to cart
      if(!in_array($_POST['item_id'], $items_array_ids)){
        
       $item_array = array(
        'item_id' => $_POST['item_id'],
        'item_name' => $_POST['item_name'],
        'item_desc' => $_POST['item_desc'],
        'item_img' => $_POST['item_img'],
        'item_price' => $_POST['item_price'],
        'item_quantity' => $_POST['item_quantity'],
      );
      $_SESSION['cart'][$_POST['item_id']] = $item_array;
      }
      // item has already been added
      else {
         echo '<script>alert("Product was already added");</script>';
         
      }

    }
    // If this is the first item in the cart
    else{
      $item_id = $_POST['item_id'];
      $item_name = $_POST['item_name'];
      $item_desc = $_POST['item_desc'];
      $item_img = $_POST['item_img'];
      $item_price = $_POST['item_price'];
      $item_quantity = $_POST['item_quantity'];

      $item_array = array(
        'item_id' => $item_id,
        'item_name' => $item_name,
        'item_desc' => $item_desc,
        'item_img' => $item_img,
        'item_price' => $item_price,
        'item_quantity' => $item_quantity,
      );

      $_SESSION['cart'][$item_id] = $item_array;
    }

  
  }
  // Remove item from cart
  else if(isset($_POST['remove_item'])) {
    $item_id = $_POST['item_id'];
    unset($_SESSION['cart'][$item_id]);
  }
  else {
    header('location: index.php');
  }
?>

  <body>
    <section id="cart" class="h-50">
      <div class="container cart-container py-5">
        <h1 class="montserrat-300">Your Cart</h1>
        <hr />
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h6 class="mb-0 montserrat-300 display-6">Cart - <?php echo sizeof($_SESSION['cart']) ?> items</h6>
              </div>
              
              <div class="card-body scroll">
                <?php foreach($_SESSION['cart'] as $value) { ?>
                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img src="<?php echo $value['item_img'] ?>" class="w-100" alt="Item image" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <h6 class="card-title montserrat-300"><strong><?php echo $value['item_name']; ?></strong></h6>
                    <p class="card-text montserrat-300">
                      <?php echo $value['item_desc']; ?>
                    </p>

                    <!-- Data -->
                  </div>

                  <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <!-- Quantity -->
                    <div class="d-flex mb-4" style="max-width: 300px">
                      <div data-mdb-input-init class="form-outline">
                        <input
                          id="form1"
                          min="0"
                          name="quantity"
                          value="<?php echo $value['item_quantity']; ?>"
                          type="number"
                          class="form-control"
                          style="width: 4rem"
                        />
                        <label
                          class="form-label montserrat-300"
                          for="form1"
                          style="font-size: 0.9rem"
                          >Quantity</label
                        >
                      </div>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <p class="text-start">£<?php echo $value['item_price']; ?></p>
                    <!-- Price -->
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                      <button type="submit" name="remove_item" class="delete-btn">
                         <i class="material-icons">delete</i>
                      </button>
                    </form>
                    
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-body">
                <p class="montserrat-300" style="font-weight: 500">Expected shipping delivery</p>
                <p class="mb-0 montserrat-300">12.10.2020 - 14.10.2020</p>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body">
                <p class="montserrat-300" style="font-weight: 500">We accept</p>
                <img
                  class="me-2"
                  width="45px"
                  src="../assets/images/visa.png"
                  alt="Visa"
                />
                <img
                  class="me-2"
                  width="45px"
                  src="../assets/images/card.png"
                  alt="Mastercard"
                />
                <img
                  class="me-2"
                  width="45px"
                  src="../assets/images/paypal.png"
                  alt="Paypal"
                />
                <img
                  class="me-2"
                  width="45px"
                  src="../assets/images/apple-pay.png"
                  alt="Apple Pay"
                />
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0 montserrat-300 display-6">Summary</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 montserrat-300"
                  >
                    Products
                    <span>$53.98</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center px-0 montserrat-300"
                  >
                    Shipping
                    <span>Gratis</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3"
                  >
                    <div>
                      <p class="montserrat-300" style="font-weight: 400">Total amount</p>
                      <strong>
                        <p class="mb-0 montserrat-300" style="font-weight: 400">(including VAT)</p>
                      </strong>
                    </div>
                    <span>£53.98</span>
                  </li>
                </ul>

                <button
                  type="button"
                  data-mdb-button-init
                  data-mdb-ripple-init
                  class="btn btn-light montserrat-300"
                >
                  Go to checkout
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <h3 class="montserrat-300 py-3 text-white text-center footer-title">Useful Info</h3>
      <hr />
      <div class="container d-flex">
        <ul class="footer-list col-lg-6 col-md-12">
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">Delivery</li>
          </a>
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">Returns</li>
          </a>
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">Student Discount</li>
          </a>
        </ul>
        <ul class="footer-list col-lg-6 col-md-12">
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">My Account</li>
          </a>
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">Offers</li>
          </a>
          <a href="#" class="footer-link">
            <li class="text-white text-center pt-3">About Us</li>
          </a>
        </ul>
      </div>
      <p class="m-0 text-center montserrat-300 text-white copyright">
        Copyright &copy; Thomas Neos
      </p>
    </footer>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</html>