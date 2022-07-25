<?php
$insert=false;
if(isset($_POST['Your_Name']))
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
 $Your_Name = $_POST['Your_Name']; 
 $Contact_Number =  $_POST['Contact_Number']; 
 $E_mail_ID =  $_POST['E_mail_ID']; 
 $Patient_Name =  $_POST['Patient_Name']; 
 $Patient_Gender =  $_POST['Patient_Gender'];
 $Patient_Age =  $_POST['Patient_Age'];
 $City =  $_POST['City'];
 $State =  $_POST['State']; 
 $Blood_Group =  $_POST['Blood_Group']; 
 $Date_covid_positive =  $_POST['Date_when_you_were_first_tested_COVID-19_positive'];
 $transmissible_disease =  $_POST['Do_you_suffer_from_any_transmissible_disease?']; 
 $Aadhar_No =  $_POST['Do_you_have_your_Aadhar_Card?']; 

 $sql = "INSERT INTO `covid`.`prequest` ( `Your_Name`, `Contact_Number`, `E_mail_ID`, `Patient_Name`, `Patient_Gender`, `Patient_Age`, `City`, `State`, `Blood_Group`, `Date_covid_positive`, `transmissible_disease`, `Aadhar_No`, `dt`) VALUES ('$Your_Name', '$Contact_Number', '$E_mail_ID', '$Patient_Name', '$Patient_Gender', '$Patient_Age', '$City', '$State', '$Blood_Group', '$Date_covid_positive', '$transmissible_disease', '$Aadhar_No', current_timestamp());";
 
                                                
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Covid Registration Form  </title>
    <link rel="stylesheet" href="style_acceptor.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
 <?php
        if($insert==true)
       echo "<script> alert('Thank you for submitting'); 
      //window.location.href='home.php';
       </script>";
?> 
  <div class="container">
    <div class="title">Plasma Request Form: Covid-19 Help</div>
    <div class="content">
      <form action="filter.php" method = "post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Your Name</span>
            <input type="text"  name = "Your_Name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="tel" name = "Contact_Number" placeholder="Enter your name" pattern = "[6789][0-9]{9}" maxlength = "10" required>
          </div>
          <div class="input-box">
            <span class="details">E_mail ID</span>
            <input type="email"  name = "E_mail_ID" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Patient Name</span>
            <input type="text" name = "Patient_Name"  placeholder="Enter name" required>
          </div>
          <div class="input-box">
            <span class="details">Patient Gender</span>
            <select name="Patient_Gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="Other">Other</option>
            </select>
            <!-- <input type="text" name = "Patient_Gender" placeholder="Fill Gender" required> -->
          </div>
          <div class="input-box">
            <span class="details">Patient Age</span>
            <input type="number" name = "Patient_Age" placeholder="Enter the age" min = "15" max = "100" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name = "City"  placeholder="Enter City" required>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <select name="State">
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Bihar">Bihar</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Delhi">Delhi</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Goa">Goa</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Haryana">Haryana</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Kerala">Kerala</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Manipur">Manipur</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Odisha">Odisha</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Punjab">Punjab</option>
              <option value="Telangana">Telangana</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Tripura">Tripura</option>
              <option value="West Bengal">West Bengal</option>
              <option value="Uttarakhand">Uttarakhand</option>
              </select>
            <!-- <input type="text" name = "State" placeholder="Enter State" required> -->
          </div>
          <div class="input-box">
            <span class="details">Blood Group</span>
            <select name="Blood_Group">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
            <!-- <input type="text" name = "Blood_Group"  placeholder="Enter Blood Group" required> -->
          </div>
          <div class="input-box">
            <span class="details">Date when you were first tested COVID-19 positive</span>
            <input type="date" name = "Date_when_you_were_first_tested_COVID-19_positive" placeholder="Enter date" min="2020-01-27" required>
          </div>
          <div class="input-box">
            <span class="details">Do you suffer from any transmissible disease?</span>
            <select name="Do_you_suffer_from_any_transmissible_disease?">
              <option value="1">1</option>
              <option value="0">0</option>
            </select>
            <!-- <input type="text" name = "Do_you_suffer_from_any_transmissible_disease?" placeholder="Y/N" required> -->
          </div>
          <div class="input-box">
            <span class="details">Aadhar Card</span>
            <input type="text" name = "Do_you_have_your_Aadhar_Card?" placeholder="Enter Aadhar No." pattern = "^\d{4}\s\d{4}\s\d{4}$" maxlength = "14" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="REQUEST PLASMA">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
