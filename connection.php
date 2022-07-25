<?php

$con=mysqli_connect("localhost","root","","covid");

if(mysqli_connect_error())
{
    echo"<script>alert('cannot cannot to database');</script>";
    exit();
}
?>
