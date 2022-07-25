<?php
$insert=false;
if(isset($_POST['name']))
{
 // set connection variables
 $server = "localhost";
 $username = "root";
 $password = "";
// create a connection
 $con = mysqli_connect($server,$username,$password);
//check for connection success

 if(!$con)
 {
 die("connection to this database failed due to".mysqli_connect_error());
 }
 //echo "Success connecting to the db";
 $name = $_POST['name']; 
 $email =  $_POST['email']; 
 $feedback =  $_POST['desc']; 


 $sql = " INSERT INTO `covid`.`message`( `name`, `email`, `feedback`, `dt`) VALUES ( '$name', '$email', '$feedback', current_timestamp());";



//echo $sql;
if($con->query($sql)==true)
{
    $insert = true;
//echo "Successfully inserted";
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style ="background: #fff";>
    <!-- <img class="bg" src="images.png" alt="hospital"> -->

    <div class="container" >
        <h1 style = "font-family: sans-serif; color:#0d0c0c;">Feedback Form</h1>
        <br>
        
        <?php
        if($insert==true)
        echo "<p>Thank you for submitting</p>";
        ?>
        <form action="feedback.php" method="post">
        <input style = "border-radius: 0px;" type="text" name="name" id="name" placeholder="Enter your name">
        <input style = "border-radius: 0px;" type="email" name="email" id="email" placeholder="Enter your email">
         <textarea style = "border-radius: 0px;" name="desc" id="desc" cols="30" rows="10" placeholder="Enter your Feedback"></textarea>
         <button class="btn" style = "background-color: #3d56b2; color:white; font-size:15px; font-weight:bolder; width: 150px";> Submit </button>  
        </form>
    </div>

</body>
</html>