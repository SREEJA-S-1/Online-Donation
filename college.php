<?php

$db = mysqli_connect("localhost","root","","staff");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>