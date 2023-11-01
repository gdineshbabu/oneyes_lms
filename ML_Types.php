<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['increase_progress'])) {
    $user_id = $user_id;
    $course_id = 10;

    $query = "UPDATE user_course SET progress = progress + 10 WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ML_Applications.php");
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
        <title>ONEYES_ML_TYPES</title>
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
        $course_id = 10; 
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
            $course_id = 10;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 10) {
                    echo '
                    <a href="#" class="completed_c">Inroduction to ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML.php" class="completed_c">Inroduction to ML<br><span class="small">Completed</span></a>';
                }
                if ($progress < 20) {
                    echo '
                    <a href="#" class="completed_c">Basics of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Basics.php" class="completed_c">Basics of ML<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#" class="active">Types of ML<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Types.php" class="active">Types of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#">Applications of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Applications.php" class="completed_c">Applications of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#">History of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_History.php" class="completed_c">History of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#">Goals of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Goals.php" class="completed_c">Goals of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#">Algorithms of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Algorithms.php" class="completed_c">Algorithms of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#">ML DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Mcq.php" class="completed_c">ML DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#">Assignment</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Assignment.php" class="completed_c">Assignment<br><span class="small">Completed</span></a>';
                }
               
                if ($progress < 100) {
                    echo '
                    <a href="#">Complete ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Complete.php" class="completed_c">Complete ML<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Over View</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Overview.php" class="completed_c">Over View<br><span class="small">Completed</span></a>';
                }
            }
            ?>

        <br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="main">
        <h1 class="chead">Machine Learning</h1>
        <h2 class="subhead">Types of ML :</h2>
        
        <p class="ccontent">Machine learning implementations are classified into four major categories, depending on the nature of the learning “signal” or “response” available to a learning system which are as follows:</p>
        <li class="clist">Supervised Learning</li>
        <li class="clist">UnSupervised Learning</li>
        <li class="clist">Reinforcement Learning</li>
        <li class="clist">Semi-Supervised Learing</li>
        <h1 class="high">A. Supervised learning:</h1>
        <p class="ccontent">Supervised learning is the machine learning task of learning a function that maps an input to an output based on example input-output pairs. The given data is labeled. Both classification and regression problems are supervised learning problems.</p>
        <li class="clist">Example —  Consider the following data regarding patients entering a clinic . The data consists of the gender and age of the patients and each patient is labeled as “healthy” or “sick”.</li>
        
        <img src="https://th.bing.com/th/id/R.b6b5a3a73f568bd1f2b588feb93cd02a?rik=d0gt%2bmbw7VaQOw&riu=http%3a%2f%2fwww.favouriteblog.com%2fwp-content%2fuploads%2f2017%2f07%2fTypes-of-Learning.png&ehk=z%2btK2BpOxRNtB3u4Gis9bn3dIkKxuVwcqmENF9cGlx0%3d&risl=&pid=ImgRaw&r=0" alt="AI" class="cimg1">

        <h1 class="high">B. Unsupervised learning:</h1>
        <p class="ccontent">Unsupervised learning is a type of machine learning algorithm used to draw inferences from datasets consisting of input data without labeled responses. In unsupervised learning algorithms, classification or categorization is not included in the observations. Example: Consider the following data regarding patients entering a clinic. The data consists of the gender and age of the patients. </p>
        <p class="ccontent">As a kind of learning, it resembles the methods humans use to figure out that certain objects or events are from the same class, such as by observing the degree of similarity between objects. Some recommendation systems that you find on the web in the form of marketing automation are based on this type of learning.</p>

        <h1 class="high">C. Reinforcement Learning</h1>
        <p class="ccontent">Reinforcement learning is the problem of getting an agent to act in the world so as to maximize its rewards.</p>
        <p class="ccontent">A learner is not told what actions to take as in most forms of machine learning but instead must discover which actions yield the most reward by trying them. For example — Consider teaching a dog a new trick: we cannot tell him what to do, what not to do, but we can reward/punish it if it does the right/wrong thing.</p>
        <p class="ccontent"> When watching the video, notice how the program is initially clumsy and unskilled but steadily improves with training until it becomes a champion.</p>

        <h1 class="high">D. Semi-supervised learning:</h1>
        <p class="ccontent">Where an incomplete training signal is given: a training set with some (often many) of the target outputs missing. There is a special case of this principle known as Transduction where the entire set of problem instances is known at learning time, except that part of the targets are missing.</p>
        <p class="ccontent">Semi-supervised learning is an approach to machine learning that combines small labeled data with a large amount of unlabeled data during training. Semi-supervised learning falls between unsupervised learning and supervised learning. </p>

        <h1 class="high">Categorizing based on Required Output :</h1>
        <p class="ccontent">Another categorization of machine-learning tasks arises when one considers the desired output of a machine-learned system:  </p>
        <li class="clist">1. <span class="high1">Classification : </span>When inputs are divided into two or more classes, the learner must produce a model that assigns unseen inputs to one or more (multi-label classification) of these classes. This is typically tackled in a supervised way. Spam filtering is an example of classification, where the inputs are email (or other) messages and the classes are “spam” and “not spam”.</li>
        <li class="clist">2. <span class="high1">Regression :</span>Which is also a supervised problem, A case when the outputs are continuous rather than discrete.</li>
        <li class="clist">3. <span class="high1">Clustering :</span> When a set of inputs is to be divided into groups. Unlike in classification, the groups are not known beforehand, making this typically an unsupervised task.</li>
        <p class="ccontent">Machine Learning comes into the picture when problems cannot be solved using typical approaches.  ML algorithms combined with new computing technologies promote scalability and improve efficiency.  Modern ML models can be used to make predictions ranging from outbreaks of disease to the rise and fall of stocks.</p>



        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/olFxW7kdtP8"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 10;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 30) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Applications.php"><button class="nbutton1" type="button">Next</button></a>';
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

</html>



