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
        header("Location: DS_Basics.php");
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
        <title>ONEYES_DS_INTRODUCTION</title>
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
                    <a href="#" class="active">Inroduction to DS<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS.php" class="active">Inroduction to DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 20) {
                    echo '
                    <a href="#">Basics of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Basics.php" class="completed_c">Basics of DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#">Types of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Types.php" class="completed_c">Types of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#">Applications of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Applications.php" class="completed_c">Applications of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#">History of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_History.php" class="completed_c">History of DS<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Introduction to DS :</h2>
        <p class="high">What is Data Science?</p>
        <p class="ccontent">Data Science is kinda blended with various tools, algorithms, and machine learning principles. Most simply, it involves obtaining meaningful information or insights from structured or unstructured data through a process of analyzing, programming and business skills.</p>
        <p class="ccontent">It is a field containing many elements like mathematics, statistics, computer science, etc. Those who are good at these respective fields with enough knowledge of the domain in which you are willing to work can call themselves as Data Scientist.</p>
        <p class="ccontent">It’s not an easy thing to do but not impossible too. You need to start from data, it’s visualization, programming, formulation, development, and deployment of your model. In the future, there will be great hype for data scientist jobs. Taking in that mind, be ready to prepare yourself to fit in this world.</p>
        
        <img src="https://i.ytimg.com/vi/yh2pLdDb87c/maxresdefault.jpg" alt="AI" class="cimg1">
        
        <p class="high">How Data Science Works?</p>
        <p class="ccontent">Data science is not a one-step process such that you will get to learn it in a short time and call ourselves a Data Scientist. It’s passes from many stages and every element is important. One should always follow the proper steps to reach the ladder. Every step has its value and it counts in your model. Buckle up in your seats and get ready to learn about those steps.</p>
        <li class="clist"><span class="high1">Problem Statement:</span>No work start without motivation, Data science is no exception though. It’s really important to declare or formulate your problem statement very clearly and precisely. Your whole model and it’s working depend on your statement. Many scientist considers this as the main and much important step of Date Science. So make sure what’s your problem statement and how well can it add value to business or any other organization.</li>
        <li class="clist"><span class="high1">Data Collection: </span>After defining the problem statement, the next obvious step is to go in search of data that you might require for your model. You must do good research, find all that you need. Data can be in any form i.e unstructured or structured. It might be in various forms like videos, spreadsheets, coded forms, etc. You must collect all these kinds of sources.</li>
        <li class="clist"><span class="high1">Data Cleaning:</span>As you have formulated your motive and also you did collect your data, the next step to do is cleaning. Yes, it is! Data cleaning is the most favorite thing for data scientists to do. Data cleaning is all about the removal of missing, redundant, unnecessary and duplicate data from your collection. </li>
        <li class="clist"><span class="high1">Data Analysis and Exploration: </span>It’s one of the prime things in data science to do and time to get inner Holmes out. It’s about analyzing the structure of data, finding hidden patterns in them, studying behaviors, visualizing the effects of one variable over others and then concluding. We can explore the data with the help of various graphs formed with the help of libraries using any programming language.</li>
        <li class="clist"><span class="high1">Data Modelling:</span>Once you are done with your study that you have formed from data visualization, you must start building a hypothesis model such that it may yield you a good prediction in future. Here, you must choose a good algorithm that best fit to your model. </li>
        <li class="clist"><span class="high1">Optimization and Deployment: </span>You followed each and every step and hence build a model that you feel is the best fit. But how can you decide how well your model is performing? This where optimization comes. You test your data and find how well it is performing by checking its accuracy. </li>

        <p class="high">Advice for new data science students </p>
        <li class="clist"><span class="high1">Curiosity :</span>If you are not curious , you would not know what to do with the data . </li>
        <li class="clist"><span class="high1">Judgmental :</span> It is because if you do not have preconceived notions about the things you wouldn’t know where to begin with .</li>
        <li class="clist"><span class="high1">Argumentative : </span>It is because if you can argument and if you can plead a case , at least you can start somewhere and then you can learn from data and then can modify your assumptions. </li>
        <li class="clist">Start by gaining a solid understanding of the basics of programming, statistics, and linear algebra.</li>
        <li class="clist">Practice, practice, practice. Participate in online coding challenges and hackathons to improve your skills and gain experience.</li>
        
        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/X3paOmcrTjQ"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 5;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 10) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Basics.php"><button class="nbutton1" type="button">Next</button></a>';
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



