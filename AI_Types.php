<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['increase_progress'])) {
    $user_id = $user_id;
    $course_id = 1;

    $query = "UPDATE user_course SET progress = progress + 10 WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: AI_Applications.php");
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
        <title>ONEYES_AI_TYPES</title>
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
            $course_id = 1;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
            $fetched = mysqli_fetch_assoc($selected);
            }
        ?>
            <br>
            <input type="range" id="percentage1" name="percentage1" min="0" max="100" value="<?php echo $fetched['progress']; ?>">
<output for="percentage1" id="output1"><?php echo $fetched['progress']; ?>%</output>


        </span></a>
        <?php
            $user_id = $user_id;
            $course_id = 1;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 10) {
                    echo '
                    <a href="#" class="completed_c">Inroduction to AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI.php" class="completed_c">Inroduction to AI<br><span class="small">Completed</span></a>';
                }
                if ($progress < 20) {
                    echo '
                    <a href="#" class="completed_c">Basics of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Basics.php" class="completed_c">Basics of AI<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#" class="active">Types of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Types.php" class="active">Types of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#">Applications of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Applications.php" class="completed_c">Applications of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#">History of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_History.php" class="completed_c">History of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#">Goals of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Goals.php" class="completed_c">Goals of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#">Algorithms of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Algorithms.php" class="completed_c">Algorithms of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#">AI DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Mcq.php" class="completed_c">AI DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#">Assignment</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Assignment.php" class="completed_c">Assignment<br><span class="small">Completed</span></a>';
                }
               
                if ($progress < 100) {
                    echo '
                    <a href="#">Complete AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Complete.php" class="completed_c">Complete AI<br><span class="small">Completed</span></a>';
                }
                if ($progress < 100) {
                    echo '
                    <a href="#">Over View</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Overview.php" class="completed_c">Over View<br><span class="small">Completed</span></a>';
                }
            }
            ?>

        <br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="main">
        <h1 class="chead">Artificial Intelligence</h1>
        <h2 class="subhead">Types of AI :</h2> <br>
        
        <p class="ccontent">Artificial Intelligence can be divided in various types, there are mainly two types of main categorization which are based on capabilities and based on functionally of AI. Following is flow diagram which explain the types of AI.</p>
        <img src="https://1.bp.blogspot.com/-tM1kt6rg_6I/YNwEcVxqQJI/AAAAAAAADLE/D9fkFZk4mNU--1avCAJ61sGTwaIXpeYAwCLcBGAsYHQ/s704/types-of-Artificial-intelligence.jpg" alt="AI" class="cimg1">
        

        <p class="ccontent1"><b>AI type-1: Based on Capabilities / Abilities</b></p>
    
        <p class="high"> Weak AI or Narrow AI:</p>
        <li class="clist">Narrow AI is a type of AI which is able to perform a dedicated task with intelligence.The most common and currently available AI is Narrow AI in the world of Artificial Intelligence.</li>
        <li class="clist">Narrow AI cannot perform beyond its field or limitations, as it is only trained for one specific task. Hence it is also termed as weak AI. Narrow AI can fail in unpredictable ways if it goes beyond its limits.</li>
        <li class="clist">Apple Siriis a good example of Narrow AI, but it operates with a limited pre-defined range of functions.</li>
        <li class="clist">IBM's Watson supercomputer also comes under Narrow AI, as it uses an Expert system approach combined with Machine learning and natural language processing.</li>
        <li class="clist">Some Examples of Narrow AI are playing chess, purchasing suggestions on e-commerce site, self-driving cars, speech recognition, and image recognition.</li>
        
        <p class="high"> General AI:</p>
        <li class="clist">General AI is a type of intelligence which could perform any intellectual task with efficiency like a human.</li>
        <li class="clist">The idea behind the general AI to make such a system which could be smarter and think like a human by its own.</li>
        <li class="clist">Currently, there is no such system exist which could come under general AI and can perform any task as perfect as a human.</li>
        <li class="clist">The worldwide researchers are now focused on developing machines with General AI.</li>
        <li class="clist">As systems with general AI are still under research, and it will take lots of efforts and time to develop such systems.</li>

        <p class="high">Super AI:</p>
        <li class="clist">Super AI is a level of Intelligence of Systems at which machines could surpass human intelligence, and can perform any task better than human with cognitive properties. It is an outcome of general AI.</li>
        <li class="clist">Some key characteristics of strong AI include capability include the ability to think, to reason,solve the puzzle, make judgments, plan, learn, and communicate by its own.</li>
        <li class="clist">Super AI is still a hypothetical concept of Artificial Intelligence. Development of such systems in real is still world changing task.</li>

        <p class="ccontent1"><b>Artificial Intelligence type-2: Based on functionality</b></p>

        <p class="high">Reactive Machines</p>
        <li class="clist">Purely reactive machines are the most basic types of Artificial Intelligence.</li>
        <li class="clist">Such AI systems do not store memories or past experiences for future actions.</li>
        <li class="clist">These machines only focus on current scenarios and react on it as per possible best action.</li>
        <li class="clist">IBM's Deep Blue system is an example of reactive machines.</li>
        <li class="clist">Google's AlphaGo is also an example of reactive machines.</li>

        <p class="high">Limited Memory</p>
        <li class="clist">Limited memory machines can store past experiences or some data for a short period of time.</li>
        <li class="clist">These machines can use stored data for a limited time period only.</li>
        <li class="clist">Self-driving cars are one of the best examples of Limited Memory systems. These cars can store recent speed of nearby cars, the distance of other cars, speed limit, and other information to navigate the road.</li>

        <p class="high">Theory of Mind</p>
        <li class="clist">Theory of Mind AI should understand the human emotions, people, beliefs, and be able to interact socially like humans.</li>
        <li class="clist">This type of AI machines are still not developed, but researchers are making lots of efforts and improvement for developing such AI machines.</li>


        <p class="high">Self-Awareness</p>
        <li class="clist">Self-awareness AI is the future of Artificial Intelligence. These machines will be super intelligent, and will have their own consciousness, sentiments, and self-awareness.</li>
        <li class="clist">These machines will be smarter than human mind.</li>
        <li class="clist">Self-Awareness AI does not exist in reality still and it is a hypothetical concept.</li>


        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/VNz3KGoAhG4"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
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
                    echo '<a href="AI_Applications.php"><button class="nbutton1" type="button">Next</button></a>';
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



