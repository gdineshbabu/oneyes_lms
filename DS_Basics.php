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
        header("Location: DS_Types.php");
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
        <title>ONEYES_DS_BASICS</title>
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
                    <a href="#" class="active">Basics of DS<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Basics.php" class="active">Basics of DS<br><span class="small">Completed</span></a>';
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
        <h1 class="chead">Artificial Intelligence</h1>
        <h2 class="subhead">Basics to AI :</h2> <br>
        <p class="ccontent">Data science is the science of analyzing raw data using statistics and machine learning techniques with the purpose of drawing conclusions about that information.</p>
        <p class="high">Key Pillars of Data Science</p>
        <p class="ccontent">Usually, data scientists come from various educational and work experience backgrounds, most should be proficient in, or in an ideal case be masters in four key areas.</p>
        <img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20201204170056/4-Key-Pillars-of-Data-Science.png" alt="AI" class="cimg1">
        <p class="high">Pillar of data science</p>
        <p class="high1">Domain Knowledge:</p>
        <li class="clist">Most people thinking that domain knowledge is not important in data science but it is essential. The foremost objective of data science is to extract useful insights from that data so that it can be profitable to the company’s business. If you are not aware of the business side of the company that how the business model of the company works and how you can’t build it better than you are of no use for this company.</li>

      
        <p class="high1">Math Skills</p>
        <li class="clist">Linear Algebra, Multivariable Calculus & Optimization Technique: These three things are very important as they help us in understanding various machine learning algorithms that play an important role in Data Science.</li>

        <p class="high1">Computer Science</p>
        <li class="clist">Programming Knowledge: One needs to have a good grasp of programming concepts such as Data structures and Algorithms. The programming languages used are Python, R, Java, Scala. C++ is also useful in some places where performance is very important.</li>
        <li class="clist">Programming Knowledge: One needs to have a good grasp of programming concepts such as Data structures and Algorithms. The programming languages used are Python, R, Java, Scala. C++ is also useful in some places where performance is very important.</li>
        <li class="clist">Non-Relational Databases: There are many types of non-relational databases but mostly used types are Cassandra, HBase, MongoDB, CouchDB, Redis, Dynamo.</li>

        
        <p class="high1">Communication Skill</p>
        <li class="clist">It includes both written and verbal communication. What happens in a data science project is after drawing conclusions from the analysis, the project has to be communicated to others. </li>
        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/N6BghzuFLIg"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 5;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 20) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Types.php"><button class="nbutton1" type="button">Next</button></a>';
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



