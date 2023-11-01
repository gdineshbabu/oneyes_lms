<?php

include 'config.php';
$message = array();
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email , password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_REGISTRATION</title>
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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#team">Team</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="login.php" class="active1">Login</a>
                    </li>
                </ul>
            </nav>
        
        </header>
        <br><br><br><br><br><br><br>
        <section >
            <br>
        <div class="reg1">
            <h1 class="reg11">Sign Up</h1>
            <h1 class="reg12">Become the member of ONEYES</h1>
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
                  <input type="email" name="email" placeholder="Email"class="regform1"required><br>
                  <input type="password" name="password" placeholder="Password"class="regform1"required/><br>
                  <input type="password" name="cpassword" placeholder="Confirm Password"class="regform1"required/><br>
                  <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png" required/>
                  <button class="glow-on-hover" name="submit" type="submit" id="buttona1" onclick="message()">Register</button></input>
                  <p class="rp2">If already you have an account? <a href="login.php">login now</a></p>
                  
                  
            </form>
            
        </div>
        <br><br><br><br><br>
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
    border-top-left-radius: 15%;
    border-bottom-right-radius: 10%;
}
section
{
    background-image:url('https://static.vecteezy.com/system/resources/previews/025/440/111/original/green-and-black-gradient-polygonal-3d-background-abstract-triangular-shape-geometric-web-design-tech-style-template-vector.jpg');
    
    background-size: 100%;
    height:100%;
}
input
{
    border-color: yellow;
    border-radius: 10px;
}

</style>
