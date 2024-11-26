<?php
include('head.php');

session_start();

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {
  // Allow user in 
}
// Send user to home page
else {
  header('location: index.php');
}

// Collect prices and quantity of items
$items_total_price = array_column($_SESSION['cart'], 'item_price');
$items_quantity = array_column($_SESSION['cart'], 'item_quantity');

// For every item calculate total price
function calculateItemTotal($price, $quantity)
{
  $_SESSION['total'] = number_format((float)$price * $quantity, 2, '.', '');
  return ($price * $quantity);
}
?>

<body>
  <section class="h-100 h-custom">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card shopping-cart" style="border-radius: 15px">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 px-5 py-4 checkout-scroll">
                  <h3 class="mb-5 pt-2 text-center montserrat-300 text-uppercase">
                    Your products
                  </h3>
                  <?php
                  foreach ($_SESSION['cart'] as $value) { ?>
                    <div class="d-flex align-items-center mb-5">
                      <div class="flex-shrink-0">
                        <img
                          src="<?php echo $value['item_img']; ?>"
                          class="img-fluid"
                          style="width: 150px"
                          alt="analog watch image" />
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h5 class="montserrat-300">
                          <?php echo $value['item_name'] ?>
                        </h5>

                        <div class="d-flex justify-content-between">
                          <p class="montserrat-300 mb-0 me-5 pe-3"><?php echo number_format((float)$value['item_quantity'] * $value['item_price'], 2, '.', ''); ?></p>
                          <div class="form-group">
                            <input
                              id="form1"
                              min="0"
                              name="quantity"
                              value="<?php echo $value['item_quantity']; ?>"
                              type="number"
                              class="form-control"
                              style="width: 4rem" />
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <hr class="mb-4" style="height: 2px; opacity: 1" />
                  <div class="d-flex justify-content-between p-2 mb-2">
                    <h5 class="mb-0 montserrat-300">Shipping:</h5>
                    <h5 class="mb-0 montserrat-300">£10.00</h5>
                  </div>
                  <div class="d-flex justify-content-between p-2 mb-2">
                    <h5 class="mb-0 montserrat-300">Total:</h5>
                    <h5 class="mb-0 montserrat-300">£<?php echo number_format((float)array_sum(array_map("calculateItemTotal", $items_total_price, $items_quantity)) +  10, 2, '.', ''); ?></h5>
                  </div>
                </div>
                <div class="col-lg-6 px-5 py-4">
                  <h3 class="mb-5 pt-2 text-center montserrat-300 text-uppercase">Payment</h3>

                  <form class="mb-5" method="POST" action="../actions/place_order.php">
                    <div data-mdb-input-init class="form-outline mb-5">
                      <input
                        type="text"
                        id="typeText"
                        class="form-control form-control-lg montserrat-300"
                        name="card_number"
                        value="1234 5678 9012 3457"
                        minlength="19"
                        maxlength="19" />
                      <label class="form-label montserrat-300" for="typeText">Card Number</label>
                    </div>

                    <div class="form-outline mb-5">
                      <input type="hidden" name="total" value="<?php $_SESSION['total'] ?>">
                      <input
                        type="text"
                        id="typeName"
                        name="user_name"
                        class="form-control form-control-lg montserrat-300"
                        value="John Doe" />
                      <label class="form-label montserrat-300" for="typeName">Name on card</label>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-5">
                        <div data-mdb-input-init class="form-outline">
                          <input
                            type="text"
                            id="typeExp"
                            class="form-control form-control-lg montserrat-300"
                            name="exp_date"
                            value="01/22"
                            size="5"
                            id="exp"
                            minlength="5"
                            maxlength="5" />
                          <label class="form-label montserrat-300" for="typeExp">Expiration</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-5">
                        <div class="form-outline">
                          <input
                            type="password"
                            id="typeText"
                            class="form-control form-control-lg"
                            name="cvv"
                            value="&#9679;&#9679;&#9679;"
                            size="1"
                            minlength="3"
                            maxlength="3" />
                          <label class="form-label montserrat-300" for="typeText">Cvv</label>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="total_price" value="<?php echo number_format((float)array_sum(array_map("calculateItemTotal", $items_total_price, $items_quantity)), 2, '.', ''); ?>">
                    <input
                      type="submit"
                      name="place_order"
                      class="btn btn-dark btn-block btn-lg my-3 montserrat-300"
                      value="Buy Now" />
                    <div class="form-group my-5">
                      <a
                        href="index.php"
                        class="link-underline-dark montserrat-300 text-dark mx-2">Back to shopping</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

</html>