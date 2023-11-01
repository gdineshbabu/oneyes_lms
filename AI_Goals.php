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
        header("Location: AI_Algorithms.php");
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
        <title>ONEYES_AI_GOALS</title>
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
                    <a href="#" class="completed_c">History of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_History.php" class="completed_c">History of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#" class="active">Goals of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Goals.php" class="active">Goals of AI<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Goals of Artificial Intelligence :</h2>
        
        <p class="ccontent">AI can be achieved by reading the behavior of humans and using the results to develop intelligent systems. For example, they learn, make decisions and act in certain situations. Observing humans while problem-solving in simple tasks and using its results to develop intelligent systems.</p>
        <p class="ccontent">The overall research goal of artificial intelligence is to create technology that allows computers and machines to work intelligently. The general problem of simulating (or creating) intelligence is broken down into sub-problems.</p>
        <p class="ccontent">The symptoms described below receive the most attention. These include special traits or abilities that researchers expect an intelligent system to exhibit. Eric Sandwell emphasizes planning and learning that is relevant and applicable to the given situation.</p>

        <img src="https://www.researchgate.net/publication/365341064/figure/fig2/AS:1431281096766029@1668264388237/Goals-of-AI-Fig-3-The-Origins-of-Artificial-Intelligence.ppm" alt="AI" class="cimg1">
        

         <li class="clist"><span class="high1">Logic, problem-solving: </span> Early researchers developed algorithms that simulate humans' step-by-step reasoning when solving puzzles or making logical deductions. By the late 1980s and 1990s, AI research had developed methods for dealing with uncertain or incomplete information, employing concepts from probability and economics. For difficult problems, algorithms can require enormous computational resources-most experience a "combinatorial explosion": the amount of memory or computer time needed for problems of a certain size becomes astronomical. The search for more efficient problem-solving algorithms is a high priority.</li>
         <li class="clist"><span class="high1"> Knowledge representation: </span>Knowledge representation and knowledge engineering are central to AI research. Many of the problems that machines are expected to solve will require extensive world knowledge. The things AI needs to represent are objects, properties, categories, and relationships between objects; situations, events, states, and times; Cause and Effect; Knowledge about knowledge (what other people know about what we know); and many other, less well-researched domains.
         <li class="clist"><span class="high1"> Planning:</span>Intelligent agents must be able to set goals and achieve them. They need a way to envision the future - a representation of the state of the world and make predictions about how their actions will change it - and be able to make choices that maximize the utility (or "value") of the options available.</li>
         <li class="clist"><span class="high1"> Learning:</span> Machine learning, a fundamental concept of AI research since the field's inception, is the study of computer algorithms that automatically improve through experience. Unsupervised learning is the ability to find patterns in a stream of input. Supervised learning includes both classification and numerical regression. After seeing several examples of things from several categories, classification is used to determine which category something falls into. Regression attempts to construct a function that describes the relationship between inputs and outputs and predicts how the outputs should change as the inputs change. </li>
         <li class="clist"><span class="high1"> Social Intelligence: </span>  Effective computing is the study and development of systems that can detect, interpret, process, and simulate human It is an interdisciplinary field spanning computer science, psychology, and cognitive science. While the origins of the field can be traced to early philosophical inquiries into emotion, the more modern branch of computer science originated from Rosalind Picard's 1995 paper on "effective computing".</li>

        <p class="high">Methods of Artificial Intelligence</p>
        <p class="ccontent"></p>
        <li class="clist"><span class="high1">Symbolic Method:</span>Also known as the "top-down" approach, the symbolic method simulates intelligence without considering the biological structure of the human brain. As the name suggests, this method analyzes the thought process of the human brain by processing symbols.</li>
        <li class="clist"><span class="high1">Connectionist Method: </span>On the other hand, the connectionist approach deals with building neural networks by imitating the biological structure of the human brain. Also known as the "bottom-up" approach, this method mobilizes more fundamental brain cells.</li>
        <p class="ccontent">Both these methods compete for the approach to developing AI systems and algorithms. Although they may appear similar, they differ in their principle. Whereas the <b>"top-down"</b> approach focuses on symbolic details, the <b>"bottom-up"</b> approach considers neural activities inside the brain. We can highlight the difference between these two approaches with an example. Consider a robot that recognizes numbers through image processing.</p>
        <p class="ccontent">The symbolic approach would be to write an algorithm based on the geometric pattern of each number. The program will compare and match numeric patterns of different numbers stored in its memory.</p>
        <p class="ccontent">The robot would train its artificial neural network by repeatedly tuning it to recognize numbers in the connectionist approach. In a way, The Connectionist approach more closely emulates the human mind and its thought process than the symbolic approach.</p>
        <li class="clist"><span class="high1">Logic-based AI:</span>uses formal logic to represent knowledge, planning, and learning in the human mind. Rather than imitating human thought, this approach focuses on determining the basis for logical reasoning and abstract thinking.</li>
        <li class="clist"><span class="high1">Anti-logic AI:</span>Some researchers argue that it is impossible to capture every aspect of human behavior using simple general logic. Rather than using simple logic, the anti-logic approach deals with ad hoc solutions for machine learning and vision processing.</li>
        <li class="clist"><span class="high1">Knowledge-Based AI:</span>With important memories computers becoming available around the 1970s, people began to add AI applications. As a result, systems architecture incorporated facts and rules to depict algorithms in their systems.</li>
        <li class="clist"><span class="high1">Statistical learning:</span>In recent years, researchers worldwide have combined advanced mathematical and statistical models such as information theory, decision theory, etc., to develop AI algorithms. This approach has resulted in greater accuracy and reproducibility in data mining.</li>
        
        <p class="ccontent1"><b>Video Reference :  </b></p>
        <iframe class="cvideo" src="https://www.youtube.com/embed/YVGCrmtz7uo"></iframe>
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 60) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Algorithms.php"><button class="nbutton1" type="button">Next</button></a>';
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



