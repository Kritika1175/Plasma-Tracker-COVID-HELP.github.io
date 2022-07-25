<?php
    if(!isset($_SESSION['loggedin'])){
        
        echo "<script> alert('You have to first create your account!'); 
        window.location.href='covid/login.php';
         </script>";

    }
    else
    {
        echo "<script> window.location.href='covid\form_donor.php'; </script>";

    }


?>