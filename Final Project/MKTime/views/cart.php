<?php 
  include('head.php');
  include('navbar.php');

  session_start();

  if(isset($_POST['add_to_cart'])){

    // If user has already added a product to cart
    if(isset($_SESSION['cart'])){

    }
    // If this is the first product
    else{
      $item_id = $_POST['item_id'];
    }

  }else {
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
                <h6 class="mb-0 montserrat-300 display-6">Cart - 2 items</h6>
              </div>
              <div class="card-body scroll">
                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img src="../assets/images/analog4.jpg" class="w-100" alt="Blue Jeans Jacket" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <h6 class="card-title montserrat-300"><strong>Edifice</strong></h6>
                    <p class="card-text montserrat-300">
                      Casio Edifice Classic EFV-C120D-2AEF Ana-Digi Chronograph Watch.
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
                          value="1"
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
                    <p class="text-start">£17.99</p>
                    <!-- Price -->
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <i class="material-icons">delete</i>
                  </div>
                </div>

                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img src="../assets/images/analog4.jpg" class="w-100" alt="Blue Jeans Jacket" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <h6 class="card-title montserrat-300"><strong>Edifice</strong></h6>
                    <p class="card-text montserrat-300">
                      Casio Edifice Classic EFV-C120D-2AEF Ana-Digi Chronograph Watch.
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
                          value="1"
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
                    <p class="text-start">£17.99</p>
                    <!-- Price -->
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <i class="material-icons">delete</i>
                  </div>
                </div>
                <!-- Single item -->

              

                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img src="../assets/images/analog2.jpg" class="w-100" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <h6 class="card-title montserrat-300"><strong>Michael Kors</strong></h6>
                    <p class="card-text montserrat-300">Oversized Lexington Silver-Tone Watch</p>

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
                          value="1"
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
                    <p class="text-start">£17.99</p>

                    <!-- Price -->
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <i class="material-icons">delete</i>
                  </div>
                </div>
                <!-- Single item -->
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