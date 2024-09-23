<?php
// Replace all vowels in a string with 'x

function replaceVowelsWithX($string) {
    $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    $modifiedString = str_replace($vowels, "x", $string);
    return $modifiedString;
}

$modifiedString = replaceVowelsWithX("Hello Thomas");
echo "<h1 class='display-6 px-4'>" . $modifiedString . "</h1>";
?>