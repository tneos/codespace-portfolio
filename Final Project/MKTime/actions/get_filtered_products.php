<?php
function get_filtered_products($link, $string)
{
    // Retrieve type of items from 'products' database table.
    $q = "SELECT * FROM products WHERE item_img LIKE '$string'";
    $r = mysqli_query($link, $q);

    return $r;
}
