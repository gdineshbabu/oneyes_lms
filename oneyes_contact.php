<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_CONTACT</title>
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
                        <a href="oneyes_services.php" >Services</a>
                    </li>
                    <li>
                        <a href="oneyes_team.php" >Team</a>
                    </li>
                    <li>
                        <a href="oneyes_contact.php" class="active2">Contact</a>
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
        <section>
            <br>
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
                <br><br>
                <a href="meetUs.php" class="do7a1"><button class="glow-on-hover" type="button"  id="buttonsdo">Feedback</button></a>
                <br><br><br>
        
            </div>
            <div class="do6">
                <h1 class="do6h1">PRODUCTS</h1>
                <div class="do61" >
                    <h1 class="do61h1" >ECOMMERCE</h1>
                    <p class="webp">As you are aware, the advancement of technology and communications has had a great say in the business and economy of the world that trading is made possible round the clock from any corner of the globe. Such a transaction, also known as ecommerce, has enabled companies to gain access to their clients at any part of the world at any time. We are the best Ecommerce Website Development in Chennai to fullfill your needs.</p>
        
                </div>
                <div class="do62">
                    <h1 class="do61h2">CRM</h1>
                    <p class="webp">We serve cloud-based CRM software for enterprises, which provides comprehensive customer experience management facilities across multiple communication channels. The software is also capable of automating business-critical activities such as lead capturing, distribution, ticket management, and more.The program can be configured according to unique business requirements.</p>
        
                </div>
                <div class="do61" >
                    
                        <h1 class="do61h1">HIRING CONTENT</h1>
                        <p class="webp">Give your talent acquisition team the power to develop engaging and interactive virtual hiring events that drive conversions.The technical interview- in which subject related questions will be asked, Group discussion and finally face to face interview will happen through our portal and the HR will select the qualified candidates . Offer letter issuance can be directly done from our portal.</p>
        
                </div>
                <div class="do62">
                    
                    <h1 class="do61h1">Edu - Tech</h1>
                    <p class="webp">Online Education Portal is one of our premium products and this portal focuses on providing end-to-end management solutions to all the stakeholders of an educational institute.Online Education ensures flexibility to all its stakeholders. While the students get the freedom to study at their pace, the teachers can also share their e-assessments, reports at their convenience.
        
                    </p>
        
            </div>
        
            </div>
        
        
        
    </section>

    <script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </body>

</html>

