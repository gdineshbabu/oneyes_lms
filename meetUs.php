<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$message = array();
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
   


         $insert = mysqli_query($conn, "INSERT INTO `feedback`(user_id , feedback_text) VALUES('$user_id', '$feedback')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            
            header('location:meetUs.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_FeedBack</title>
        <!-- Font Awesome Icons -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
/>
<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
    rel="stylesheet"
/>
<!-- Stylesheet -->
        <link rel="stylesheet" href="oneyes_lms.css"/>

        <link rel="icon" href="https://i.ibb.co/prbm4Fd/video-image-iy-DVBDl-Jd-removebg-preview.png">

        
        
    </head>
    <body>
        <header>
            <nav>
        
                <a href="#default" id="logo" class="a4"><img
                    src="https://i.ibb.co/prbm4Fd/video-image-iy-DVBDl-Jd-removebg-preview.png" alt="video-image-iy-DVBDl-Jd-removebg-preview" border="0" width=60%"
                    height="80px"></a>
                <i class="fas fa-bars" id="ham-menu" style="cursor:pointer"></i>
                <ul id="nav-bar">
                    <li>
                        <a href="OneYes_lms.php">Home</a>
                    </li>
                    <li>
                        <a href="oneyes_about.php">About</a>
                    </li>
                    <li>
                        <a href="oneyes_services.php">Services</a>
                    </li>
                    <li>
                        <a href="oneyes_team.php">Team</a>
                    </li>
                    <li>
                        <a href="oneyes_contact.php">Contact</a>
                    </li>
                    <li>
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                           $fetch = mysqli_fetch_assoc($select);
                        }
                        
                     ?>
                        <a href="user_profile.php" class="active1">Hii <?php echo $fetch['name']; ?></a>
                    </li>
                </ul>
            </nav>
        
        </header>
        <br><br><br><br><br><br><br><br>
        <section >
            <br>
        <div class="reg1">
            <h1 class="reg11">Feed Back</h1>
            <h1 class="reg12">Share your Thoughts</h1>
        </div>
        <br>
        <div class="reg3">
        
            <form action="" method="post" enctype="multipart/form-data">

                <?php
                if(isset($message)){
                foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
                    }
                    }
                ?>
                  <input type="text" name="name" placeholder="Full Name"class="regform11"required><br>
                  <input type="email" name="email" placeholder="Email"class="regform1"required>
                  <input type="text" name="feedback" placeholder="message"class="regform1" rows="10" cols="10" required><br>
                  <button class="glow-on-hover" name="submit" type="submit" id="buttona1" onclick="message()">Submit</button></input>
                 
                  
                  
            </form>
            
        </div>

        <div class="do8" id="contact">
                <div class="do81">
                    <h1 class="do8h1">ONEYES INFOTECH SOLUTIONS</h1>
                    <p class="do8p">You might have a business that you wish to take to the next level. In the age of the internet, it’s possible! Your business can have a presence online. We at OneYes Infotech Solutions, provide you with a custom-made applications that fulfill your needs.Build your site with us!.</p>
                </div>
                <div class="do82">
                    <h1 class="do8h2">Contact Us</h1>
                    <i class="fas fa-envelope" id="tt"><a class="tt" href="mailto:info@oneyesinfotechsolutions.com">Email</a></i><br>
                    <br>
                        
                        <i class="fa fa-instagram" area-hidden="true" id="tt"><a class="tt"
                                                                                href="https://www.instagram.com/oneyes_technologies/?hl=en">Instagram</a></i><br>
                        <br>
                        <i class="fa fa-facebook" area-hidden="true" id="tt"><a class="tt"
                                                                                 href="https://www.facebook.com/OneYesTechnologies/">Facebook</a></i><br>
                        <br>
                        <i class="fa fa-linkedin" id="tt"><a class="tt" href="https://www.linkedin.com/in/oneyestechnologies">LinkedIn</a></i><br>

                        <br>
                </div>
                <br>
                <a href="OneYes_lms.php" class="la2">Home</a>
                <a href="oneyes_about.php" class="la1">About</a>
                <a href="oneyes_services.php" class="la1">Services</a>
                <a href="oneyes_team.php" class="la1">Team</a>
                <a href="oneyes_contact.php" class="la1">Contact Us</a>
                <br><br><br><br><br>
        
            </div>


    </section>

    <script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </body>

</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

.message
{
	color:black;
	font-size:2.0vw;
	text-align:center;
	margin-bottom:-20px;
	margin-top:-40px;
	background-color:red;
}
.reg3
{
    background-image: linear-gradient(to top, #dbdcd7 0%, #dddcd7 24%, #e2c9cc 30%, #e7627d 46%, #b8235a 59%, #801357 71%, #3d1635 84%, #1c1a27 100%);
}
</style>

