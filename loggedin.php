<?php
                                   
require('connection.php');
session_start();
                                   if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                                    {
                                    echo"
                                    <div class='user'>
                                     
                                    </div>
                                    <script>location.href='form_donor.php'</script>
                                    ";
                                    }
                                 else
                                {
                                    //echo ("<script>location.href='$yourURL'</script>");
                                //     echo "<div class='popup-container' id='login-popup'>
                                //     <div class='popup'>
                                //         <form method='POST' action='login_register.php'>
                                //             <h2>
                                //                 <span>USER LOGIN</span>
                                //                 <button type='reset' onclick='popup('login-popup')'>X</button>
                                //             </h2>
                                //             <input type='text' placeholder='E-mail or username' name='email_username'>
                                //             <input type='password' placeholder='Password' name='password'>
                                //             <button type='submit' class='login-btn' name='login'>LOGIN</button>
                                //         </form>
                                //         <div class='forgot-btn'>
                                //             <button type='button' onclick='forgotPopup()'>Forgot Password ?</button>
                                //         </div>
                                //     </div>
                                // </div>";


                                echo "<script> 
                                alert ('Please login or register');
                                </script>";

                                echo "<script>location.href='index.php'</script>";
                        
                                }

?>