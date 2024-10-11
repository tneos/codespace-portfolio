<?php 

# Connect  on 'localhost, username, password, database name'.

$link = mysqli_connect('localhost','root','','CodeSpace'); 

if (!$link) { 

# Otherwise fail gracefully and explain the error. 

die('Could not connect to MySQL: ' . mysqli_error(err)); 

} 

 

?>