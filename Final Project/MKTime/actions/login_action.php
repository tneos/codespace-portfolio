<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')

  require('../connect_db.php');

require('login_tools.php');


// Check login
list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);

// Set session data and display logged in page
if ($check) {
  session_start(); // Access session
  $_SESSION['user_id'] = $data['user_id'];
  $_SESSION['first_name'] = $data['first_name'];
  $_SESSION['last_name'] = $data['last_name'];
  // $_SESSION['nickname'] = $data['nickname'];
  // $_SESSION['email'] = $data['email'];
  // $_SESSION['role_id'] = $data['role_id'];

  // To be implemented --
  // if ($_SESSION['role_id'] == 1) { // Role_id equal 1 is a admin role
  //   load('adminproducts/admin.php');
  // } else {
  load('../views/index.php');
  //}
} else {
  $errors = $data;
}

// Close database connection
mysqli_close($link);


// Continue to display login page on failure
include('../views/login.php');
