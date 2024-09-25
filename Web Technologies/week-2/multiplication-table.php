<?php
 // Get input value
 $num = $_POST['number'];

 echo "Multiplication Table of $num: <br>";

 for($i = 1; $i <= 10; $i ++)
 {
    echo $num . "*" . $i . "=" . $num * $i . "<br>";
 }
?>