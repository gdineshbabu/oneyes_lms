<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['increase_progress'])) {
    $user_id = $user_id;
    $course_id = 5;

    $query = "UPDATE user_course SET progress = progress + 10 WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: DS_Goals.php");
        exit();
    } else {
        // Handle the error
        echo "Error updating progress: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE htDS>
<htDS lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_DS_HISTORY</title>
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
        $course_id = 5; 
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
            $course_id = 5;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 10) {
                    echo '
                    <a href="#" class="completed_c">Inroduction to DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS.php" class="completed_c">Inroduction to DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 20) {
                    echo '
                    <a href="#" class="completed_c">Basics of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Basics.php" class="completed_c">Basics of DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#" class="completed_c">Types of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Types.php" class="completed_c">Types of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#" class="completed_c">Applications of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Applications.php" class="completed_c">Applications of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#" class="active">History of DS<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_History.php" class="active">History of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#">Goals of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Goals.php" class="completed_c">Goals of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#">Algorithms of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Algorithms.php" class="completed_c">Algorithms of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#">DS DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Mcq.php" class="completed_c">DS DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#">Assignment</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Assignment.php" class="completed_c">Assignment<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Complete DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Complete.php" class="completed_c">Complete DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Over View</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Overview.php" class="completed_c">Over View<br><span class="small">Completed</span></a>';
                }
            }
            ?>

        <br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="main">
        <h1 class="chead">Data Science</h1>
        <h2 class="subhead">History of DataScience :</h2> 

        <p class="ccontent">The term “Data Science” was created in the early 1960s to describe a new profession that would support the understanding and interpretation of the large amounts of data which was being amassed at the time. (At the time, there was no way of predicting the truly massive amounts of data over the next fifty years.) Data Science continues to evolve as a discipline using computer science and statistical methodology to make useful predictions and gain insights in a wide range of fields. While Data Science is used in areas such as astronomy and medicine, it is also used in business to help make smarter decisions.</p>
        
        <img src="https://miro.medium.com/max/1200/1*S0HfWB3vM2T4ftS1Siz5vg.jpeg" alt="AI" class="cimg1">
        

    
        
        <p class="ccontent">Statistics, and the use of statistical models, are deeply rooted within the field of Data Science. Data Science started with statistics and has evolved to include concepts/practices such as artificial intelligence, machine learning, and the Internet of Things, to name a few. As more and more data has become available, first by way of recorded shopping behaviors and trends, businesses have been collecting and storing it in ever greater amounts. With the growth of the Internet, the Internet of Things, and the exponential growth of data volumes available to enterprises, there has been a flood of new information or big data. Once the doors were opened by businesses seeking to increase profits and drive better decision-making, the use of big data started being applied to other fields, such as medicine, engineering, and social sciences.</p>

        <p class="ccontent">Advertisement
Homepage>Data Education>Smart Data News, Articles, & Education>A Brief History of Data Science
A Brief History of Data Science
By Keith D. Foote on October 16, 2021
kf_bhds_121416
The term “Data Science” was created in the early 1960s to describe a new profession that would support the understanding and interpretation of the large amounts of data which was being amassed at the time. (At the time, there was no way of predicting the truly massive amounts of data over the next fifty years.) Data Science continues to evolve as a discipline using computer science and statistical methodology to make useful predictions and gain insights in a wide range of fields. While Data Science is used in areas such as astronomy and medicine, it is also used in business to help make smarter decisions.

Statistics, and the use of statistical models, are deeply rooted within the field of Data Science. Data Science started with statistics and has evolved to include concepts/practices such as artificial intelligence, machine learning, and the Internet of Things, to name a few. As more and more data has become available, first by way of recorded shopping behaviors and trends, businesses have been collecting and storing it in ever greater amounts. With the growth of the Internet, the Internet of Things, and the exponential growth of data volumes available to enterprises, there has been a flood of new information or big data. Once the doors were opened by businesses seeking to increase profits and drive better decision-making, the use of big data started being applied to other fields, such as medicine, engineering, and social sciences.

A functional data scientist, as opposed to a general statistician, has a good understanding of software architecture and understands multiple programming languages. The data scientist defines the problem, identifies the key sources of information, and designs the framework for collecting and screening the needed data. Software is typically responsible for collecting, processing, and modeling the data. They use the principles of Data Science, and all the related sub-fields and practices encompassed within Data Science, to gain deeper insight into the data assets under review.</p>
        <p class="ccontent">Advertisement
Homepage>Data Education>Smart Data News, Articles, & Education>A Brief History of Data Science
A Brief History of Data Science
By Keith D. Foote on October 16, 2021
kf_bhds_121416
The term “Data Science” was created in the early 1960s to describe a new profession that would support the understanding and interpretation of the large amounts of data which was being amassed at the time. (At the time, there was no way of predicting the truly massive amounts of data over the next fifty years.) Data Science continues to evolve as a discipline using computer science and statistical methodology to make useful predictions and gain insights in a wide range of fields. While Data Science is used in areas such as astronomy and medicine, it is also used in business to help make smarter decisions.

Statistics, and the use of statistical models, are deeply rooted within the field of Data Science. Data Science started with statistics and has evolved to include concepts/practices such as artificial intelligence, machine learning, and the Internet of Things, to name a few. As more and more data has become available, first by way of recorded shopping behaviors and trends, businesses have been collecting and storing it in ever greater amounts. With the growth of the Internet, the Internet of Things, and the exponential growth of data volumes available to enterprises, there has been a flood of new information or big data. Once the doors were opened by businesses seeking to increase profits and drive better decision-making, the use of big data started being applied to other fields, such as medicine, engineering, and social sciences.

A functional data scientist, as opposed to a general statistician, has a good understanding of software architecture and understands multiple programming languages. The data scientist defines the problem, identifies the key sources of information, and designs the framework for collecting and screening the needed data. Software is typically responsible for collecting, processing, and modeling the data. They use the principles of Data Science, and all the related sub-fields and practices encompassed within Data Science, to gain deeper insight into the data assets under review.

There are many different dates and timelines that can be used to trace the slow growth of Data Science and its current impact on the Data Management industry, some of the more significant ones are outlined below.</p>

        <h1 class="high">From the 1960s to the Present</h1>
        <p class="ccontent">In 1962, John Tukey wrote a paper titledThe Future of Data Analysis and described a shift in the world of statistics, saying, “… as I have watched mathematical statistics evolve, I have had cause to wonder and to doubt…I have come to feel that my central interest is in data analysis…” Tukey is referring to the merging of statistics and computers, when computers were first being used to solve mathematical problems and work with statistics, rather than doing the work by hand.

</p>
        <p class="ccontent">In 1974, Peter Naur authored the Concise Survey of Computer Methods, using the term “Data Science,” repeatedly. Naur presented his own convoluted definition of the new concept:</p>
        <p class="ccontent">In 1977, The IASC, also known as the International Association for Statistical Computing was formed. The first phrase of their mission statement reads, “It is the mission of the IASC to link traditional statistical methodology, modern computer technology, and the knowledge of domain experts in order to convert data into information and knowledge.”

</p>


        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/eKoe8YE1uFU"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 5;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 50) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Goals.php"><button class="nbutton1" type="button">Next</button></a>';
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

</htDS>



