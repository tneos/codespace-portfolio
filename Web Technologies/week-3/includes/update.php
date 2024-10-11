<?php
# Include navigation 
include ( 'nav.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('../connect_db.php'); 

  # Initialize an error array.
  $errors = array();

# Check for a item name.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }
  
  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

# Check for a item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }
   echo $id, $n, $d, $img, $p;
  if ( empty( $errors ) ) 
  {
    
    $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
    $r = mysqli_query ( $link, $q ) ;
    echo $r;
    if ($r)
    {
       header("Location: read.php");
  

} else {
        echo "Error updating record: " . $link->error;
    }

     # Close database connection.
    mysqli_close( $link );
  } 
}
?>

<div class="container">
    <h1>Update Record</h1>
    <form  action="update.php" method="post">
        <div class="form-group">
            <label for="item_name">Update Item ID</label>
            <input type="number" name="item_id" class="form-control" value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>">
        </div>
        <div class="form-group">
            <label for="item_name">Update Item Name</label>
            <input type="text" name="item_name" class="form-control" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="item_desc" name="item_desc" class="form-control" required value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>" ></textarea>
        </div>
        <div class="form-group">
            <label for="item_img">Update Item Image</label>
            <input type="text" id="item_img" name="item_img" class="form-control" value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>" >
        </div>
        <div class="form-group">
            <label for="item_name">Update Item Price</label>
            <input type="number" id="item_price" min="0" step="0.01" name="item_price" class="form-control" value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>" >
        </div>

        <!-- submit button -->
     <input type="submit" class="btn btn-dark" value="Submit">
    </form>
</div>