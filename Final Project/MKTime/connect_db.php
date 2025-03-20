<?php

# Connect to database

$link = mysqli_connect('localhost', 'root', '', 'mktime');


if (!$link) {

    # Otherwise fail gracefully and explain the error. 

    die('Could not connect to MySQL: ' . mysqli_error(err));
}
