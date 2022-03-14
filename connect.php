<?php
$db = mysqli_connect('localhost', 'root', '', 'basic_php_crud');
if(!$db){
    die('Error:' . mysqli_connect_error($db));
}