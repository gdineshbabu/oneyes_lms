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
        header("Location: AI_Goals.php");
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
        <title>ONEYES_AI_HISTORY</title>
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
                    <a href="#" class="completed_c">Applications of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Applications.php" class="completed_c">Applications of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#" class="active">History of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_History.php" class="active">History of AI<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">History of Artificial Intelligence :</h2> 
        
        <p class="ccontent">Artificial Intelligence is not a new word and not a new technology for researchers. This technology is much older than you would imagine. Even there are the myths of Mechanical men in Ancient Greek and Egyptian Myths. Following are some milestones in the history of AI which defines the journey from the AI generation to till date development.</p>
        <img src="https://sohailzahid.files.wordpress.com/2019/02/artificial-intelligence-ai-timeline-infographic.jpeg" alt="AI" class="cimg1">
        

        <p class="ccontent1"><b>Maturation of Artificial Intelligence (1943-1952)</b></p>
    
        
         <li class="clist"><span class="high1"> Year 1943: </span> The first work which is now recognized as AI was done by Warren McCulloch and Walter pits in 1943. They proposed a model of artificial neurons.</li>
         <li class="clist"><span class="high1"> Year 1949: </span>  It’s very important to attend to every customer’s query to reduce the churn ratio and to empower that AI-powered chatbots are well capable of handling most of the queries that too 24×7 </li>
         <li class="clist"><span class="high1"> Year 1950: </span>  It’s a smart way of fluctuating the price of any given product by analyzing data from different sources and based on which price prediction is being done.</li>
         
        <p class="ccontent1">The birth of Artificial Intelligence (1952-1956)</p>

        
        <li class="clist"><span class="high1">Year 1955: </span> An Allen Newell and Herbert A. Simon created the "first artificial intelligence program"Which was named as "Logic Theorist". This program had proved 38 of 52 Mathematics theorems, and find new and more elegant proofs for some theorems.</li>
        <li class="clist"><span class="high1">Year 1956:  </span> The word "Artificial Intelligence" first adopted by American Computer scientist John McCarthy at the Dartmouth Conference. For the first time, AI coined as an academic field.</li>
       
        <p class="ccontent">At that time high-level computer languages such as FORTRAN, LISP, or COBOL were invented. And the enthusiasm for AI was very high at that time.</p>


        <p class="ccontent1">The golden years-Early enthusiasm (1956-1974)</p>
        <li class="clist"><span class="high1"> Year 1966: </span> The researchers emphasized developing algorithms which can solve mathematical problems. Joseph Weizenbaum created the first chatbot in 1966, which was named as ELIZA.</li>
        <li class="clist"><span class="high1"> Year 1972: </span> The first intelligent humanoid robot was built in Japan which was named as WABOT-1.</li>

        <p class="ccontent1">The first AI winter (1974-1980)</p>
        <li class="clist"> The researchers emphasized developing algorithms which can solve mathematical problems. Joseph Weizenbaum created the first chatbot in 1966, which was named as ELIZA.</li>
        <li class="clist">The first intelligent humanoid robot was built in Japan which was named as WABOT-1.</li>

        <p class="ccontent1">A boom of AI (1980-1987)</p>
        <li class="clist"><span class="high1"> Year 1980: </span> After AI winter duration, AI came back with "Expert System". Expert systems were programmed that emulate the decision-making ability of a human expert.</li>
        <li class="clist">In the Year 1980, the first national conference of the American Association of Artificial Intelligence was held at Stanford University.</li>

        <p class="ccontent1">The second AI winter (1987-1993)</p>
        <li class="clist"> The duration between the years 1987 to 1993 was the second AI Winter duration.</li>
        <li class="clist">Again Investors and government stopped in funding for AI research as due to high cost but not efficient result. The expert system such as XCON was very cost effective.</li>

        <p class="ccontent1">The emergence of intelligent agents (1993-2011)</p>
        <li class="clist"><span class="high1">Year 1997:</span> In the year 1997, IBM Deep Blue beats world chess champion, Gary Kasparov, and became the first computer to beat a world chess champion.</li>
        <li class="clist"><span class="high1">Year 2002:</span>for the first time, AI entered the home in the form of Roomba, a vacuum cleaner.</li>
        <li class="clist"><span class="high1">Year 2006:</span>AI came in the Business world till the year 2006. Companies like Facebook, Twitter, and Netflix also started using AI.</li>
  
        <p class="ccontent1"><b>Deep learning, big data and artificial general intelligence (2011-present) </b></p>
        <li class="clist"><span class="high1">Year 2011:</span>In the year 2011, IBM's Watson won jeopardy, a quiz show, where it had to solve the complex questions as well as riddles. Watson had proved that it could understand natural language and can solve tricky questions quickly.</li>
        <li class="clist"><span class="high1">Year 2012:</span>Google has launched an Android app feature "Google now", which was able to provide information to the user as a prediction.</li>
        <li class="clist"><span class="high1">Year 2014:</span> In the year 2014, Chatbot "Eugene Goostman" won a competition in the infamous "Turing test."</li>
        <li class="clist"><span class="high1">Year 2018: </span>The "Project Debater" from IBM debated on complex topics with two master debaters and also performed extremely well.</li>
        <li class="clist">Google has demonstrated an AI program "Duplex" which was a virtual assistant and which had taken hairdresser appointment on call, and lady on other side didn't notice that she was talking with the machine.</li>

        <p class="ccontent">Now AI has developed to a remarkable level. The concept of Deep learning, big data, and data science are now trending like a boom. Nowadays companies like Google, Facebook, IBM, and Amazon are working with AI and creating amazing devices. The future of Artificial Intelligence is inspiring and will come with high intelligence.</p>

        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/056v4OxKwlI"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
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
                    echo '<a href="AI_Goals.php"><button class="nbutton1" type="button">Next</button></a>';
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



