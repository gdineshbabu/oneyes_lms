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
        <title>ONEYES_ABOUT</title>
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
                        <a href="oneyes_about.php" class="active2">About</a>
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
        <section>
            <br>
            <div class="do4">
                <h1 class="do4h1" id="about">ABOUT US</h1>
               <div class="do41">
                <p class="do4p1" data-aos="">If your mind thinks about mobile/website development, then we have created a niche for ourselves. We started in 2012 with just 3 employees and now have expanded ourselves to 50+ which shows about growth and quality of work that we did over the years.</p>
                <h1 class="do4r">Research And Analysis</h1>
                <p class="do4p1">Proper research and analysis are done for efficient strategy and cost reduction. Flexibility is one of our key strengths and we are ready to negotiate according to the client’s requirements.</p>
                
                <h1 class="do4r">Creative and innovative solutions</h1>
                <p class="do4p1">We have professionals who thinks out of the box and provide efficient and innovative solutions.</p>
                <h1 class="do4r">Agile Method</h1>
                <p class="do4p1">Agile methodologies are approaches to product development that are aligned with the values ​​and principles described in the Agile Manifesto for software development.</p>
        
                </div>
                <div class="do42">
                    <img src="https://i.ibb.co/4JrGYZ7/OIP-19-removebg-preview.png" alt="https://www.suttlejsoft.com/home-banners/about.png" class="do4img">
                </div>
            </div>
            <div class="do6" >
        <h1 class="do6h1">PRODUCTS</h1>
        <div class="do61" >
            <h1 class="do61h1" >ECOMMERCE</h1>
            <p class="webp">As you are aware, the advancement of technology and communications has had a great say in the business and economy of the world that trading is made possible round the clock from any corner of the globe. Such a transaction, also known as ecommerce, has enabled companies to gain access to their clients at any part of the world at any time. We are the best Ecommerce Website Development in Chennai to fullfill your needs.</p>

        </div>
        <div class="do62" >
            <h1 class="do61h2">CRM</h1>
            <p class="webp">We serve cloud-based CRM software for enterprises, which provides comprehensive customer experience management facilities across multiple communication channels. The software is also capable of automating business-critical activities such as lead capturing, distribution, ticket management, and more.The program can be configured according to unique business requirements.</p>

        </div>
        <div class="do61" >
            
                <h1 class="do61h1">HIRING CONTENT</h1>
                <p class="webp">Give your talent acquisition team the power to develop engaging and interactive virtual hiring events that drive conversions.The technical interview- in which subject related questions will be asked, Group discussion and finally face to face interview will happen through our portal and the HR will select the qualified candidates . Offer letter issuance can be directly done from our portal.</p>

        </div>
        <div class="do62" >
            
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

