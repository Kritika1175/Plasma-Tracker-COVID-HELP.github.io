<?php

// css style
echo '<html>
<head>
<style type="text/css">
p {color: white; }
body {background-color: lightblue; text-align: left; margin-left: 20px;}
</style>
</head>
<body>
<p> </p>
</body>
</html>';



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


$blood_grp = $_POST['blood_grp'];
$Contact_Number =  $_POST['Contact_Number']; 
$Your_Name = $_POST['Your_Name']; 
$E_mail_ID =  $_POST['E_mail_ID']; 
$Patient_Name =  $_POST['Patient_Name']; 
$Patient_Gender =  $_POST['Patient_Gender'];
$Patient_Age =  $_POST['Patient_Age'];
$City =  $_POST['City'];
$State =  $_POST['State'];  
$Date_covid_positive =  $_POST['Date_covid_positive'];
$transmissible_disease =  $_POST['transmissible_disease']; 
$Aadhar_No =  $_POST['Aadhar_No'];
$Donor_aadhar =  $_POST['Aadhar_No_donor'];


$sql = " INSERT INTO `covid`.`prequest` ( `Your_Name`, `Contact_Number`, `E_mail_ID`, `Patient_Name`, `Patient_Gender`, `Patient_Age`, `City`, `State`, `Blood_Group`, `Date_covid_positive`, `transmissible_disease`, `Aadhar_No`, `dt`, `Donor_Aadhar`) VALUES ( '$Your_Name', '$Contact_Number', '$E_mail_ID', '$Patient_Name', '$Patient_Gender', '$Patient_Age', '$City', '$State', '$blood_grp', '$Date_covid_positive', '$transmissible_disease', '$Aadhar_No', current_timestamp(), '$Donor_aadhar') ";




if($con->query($sql)==true)
{
    $insert = true;
//echo "Successfully inserted";
}
else{
    echo "ERROR: $sql <br> $con->error";
}


$sqlu = "UPDATE covid.donate SET Donor_Status ='1' WHERE Aadhar_No ='$Donor_aadhar'";

if($con->query($sqlu)==true)
{
    $insert1 = true;
//echo "Successfully inserted";
}
else{
    echo "ERROR: $sqlu <br> $con->error";
}




$con->close();


?>