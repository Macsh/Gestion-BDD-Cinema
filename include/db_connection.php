<?php

$db = mysqli_connect("localhost","**username**","**pw**","db_bootstrap");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>