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
        header("Location: AI_Types.php");
        exit();
    } else {
        // Handle the error
        echo "Error updating progress: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE htAI>
<htAI lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_AI_BASICS</title>
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
                    <a href="#" class="active">Basics of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Basics.php" class="active">Basics of AI<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#">Types of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Types.php" class="completed_c">Types of AI<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Basics to AI :</h2> <br>
        <p class="ccontent1"><b>Uses of Artificial Intelligence :</b></p>
        <p class="ccontent"><span class="high">Healthcare: </span> is used for medical diagnosis, drug discovery, and predictive analysis of diseases.</p>
        <p class="ccontent"><span class="high">Finance:</span> AI helps in credit scoring, fraud detection, and financial forecasting.</p>
        <p class="ccontent"><span class="high">Retail :</span> AI is used for product recommendations, price optimization, and supply chain management.</p>
        <p class="ccontent"><span class="high">Manufacturing :</span>  AI helps in quality control, predictive maintenance, and production optimization.</p>
        <p class="ccontent"><span class="high">Transportation :</span> AI is used for autonomous vehicles, traffic prediction, and route optimization.</p>
        <p class="ccontent"><span class="high">Customer Services :</span> AI-powered chatbots are used for customer support, answering frequently asked questions, and handling simple requests.</p>
        <p class="ccontent"><span class="high">Security :</span> AI is used for facial recognition, intrusion detection, and cybersecurity threat analysis.</p>
        <p class="ccontent"><span class="high">Marketting :</span> AI is used for targeted advertising, customer segmentation, and sentiment analysis.</p>
        <p class="ccontent"><span class="high">Education :</span> AI is used for personalized learning, adaptive testing, and intelligent tutoring systems.</p>

        <img src="https://techhelp.ca/wp-content/uploads/2018/02/AI-basics-m.jpg" alt="AI" class="cimg1">
        <p class="ccontent">This is not an exhaustive list, and AI has many more potential applications in various domains and industries.</p>

        <p class="ccontent1"><b>Need For Artificial Intelligence :</b></p>
        <li class="clist">To create expert systems that exhibit intelligent behavior with the capability to learn, demonstrate, explain, and advise its users.</li>
        <li class="clist">Helping machines find solutions to complex problems like humans do and applying them as algorithms in a computer-friendly manner.</li>
        <li class="clist"><span class="high">Improved Efficiency :</span> Artificial intelligence can automate tasks and processes that are time-consuming and require a lot of human effort. 
            This can help improve efficiency and productivity, allowing humans to focus on more creative and high-level tasks.</li>
        <li class="clist"><span class="high">Better Decision Making :</span>Artificial intelligence can analyze large amounts of data and provide insights that can aid in decision-making. This can be especially useful in domains like finance, healthcare, and logistics, where decisions can have significant impacts on outcomes.</li>
        <li class="clist"><span class="high">Enhance Accuracy:</span>Artificial intelligence algorithms can process data quickly and accurately, reducing the risk of errors that can occur in manual processes. This can improve the reliability and quality of results.</li>
        <li class="clist"><span class="high">Personalization :</span>Artificial intelligence can be used to personalize experiences for users, tailoring recommendations, and interactions based on individual preferences and behaviors. This can improve customer satisfaction and loyalty.</li>
        <li class="clist"><span class="high">Exploration of new frontiers :</span>Artificial intelligence can be used to explore new frontiers and discover new knowledge that is difficult or impossible for humans to access. This can lead to new breakthroughs in fields like astronomy, genetics, and drug discovery.</li>


        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/oV74Najm6Nc"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
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
                    echo '<a href="AI_Types.php"><button class="nbutton1" type="button">Next</button></a>';
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

</htAI>



