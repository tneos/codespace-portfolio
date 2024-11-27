<?php

include('../connect_db.php');

$stmt = $link->prepare("SELECT * FROM products LIMIT 3");

$stmt->execute();

$new_products = $stmt->get_result();
