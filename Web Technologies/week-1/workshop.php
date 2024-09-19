<?php
         
    /* FIRST CHALLENGE */

    /* Find area */
    $width = 10;
    $height = 5;

    $area = $width * $height;
    echo "The rectangle has a a width of " . $width . ", a height of " . $height . " meters, and an area of " . $area . " square meters" . "<br>";

    /* Utilize strings, numbers, and math */
    $num1 = 10;
    $num2 = 5;
    $sum =  $num1 + $num2;
    $sub = $num1 - $num2;
     echo "Addition of " . $num1 . " and " . $num2 .  " is: " . $sum . "<br>";
    echo "Subtraction of " . $num1 . " and " . $num2 . " is: " . $sub . "<br>";
    echo "Multiplication of " . $num1 . " and " . $num2 . " is: " . $num1*$num2 . "<br>";
    echo "Division of " . $num1 . " and " . $num2 . " is: " . $num1/$num2 . "<br>";
    echo "Concatenation of " . $num1 . " and " . $num2 . " is: " . $num1 . $num2 . "<br>";

    /* Age Calculator */
    $age = 48;
    $year = 365;
    $day = 24;
    $minutes = 60;

    echo "Welcome to the Age Calculator! <br>";
    echo "Your age: " . $age . "<br>";
    echo "You have been alive for: " . $age * $year . "<br>";
    echo $age * $year * $day . " days" . "<br>";
    echo $age * $year * $day * $minutes . " days" . "<br>";

    /* Numeric Arrays */
    $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

    # Display
    foreach($days as $value) {
        echo " <ul><li>$value</li></ul> ";
    }

    /* Associative Arrays */
    $avgTemp = array(
        "July-Aug" => array(
            "high" => 19,
            "low" => 11
        ),
        "Jan-Feb" => array(
            "high" => 7,
            "low" => 1
        ),
    );

    # Display
    echo "Average Temperature in Edinburgh<br>";
    echo "Month " . "High         " . "Low<br>";
    echo "July-Aug " .  $avgTemp['July-Aug']['high'] . "        " . $avgTemp['July-Aug']['low'] . "<br>";
    echo "Jan-Feb " .  $avgTemp['Jan-Feb']['high'] . "        " . $avgTemp['Jan-Feb']['low'] . "<br>";
   
  /* Multi-Dimensional Arrays */
  $studentsResults = array(
    "Aarron" => array(
      "Physics" => '74%',
      "English" => '69%',
      "Maths" => '70%'  
    ),
    "Jamie" => array(
      "Physics" => '64%',
      "English" => '79%',
      "Maths" => '70%'  
    ),
    "Harry" => array(
      "Physics" => '55%',
      "English" => '52%',
      "Maths" => '57%'  
    ),
);

  echo "<h1>Student Results</h1>";
  echo "<p>Physics result for Aaron : " . $studentsResults['Aarron']['Physics'] . "</p><br>";
  echo "<p>English result for Jamie : " . $studentsResults['Jamie']['English'] . "</p><br>";
  echo "<p>Maths result for Harry : " . $studentsResults['Harry']['Maths'] . "</p><br>";
    
?>