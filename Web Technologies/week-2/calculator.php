

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .buttons {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
  
<div class="container">
   <!-- A simple HTML form that submits data to the same page using GET -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="row">
        <div class="col">
           <input type="number" name="num1" class="form-control" placeholder="Enter first number">
        </div>
        <div class="col">
           <input type="number" name="num2" class="form-control" placeholder="Enter second number">
        </div>
        <div class="col">
           <h4>Select operation:</h4>
           <div class="buttons">
            <button type="submit" name="button" value="+" class="btn btn-light">+</button>
            <button type="submit" name="button" value="-" class="btn btn-light">-</button>
            <button type="submit" name="button" value="*" class="btn btn-light">*</button>
            <button type="submit" name="button" value="/" class="btn btn-light">/</button>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
    </div>
  </div>
    
</form>

<?php


// Get the values submitted via the form, using $_GET
if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['button']))
{
   $num1 = $_GET['num1'];
   $num2 = $_GET['num2'];
   $button = $_GET['button'];

//    echo $button;

   // Display results
   switch ($button) {
    case "+":
        $sum = $num1 + $num2;
        echo "$sum";
        break;
    case "-":
        $sub = $num1 - $num2;
        echo "$sub";
        break;
    case "*":
        $multiplication = $num1 * $num2;
        echo "$multiplication";
        break;
    case "/":
        $division = $num1 / $num2;
        echo "$division";
        break;
    default:
        echo "Invalid numbers!";
}


}

?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>