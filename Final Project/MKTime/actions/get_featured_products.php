<?php 

include('../connect_db.php');

$stmt = $link->prepare("SELECT * FROM products LIMIT 4");

$stmt->execute();

$featured_products = $stmt->get_result();

?>