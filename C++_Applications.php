<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['increase_progress'])) {
    $user_id = $user_id;
    $course_id = 2;

    $query = "UPDATE user_course SET progress = progress + 10 WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: C++_History.php");
        exit();
    } else {
        // Handle the error
        echo "Error updating progress: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_C++_APPLIACTIONS</title>
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
        <link rel="stylesheet" href="oneyes_pages.css">

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
        
        <div class="sidenav">

        <a href="#" class="cp">Course progress<br><span class="small1">
        <?php
        $user_id = $user_id; 
        $course_id = 2; 
        $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
        if (mysqli_num_rows($selected) > 0) {
            $fetched = mysqli_fetch_assoc($selected);
        }
        ?>

        <br>
        <input type="range" id="percentage1" name="percentage1" min="0" max="100" value="<?php echo $fetched['progress']; ?>">
        <output for="percentage1" id="output1"><?php echo $fetched['progress']; ?>%</output>

        </span></a>
        <?php
            $user_id = $user_id;
            $course_id = 2;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 10) {
                    echo '
                    <a href="#" class="completed_c">Inroduction to C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++.php" class="completed_c">Inroduction to C++<br><span class="small">Completed</span></a>';
                }
                if ($progress < 20) {
                    echo '
                    <a href="#" class="completed_c">Basics of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Basics.php" class="completed_c">Basics of C++<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#" class="completed_c">Types of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Types.php" class="completed_c">Types of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#" class="active">Applications of C++<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Applications.php" class="active">Applications of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#">History of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_History.php" class="completed_c">History of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#">Goals of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Goals.php" class="completed_c">Goals of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#">Algorithms of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Algorithms.php" class="completed_c">Algorithms of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#">C++ DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Mcq.php" class="completed_c">C++ DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#">Assignment</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Assignment.php" class="completed_c">Assignment<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Complete C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Complete.php" class="completed_c">Complete C++<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Over View</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Overview.php" class="completed_c">Over View<br><span class="small">Completed</span></a>';
                }
            }
            ?>

        <br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="main">
        <h1 class="chead">C++</h1>
        <h2 class="subhead">Applications of C++ :</h2>
        <p class="ccontent">C++ is one of the most exciting technologies that one would have ever come across. As is evident from the name, it gives the computer that which makes it more similar to humans: The ability to learn. C++ is actively being used today, perhaps in many more places than one would expect. </p>
        <p class="ccontent">Today, companies are using C++ to improve business decisions, increase productivity, detect disease, forecast weather, and do many more things. With the exponential growth of technology, we not only need better tools to understand the data we currently have, but we also need to prepare ourselves for the data we will have.</p>

        <p class="ccontent">To achieve this goal we need to build intelligent machines. We can write a program to do simple things. But most of the time, Hardwiring Intelligence in it is difficult. The best way to do it is to have some way for machines to learn things themselves. A mechanism for learning – if a machine can learn from input then it does the hard work for us. This is where C++ comes into action. Some of the most common examples are:</p>
        <li class="clist">Image Recognition</li>
        <li class="clist">Speech Recognition</li>
        <li class="clist">Fraud Detection</li>
        <li class="clist">Recommender Systems</li>
        <li class="clist">Self Driving Cars</li>
        <li class="clist">Medical Diagnosis</li>
        <li class="clist">Stock Market Trading</li>
        <li class="clist">Virtual Try On</li>
        <img src="https://static.javatpoint.com/tutorial/machine-learning/images/applications-of-machine-learning.png" alt="AI" class="cimg1">
        

                
        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/oj-Aa6cVYrg"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 2;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 40) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_History.php"><button class="nbutton1" type="button">Next</button></a>';
                }
            }
            ?>
            </div>
    
        </div>
        
    </section>
     
    <script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </body>

</htC++>



