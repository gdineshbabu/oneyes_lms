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
        header("Location: AI_History.php");
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
        <title>ONEYES_AI_APPLIACTIONS</title>
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
                    <a href="#" class="completed_c">Types of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Types.php" class="completed_c">Types of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#" class="active">Applications of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Applications.php" class="active">Applications of AI<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Applications of Artificial Intelligence(AI) :</h2> <br>
        
        <p class="ccontent">The major applications of AI are in E-Commerce, Education, Robotics, Healthcare, social media, etc. So, here we have listed the top 20 AI Applications with examples.</p>
        <img src="https://th.bing.com/th/id/OIP.DlYnAn2l-0-sqaCEvK1aNAHaD4?pid=ImgDet&rs=1" alt="AI" class="cimg1">
        

        <p class="ccontent1"><b>Major Applications of AI</b></p>
    
        <p class="high"> Artificial Intelligence in E-Commerce</p>
        <p class="ccontent">Artificial Intelligence is widely used in the field of E-commerce as it helps the organization to establish a good engagement between the user and the company. Artificial Intelligence helps to make appropriate suggestions and recommendations as per the user search history and view preferences. There are also AI chatbots that are used to provide customer support instantly and help to reduce complaints and queries to a great extent. Let’s take a closer look at AI applications in E-commerce.</p>
         <li class="clist"><span class="high1"> Personalization: </span> Using this feature, customers would be able to see those products based on their interest pattern and that eventually will drive more conversions.</li>
         <li class="clist"><span class="high1"> Enhanced Support: </span>  It’s very important to attend to every customer’s query to reduce the churn ratio and to empower that AI-powered chatbots are well capable of handling most of the queries that too 24×7 </li>
         <li class="clist"><span class="high1"> Dynamic Pricing Structure: </span>  It’s a smart way of fluctuating the price of any given product by analyzing data from different sources and based on which price prediction is being done.</li>
         <li class="clist"><span class="high1"> Fake Review Detection:</span> A report suggested that 9 out of 10 people tend to go through customer reviews first before they actually place any order. </li>
         <li class="clist"><span class="high1"> Voice Search: </span> With the introduction of this feature, many applications and websites are using voice-over searches in their system. Today, 6 out of 10 prefer to use this feature for online shopping. In addition to this, alone in the USA, the market growth has risen up to 400% in just 2 years, i.e. from 4.6 USD Billion to 20 USD Billion.</li>

        <p class="high">AI in Education Purpose</p>

        <p class="ccontent">Educational sectors are totally organized and managed by human involvement till some years back. But these days, the educational sector is also coming under the influence of Artificial Intelligence. It helps the faculty as well as the students by making course recommendations, Analysing some data and some decisions about the student, etc. Making automated messages to the students, and parents regarding any vacation, and test results are done by Artificial Intelligence these days. Let’s take a closer look at AI applications in Education.</p>

        <li class="clist"><span class="high1">Voice Assistant:  </span> With the help of AI algorithms, this feature can be used in multiple and broad ways to save time. provide convenience, and can assist users as and when required.</li>
        <li class="clist"><span class="high1">Gamification:  </span> This feature has enabled e-learning companies to design attractive game modes into their system so that kids can learn in a super fun way. This will not only make kids engage while learning but will also ensure that they are catching the concepts and all thanks to AI for that.</li>
        <li class="clist"><span class="high1">Smart Content Creation:  </span> AI uses algorithms to detect, predict and design content & provide valuable insights based on the user’s interest which can include videos, audio, infographics, etc. Following this, with the introduction of AR/VR technologies, e-learning companies are likely to start creating games (for learning), and video content for the best experience. </li>

        <p class="high">Artificial Intelligence in Robotics</p>
        <p class="ccontent">Artificial Intelligence is one of the major technologies that provide the robotics field with a boost to increase their efficiency. AI provides robots to make decisions in real time and increase productivity. For example, suppose there is a warehouse in which robots are used to manage good packages. The robots are only designed to deliver the task but Artificial Intelligence makes them able to analyze the vacant space and make the best decision in real-time. Let’s take a closer look at AI applications in Robotics.</p>
        <li class="clist"><span class="high1"> NLP: </span> Natural Language Processing plays a vital role in robotics to interpret the command as a human being instructs. This enables AI algorithms & techniques such as sentimental analysis, syntactic parsing, etc.</li>
        <li class="clist"><span class="high1"> Object Recognition & Manipulation: </span> This functionality enables robots to detect objects within the perimeter and this technique also helps robots to understand the size & shape of that particular object. Besides this, this technique has two units, one is to identify the object & the other one refers to the physical interaction with the object.</li>
        <li class="clist"><span class="high1"> HRI:</span> With the help of AI algorithms, HRI or Human-Robotics Interaction is being developed that helps in understanding human patterns such as gestures, expressions, etc. This technique helps maximize the performance of robots and ensures that it reaches and maintains its accuracy.</li>


        <p class="high">GPS and Navigations</p>
        <p class="ccontent">GPS technology uses Artificial Intelligence to make the best route and provide the best available route to the users for traveling. This is also suggested by research provided by the MIT Institute that AI is able to provide accurate, timely, and real-time information about any specific location. It helps the user to choose their type of lane and roads which increases the safety features of a user. GPS and navigation use the convolutional and graph neural network of Artificial Intelligence to provide these suggestions. Let’s take a closer look at AI applications in GPS & Navigation.</p>
        <li class="clist"><span class="high1"> Voice Assistance: </span> This feature allows users to interact with the AI using a hands-free feature & which allows them to drive seaAIessly while communicating through the navigation system.</li>
        <li class="clist"><span class="high1"> Personalization (Intelligent Routing): </span> The personalized system gets active based on the user’s pattern & behavior of preferred routes. Irrespective of the time & duration, the GPS will always provide suggestions based on multiple patterns & analyses.  </li>
        <li class="clist"><span class="high1"> Traffic Prediction: </span> AI uses a Linear Regression algorithm that helps in preparing and analyzing the traffic data. This clearly helps an individual in saving time and alternate routes are provided based on congestion ahead of the user.</li>
        <li class="clist"><span class="high1"> Positioning & Planning:</span> GPS & Navigation requires enhance support of AI for better positioning & planning to avoid unwanted traffic zones. To help with this, AI-based techniques are being used such as Kalman, Sensor fusion, etc. Besides this, AI also uses prediction methods to analyze the fastest & efficient route to surface the real-time data. </li>

        <p class="high">Healthcare</p>
        <p class="ccontent">Artificial Intelligence is widely used in the field of healthcare and medicine. The various algorithms of Artificial Intelligence are used to build precise machines that are able to detect minor diseases inside the human body. Also, Artificial Intelligence uses the medical history and current situation of a particular human being to predict future diseases. Artificial Intelligence is also used to find the current vacant beds in the hospitals of a city that saves the time of patients who are in emergency conditions. Let’s take a closer look at AI applications in Healthcare.</p>
        <li class="clist"><span class="high1"> Insights & Analysis: </span> With the help of AI, a collection of large datasets, that includes clinical data, research studies, and public health data, to identify trends and patterns. This inversely provides aid in surveillance and public health planning.</li>
        <li class="clist"><span class="high1"> Telehealth: </span> This feature enables doctors and healthcare experts to take close monitoring while analyzing data to prevent any uncertain health issues. Patients who are at high1 risk and require intensive care are likely to get benefitted from this AI-powered feature.</li>
        <li class="clist"><span class="high1"> Patient Monitoring:</span>  In case of any abnormal activity and alarming alerts during the care of patients, an AI system is being used for early intervention. Besides this, RPM, or Remote Patient Monitoring has been significantly growing & is expected to go up by USD 6 Billion by 2025, to treat and monitor patients. </li>
        <li class="clist"><span class="high1"> Surgical Assistance: </span>  To ensure a streaAIined procedure guided by the AI algorithms, it helps surgeons to take effective decisions based on the provided insights to make sure that no further risks are involved in this while processing.</li>

        
        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/dxpBcqSWbuk"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
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
                    echo '<a href="AI_History.php"><button class="nbutton1" type="button">Next</button></a>';
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



