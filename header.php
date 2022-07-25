<?php
 require('connection.php'); 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login and register</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header style = "box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
        <!-- <h2>Covid Help</h2> -->
        <a href="index.php"><span style = "color: black; font-weight: bold; text-decoration: none; font-size: 25px"  >Covid Help</span></a>
        <nav class="navbar navbar-default navbar-fixed-top">
            <!-- <a href="#">Home</a> -->
            <a href="https://covidwin.in/">Resources</a>
            <a href="covid1.php">Covid Update</a>
            <a href="https://www.pmcares.gov.in/en/">PM Care</a>
            <a href="help.html">Help</a>
        </nav>
         <?php
         if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
         {
             echo"
             <div class='user'>
             $_SESSION[username]- <a href='logout.php'>LOGOUT</a>
             </div>
             ";
         }
         else
         {
             echo"
             <div class='sign-in-up'>
            <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
            <button type='button' onclick=\"popup('register-popup')\">Register</button>
            </div> 
            
             ";
         }

         ?>
    </header>
   <!-- covid\login_register.php -->
    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="E-mail or username" name="email_username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
            <div class="forgot-btn">
                <button type="button" onclick="forgotPopup()">Forgot Password ?</button>
            </div>
        </div>
    </div>

<div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="Full Name" name="fullname" required>
                <input type="text" placeholder="Username" name="username"required>
                <input type="email" placeholder="E-mail" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="register-btn" name="register">REGISTER</button>
            </form>
        </div>
    </div>
    <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
            <form method="POST" action="forgotpassword.php">
                <h2>
                    <span>RESET PASSWORD</span>
                    <button type="reset" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="text" placeholder="E-mail" name="email">
                
                <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
            </form>
            
        </div>
    </div>

    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      echo"<h1 style='text-align:center; margin-top:200px'> Welcome to COVID HELP - $_SESSION[username]</h1>";
    }
    ?>
    <script>
        function popup(popup_name)
        {
           get_popup=document.getElementById(popup_name);
           if(get_popup.style.display=="flex")
           {
            get_popup.style.display="none";
           }
           else
           {
            get_popup.style.display="flex";
           }
        }
        function forgotPopup(){
            document.getElementById('login-popup').style.display="none";
            document.getElementById('forgot-popup').style.display="flex";

        }
    </script>


</body>
</html>