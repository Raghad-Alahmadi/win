<?php



$conn = mysqli_connect('localhost', 'root', 'root', 'win');

if (!$conn) {
    echo 'fail: ' . mysqli_connect_error();
}

?>