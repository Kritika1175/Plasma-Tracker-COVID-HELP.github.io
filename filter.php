
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <title>Document</title> -->
</head>

<body style="background-color: #e8f1ff; text-align: center;">
    <div class = "main-div">
        <h1>AVAILABLE DONORS ARE</h1>
        <div class = "centre-div">
            <div class = "table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Donor Name</th>
                            <th>Contact Number</th>
                            <th>Location for plasma availability</th>
                            <th>Donor Mail ID</th>
                            <th>Select Donor</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        $blood_grp = $_POST['Blood_Group'];
                        $Your_Name = $_POST['Your_Name']; 
                        $Contact_Number =  $_POST['Contact_Number']; 
                        $E_mail_ID =  $_POST['E_mail_ID']; 
                        $Patient_Name =  $_POST['Patient_Name']; 
                        $Patient_Gender =  $_POST['Patient_Gender'];
                        $Patient_Age =  $_POST['Patient_Age'];
                        $City =  $_POST['City'];
                        $State =  $_POST['State'];  
                        $Date_covid_positive =  $_POST['Date_when_you_were_first_tested_COVID-19_positive'];
                        $transmissible_disease =  $_POST['Do_you_suffer_from_any_transmissible_disease?']; 
                        $Aadhar_No =  $_POST['Do_you_have_your_Aadhar_Card?']; 
                        // echo "Blood Group: $blood_grp<br/>";


                        // setting up connection
                        $con = mysqli_connect("localhost","root","","covid");

                        //
                        $select_query = "SELECT * FROM donate WHERE Blood_Group = '$blood_grp' AND 	Donor_Status = '0'";
                        $query = mysqli_query($con,$select_query);

                        while($res = mysqli_fetch_array($query)){
                            ?>


                            <tr>
                                <td><?php echo $res['Your_Name'];?></td>
                                <td><?php echo $res['Contact_Number'];?></td>
                                <td><?php echo $res['City'];?></td>
                                <td><?php echo $res['E_mail_ID'];?></td>
                                



                                        <!-- //                        hidden form                -->
                                   <td> <form action="accept.php" method="post">
                                        <input type="hidden" value="<?php echo $blood_grp;?>" name="blood_grp">
                                        <input type="hidden" value="<?php echo $Your_Name;?>" name="Your_Name">
                                        <input type="hidden" value="<?php echo $Contact_Number;?>" name="Contact_Number">
                                        <input type="hidden" value="<?php echo $E_mail_ID;?>" name="E_mail_ID">
                                        <input type="hidden" value="<?php echo $Patient_Name;?>" name="Patient_Name">
                                        <input type="hidden" value="<?php echo $Patient_Gender;?>" name="Patient_Gender">
                                        <input type="hidden" value="<?php echo $Patient_Age;?>" name="Patient_Age">
                                        <input type="hidden" value="<?php echo $City;?>" name="City">
                                        <input type="hidden" value="<?php echo $State;?>" name="State">
                                        <input type="hidden" value="<?php echo $Date_covid_positive;?>" name="Date_covid_positive">
                                        <input type="hidden" value="<?php echo $transmissible_disease;?>" name="transmissible_disease">
                                        <input type="hidden" value="<?php echo $Aadhar_No;?>" name="Aadhar_No">
                                        <input type="hidden" value="<?php echo $res['Aadhar_No'];?>" name="Aadhar_No_donor">

                                        <input type="submit" value="accept">
                                    </form></td>
                                    

                                <!-- <td><button class = "btn btn-primary">
                                <a href = "filter.php?acceptid=<?php //echo $res['sno']?>" class = "text-light">Accept</a></button></td> -->
                            </tr>
                           <?php 
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_GET['acceptid'])){
        echo "hii";
    }

?>




<!-- $sql = "UPDATE donate SET 	Donor_Status='1' WHERE Aadhar_No='$res['Aadhar_No'];'; -->
