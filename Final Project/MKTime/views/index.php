
  <?php 
  include('head.php');
  include('navbar.php');
  # Open database connection.
	require ( '../../MKTime/connect_db.php' );
	
	# Retrieve items from 'products' database table.
	$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
  echo '<div class="container">
            <div class="row mt-5">
                <h1 class="montserrat-300">Our Products</h1>';
	if ( mysqli_num_rows( $r ) > 0 )

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
{
echo '
   
                 <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card my-5" style="height: 80vh;">
                        <img
                            class="card-img-top"
                            src='. $row['item_img'].'
                            alt="analog-2"
                        >
                        <div class="card-body">
                            <h5 class="card-title montserrat-300">' . $row['item_name'] .'</h5>
                            <p class="card-text h-25 montserrat-300">'. $row['item_desc'] . '</p>
                            <div class="card-details d-flex">
                            <p class="card-text h-25 montserrat-300">£'. $row['item_price'] . '</p>
                            <a href="#" class="btn btn-light card-button card-button montserrat-300">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
  ';
  }
  else { echo '<p>There are currently no items in the table to display.</p>
	' ; }

  echo '</div>
       </div>
  ';
	
	include ('footer.php');

// Close the Connection: After you're done fetching data, it's good practice to close the database connection to free up resources.



# Close database connection.
	mysqli_close( $link) ; 


