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
 $Gender =  $_POST['Gender']; 
 $Age =  $_POST['Age'];  
 $City =  $_POST['City'];  
 $State =  $_POST['State']; 
 $Blood_Group =  $_POST['Blood_Group']; 
 $Date_covid_positive =  $_POST['Date_when_you_were_first_tested_COVID-19_positive']; 
 $Date_covid_negetive =  $_POST['Date_when_you_were_first_tested_COVID-19_negetive']; 
 $transmissible_disease =  $_POST['Do_you_suffer_from_any_transmissible_disease?']; 
 $vaccinated =  $_POST['Vaccinated_or_not?'];  
 $Date_of_vaccination =  $_POST['Date_of_vaccination'];  
 $Aadhar_No =  $_POST['Aadhar_Card']; 
 $Last_donate =  $_POST['Last_donate'];  
 $No_of_time =  $_POST['No_of_time'];
 $Donate_location =  $_POST['Donate_location'];

 
$sql = "INSERT INTO `covid`.`donate` (`Your_Name`, `Contact_Number`, `E_mail_ID`, `Gender`, `Age`, `City`, `State`, `Blood_Group`, `Date_covid_positive`, `Date_covid_negetive`, `transmissible_disease`, `vaccinated`, `Date_of_vaccination`, `Aadhar_No`, `Last_donate`, `No_of_time`, `Donate_location`, `dt`) VALUES ('$Your_Name', '$Contact_Number', '$E_mail_ID', '$Gender', '$Age', '$City', '$State', '$Blood_Group', '$Date_covid_positive', '$Date_covid_negetive', '$transmissible_disease', '$vaccinated', '$Date_of_vaccination', '$Aadhar_No', '$Last_donate', '$No_of_time', '$Donate_location', current_timestamp());";
                                                
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
    <link rel="stylesheet" href="style_donor.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
 <?php
       // if($insert==true)
       //echo "<script> alert('Thank you for submitting'); 
      //window.location.href='home.php';
      // </script>";
?> 
  <div class="container">
    <div class="title">Donate Plasma Form: Covid-19 Help</div>
    <div class="content">

    <!-- <form action="form_donor.php" method = "post" name = "myfrm" onSubmit = "return validation()"> -->
      <form action="form_donor.php" method = "post" onsubmit = "return dueDate();">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Your Name</span>
            <input type="varchar"  name = "Your_Name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="phone" name = "Contact_Number" placeholder="Enter your name" pattern = "[6789][0-9]{9}" maxlength = "10" required >
          </div>
          <div class="input-box">
            <span class="details">E_mail ID</span>
            <input type="email"  name = "E_mail_ID" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="Gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="Other">Other</option>
            </select>
            <!-- <input type="text" name = "Gender" placeholder="Fill Gender" required> -->
          </div>
          <div class="input-box">
            <span class="details">Enter Your Age</span>
            <input type="number" name = "Age" placeholder="Enter the age" min = "18" max = "50" required>
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
            <input type="date" id = "date1" name = "Date_when_you_were_first_tested_COVID-19_positive" placeholder="Enter date" min="2020-01-27" required>
          </div>
          <div class="input-box">
            <span class="details">Date when you were first tested COVID-19 negetive</span>
            <input type="date" id = "date2" name = "Date_when_you_were_first_tested_COVID-19_negetive" placeholder="Enter date" required>
          </div>
          <div class="input-box">
            <span class="details">Do you suffer from any transmissible disease?</span>
            <select name="Do_you_suffer_from_any_transmissible_disease?">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
            <!-- <input type="boolean" name = "Do_you_suffer_from_any_transmissible_disease?" placeholder="Y/N" required> -->
          </div>
          <div class="input-box">
            <span class="details">Vaccinated or not?</span>
            <select name="Vaccinated_or_not?">
              <option value="1">1</option>
              <option value="0">0</option>
            </select>
            <!-- <input type="boolean" name = "Vaccinated_or_not?" placeholder="Y/N" required> -->
          </div>
          <div class="input-box">
            <span class="details">Date of vaccination</span>
            <input type="date" id = "date3" name = "Date_of_vaccination" placeholder="Enter date" required>
          </div>
          <div class="input-box">
            <span class="details">Aadhar Card</span>
            <input type="text" name = "Aadhar_Card" placeholder="Enter Aadhar No." pattern = "^\d{4}\s\d{4}\s\d{4}$" maxlength = "14" required>
          </div>
          <div class="input-box">
            <span class="details">Last donated plasma date</span>
            <input type="date" name = "Last_donate" placeholder="Enter Date" required>
          </div>
          <div class="input-box">
            <span class="details">No. of times plasma donated</span>
            <input type="text" name = "No_of_time" placeholder="Enter count" required>
          </div>
          <div class="input-box">
            <span class="details">Select donate location</span>
            <select name="Donate_location">
              <option value="AIIMS Hospital, Delhi">AIIMS Hospital, Delhi</option>
              <option value="Rainbow Hospital, Mumbai">Rainbow Hospital, Mumbai</option>
              <option value="APEX Hospital, Jaipur">APEX Hospital, Jaipur</option>
              <option value="Synergy Hospital, Punjab">Synergy Hospital, Punjab</option>
              <option value="Pushpanjali Hospital, Madhya Pradesh">Pushpanjali Hospital, Madhya Pradesh</option>
              <option value="H.A Hospital, Gujarat">H.A Hospital, Gujarat</option>
              <option value="Apolo Hospital, Tamil Nadu">Apolo Hospital, Tamil Nadu</option>
              <option value="Ashoka Hospital, Kerela">Ashoka Hospital, Kerela</option>
              <option value="Sarojoni Hospital, Karnataka">Sarojoni Hospital, Karnataka</option>


            </select>
            <!-- <input type="text" name = "Donate_location" placeholder="Enter count" required> -->
          </div>
        </div>
        <div class="button" >
          <input type="submit" value="DONATE PLASMA">
        </div>
      </form>
   </div>
  </div>

  <script type="text/javascript">
           function dueDate(){
            var d1=document.getElementById("date1").value;   //positive
            var d2=document.getElementById("date2").value;   //negetive
            var d3=document.getElementById("date3").value;   //vaccination date

            const dateOne = new Date(d1);
            const dateTwo = new Date(d2);
            const dateThree = new Date(d3);

            //working on date1 and date2
            const time = Math.abs(dateTwo - dateOne);
            const dif1 = Math.ceil(time / (1000 * 60 * 60 * 24));

            //working on date2 and date3
            const time2 = Math.abs(dateThree - dateTwo);
            const dif2 = Math.ceil(time2 / (1000 * 60 * 60 * 24));

            if(d1>d2 || d2>d3)
            {
              alert('NOT VALID');
              return false;   
            }
            else if(dif1<15 || dif1>30 || dif2<=90)
            {
              alert('NOT VALID');
              return false;
            }
            else 
            return true;

          }
    </script>

</body>
</html>
