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
        header("Location: C++_Mcq.php");
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
        <title>ONEYES_C++_ALGORITHMS</title>
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
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query fC++led');
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
        $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query fC++led');
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
                    <a href="#" class="completed_c">Applications of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Applications.php" class="completed_c">Applications of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#" class="completed_c">History of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_History.php" class="completed_c">History of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#" class="completed_c">Goals of C++</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Goals.php" class="completed_c">Goals of C++<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#" class="active">Algorithms of C++<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Algorithms.php" class="active">Algorithms of C++<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Algorithms of C++ :</h2>

        <p class="ccontent">C++ algorithms are the programs that can learn the hidden patterns from the data, predict the output, and improve the performance from experiences on their own. Different algorithms can be used in C++ for different tasks, such as simple linear regression that can be used for prediction problems like stock market prediction, and the KNN algorithm can be used for classification problems.</p>

        <p class="ccontent">In this topic, we will see the overview of some popular and most commonly used C++ algorithms along with their use cases and categories.</p>
        <img src="https://th.bing.com/th/id/OIP.lcWvzmxbLwJbREpRXJIeFQHaEK?pid=ImgDet&rs=1" alt="C++" class="cimg1">
        <h1 class="high">Types of C++ Algorithms :</h1>
        <p class="ccontent">C++ Algorithm can be broadly classified into three types:</p>
        <li class="clist">1. <span class="high1">Supervised Learning Algorithms</span></li>
        <li class="clist">2. <span class="high1">UnSupervised Learning Algorithms</span></li>
        <li class="clist">3. <span class="high1">Reinforcement Learning algorithm</span></li>
        <p class="high">1. Supervised Learning</p>
        <p class="ccontent">Supervised learning is a type of C++ in which the machine needs external supervision to learn. The supervised learning models are trained using the labeled dataset. Once the training and processing are done, the model is tested by providing a sample test data to check whether it predicts the correct output.</p>
        <p class="ccontent">The goal of supervised learning is to map input data with the output data. Supervised learning is based on supervision, and it is the same as when a student learns things in the teacher's supervision. The example of supervised learning is spam filtering.</p>
        <p class="ccontent">Supervised learning can be divided further into two categories of problem:</p>
        <li class="clist">Classification</li>
        <li class="clist">Regression</li>

        <p class="high">2. UnSupervised Learning Algorithms</p>
        <p class="ccontent">It is a type of C++ in which the machine does not need any external supervision to learn from the data, hence called unsupervised learning. The unsupervised models can be trained using the unlabelled dataset that is not classified, nor categorized, and the algorithm needs to act on that data without any supervision. </p>
        <p class="ccontent">In unsupervised learning, the model doesn't have a predefined output, and it tries to find useful insights from the huge amount of data. These are used to solve the Association and Clustering problems. Hence further, it can be classified into two types:</p>
        <li class="clist">Classification</li>
        <li class="clist">Association</li>
        <p class="ccontent">Examples of some Unsupervised learning algorithms are K-means Clustering, Apriori Algorithm, Eclat, etc. </p>

        <p class="high">3. Reinforcement Learning</p>
        <p class="ccontent">In Reinforcement learning, an agent interacts with its environment by producing actions, and learn with the help of feedback. The feedback is given to the agent in the form of rewards, such as for each good action, he gets a positive reward, and for each bad action, he gets a negative reward. </p>
        <p class="ccontent">There is no supervision provided to the agent. Q-Learning algorithm is used in reinforcement learning.</p>

        <h1 class="subhead">List of Popular C++ Algorithm</h1>
        <li class="clist">1. <span class="high1">Linear Regression Algorithm</span></li>
        <li class="clist">2. <span class="high1">Logistic Regression Algorithm</span></li>
        <li class="clist">3. <span class="high1">Decision Tree</span></li>
        <li class="clist">4. <span class="high1">SVM</span></li>
        <li class="clist">5. <span class="high1">Naïve Bayes</span></li>
        <li class="clist">6. <span class="high1">KNN</span></li>
        <li class="clist">7. <span class="high1">K-Means Clustering</span></li>
        <li class="clist">8. <span class="high1">Random Forest</span></li>
        <li class="clist">9. <span class="high1">Apriori</span></li>
        <li class="clist">10. <span class="high1">PCA</span></li>





        
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 2;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query fC++led');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 70) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="C++_Mcq.php"><button class="nbutton1" type="button">Next</button></a>';
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



