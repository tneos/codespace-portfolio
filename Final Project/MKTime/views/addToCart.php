<?php 
session_start();

# Connect to the database.
  require ('../connect_db.php'); 


if ( isset( $_GET['id'] ) ) $id = $_GET['id'];


$q = "SELECT * FROM products WHERE item_id = $id";
$r = mysqli_query( $link, $q );

if ( mysqli_num_rows( $r ) == 1 ) {
    $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
    // Product details are fetched and stored in $row
    # Check if cart already contains one of this product id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
    # Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    
  } 
  else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'item_price' => $row['item_price'] ) ;
  }
}




# Close database connection
mysqli_close($link);

include ('footer.php');


?>