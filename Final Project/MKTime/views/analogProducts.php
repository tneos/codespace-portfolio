
  <?php
    include('head.php');
    include('navbar.php');
    include('../actions/get_filtered_products.php');

    # Open database connection.
    require('../../MKTime/connect_db.php');



    # Retrieve analog items from 'products' database table.
    $r = get_filtered_products($link, '%analog%');

    echo '
 <body>
  <div id="products">
     <h1 class="montserrat-300 text-center">Analog Watches</h1>
                <hr/>
    <div class="row m-2">
                
                ';
    if (mysqli_num_rows($r) > 0)

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo
            '
   
                 <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card my-5" style="height: 80vh;" id=' . $row['item_id'] . '>
                        <img
                            class="card-img-top"
                            src=' . $row['item_img'] . '
                            alt="analog-2"
                        >
                        <div class="card-body">
                            <h5 class="card-title montserrat-300">' . $row['item_name'] . '</h5>
                            <p class="card-text h-50 montserrat-300">' . $row['item_desc'] . '</p>
                            <div class="card-details d-flex justify-content-between">
                            <p class="h-50 h4 montserrat-300">£' . $row['item_price'] . '</p>
                            <a href="singleProduct.php?item_id=' . $row['item_id'] . '" class="btn btn-light card-button card-button montserrat-300">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
  ';
        }
    else {
        echo '<p class="card-text text-center py-5 montserrat-300">There are currently no items in the table to display.</p>
	';
    }

    echo '</div>
       </div>
  ';

    include('footer.php');





    # Close database connection.
    mysqli_close($link);
