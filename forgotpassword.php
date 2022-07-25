<?php
require("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$reset_token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');
    
    $mail = new PHPMailer(true);
    try {
        //Server settings
                            //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'binod691969@gmail.com';                     //SMTP username
        $mail->Password   = 'binod122@';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('binod691969@gmail.com', 'Covid Help');
        $mail->addAddress($email);     //Add a recipient
        
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = "We got a request from you to reset your password <br>
        Click the link below : <br>
        <a href='http://localhost/project/covid/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}

if(isset($_POST['send-reset-link']))
{
    $query="SELECT * FROM `register` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
        $reset_token=bin2hex(random_bytes(16));
        date_default_timezone_set('Asia/kolkata');
        $date=date("Y-m-d");
        $query="UPDATE `register` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
        if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token)){
            echo"
            <script>
            alert('Pssword Reset Link Sent to mail');
            window.location.href='header.php';
            </script>
           ";
        }
        else{
            echo"
           <script>
           alert('Server Down! try again later');
           window.location.href='header.php';
           </script>
           ";
        }
    }
      else{
        echo"
        <script>
        alert('email not found');
        window.location.href='header.php';
        </script>
       ";
      }
    }
    else
    {
        echo"
         <script>
         alert('cannot run query');
         window.location.href='header.php';
         </script>
        ";
    }
}
?>