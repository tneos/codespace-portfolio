<?php # DISPLAY SHOPPING CART PAGE.
include('head.php');
include('navbar.php');

# Access session.
//session_start() ;


# Redirect if not logged in.
//if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Cart' ;



# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.
  require ('../connect_db.php');
  
  # Retrieve all items in the cart from the 'cart' database table.
  $q = "SELECT * FROM cart WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($dbc, $q);

  # Display body section with a form and a table.
  echo '<section id="cart" class="h-50">
      <div class="container cart-container py-5">
      <h1 class="montserrat-300">Your Cart</h1>
      <hr />
        <div class="row d-flex justify-content-center my-4 cart-container">
          <button class="btn btn-light back-home">Back Home</button>
          <div class="col-md-8">
          <div class="card mb-4">
              <div class="card-header py-3">
                <h6 class="mb-0 montserrat-300 display-6">Cart - 2 items</h6>
              </div>
              <div class="card-body scroll">
          ';
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo        '
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <div
                      class="bg-image hover-overlay hover-zoom ripple rounded"
                      data-mdb-ripple-color="light"
                    >
                      <img
                        src='. $row['item_img'].'
                        class="w-100"
                        alt="Blue Jeans Jacket"
                      />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0" id=' . $row['item_id'] .'>
                    <!-- Data -->
                    <h6 class="card-title montserrat-300"><strong>' .$row['item_name'] .'</strong></h6>
                    <p class="card-text montserrat-300">' .$row['item_desc'] .'</p>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
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
                    <p class="text-start text-md-center">'. $row['item_price'].'</p>
                    <!-- Price -->
                  </div>
                </div>
    ';
  }
  
  # Close the database connection.
  mysqli_close($link); 
  
  # Display the total.
  echo ' <tr><td colspan="5" style="text-align:right">Total = '.number_format($total,2).'</td></tr></table><input type="submit" name="submit" value="Update My Cart"></form>';
}
else
# Or display a message.
{ echo '
  <section id="cart" class="h-50">
      <div class="container cart-container py-5">
      <h1 class="montserrat-300">Your Cart</h1>
      <hr />
  <div class="row">
  <p>Your cart is currently empty.</p>
  </div>
  </div>
  </section>
  '
   ; }

# Create navigation links.
//echo '<p><a href="index.php">Shop</a> | <a href="checkout.php?total='.$total.'">Checkout</a> | <a href="forum.php">Forum</a> | <a href="index.php">Home</a> | <a href="#">Logout</a></p>' ;

# Display footer section.
include ( 'footer.php' ) ;

?>