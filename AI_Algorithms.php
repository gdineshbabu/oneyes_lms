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
        header("Location: AI_Mcq.php");
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
        <title>ONEYES_AI_ALGORITHMS</title>
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
                    <a href="#" class="completed_c">Goals of AI</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Goals.php" class="completed_c">Goals of AI<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#" class="active">Algorithms of AI<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Algorithms.php" class="active">Algorithms of AI<br><span class="small">Completed</span></a>';
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
        <h2 class="subhead">Algorithms of Artificial Intelligence(AI) :</h2> 
        <p class="high">How do AI algorithms work?</p>
        <p class="ccontent">While a general algorithm can be simple, AI algorithms are by nature more complex. AI algorithms work by taking in training data that helps the algorithm to learn. How that data is acquired and is labeled marks the key difference between different types of AI algorithms. </p>
        <p class="ccontent">At the core level, an AI algorithm takes in training data (labeled or unlabeled, supplied by developers, or acquired by the program itself) and uses that information to learn and grow. Then it completes its tasks, using the training data as a basis. Some types of AI algorithms can be taught to learn on their own and take in new data to change and refine their process. Others will need the intervention of a programmer in order to streaAIine.</p>
        
        <p class="high1">Types of artificial intelligence algorithms</p>
        <p class="ccontent">There are three major categories of AI algorithms: supervised learning, unsupervised learning, and reinforcement learning. The key differences between these algorithms are in how they’re trained, and how they function. </p>
        <p class="ccontent">Under those categories, there are dozens of different algorithms. We’ll be talking about the most popular and commonly used from each category, as well as where they are commonly used.</p>


        <img src="https://www.analytixlabs.co.in/blog/wp-content/uploads/2020/02/Ai-Blog-Images-06-768x555.jpg" alt="AI" class="cimg1">
        

        <h1 class="subhead">Supervised learning algorithms</h1>
        <p class="ccontent">The first, and most commonly used category of algorithms is “Supervised learning.” These work by taking in clearly-labeled data while being trained and using that to learn and grow. It uses the labeled data to predict outcomes for other data. The name “supervised learning” comes from the comparison of a student learning in the presence of a teacher or expert.</p>
        <p class="ccontent">Building a supervised learning algorithm that actually works takes a team of dedicated experts to evaluate and review the results, not to mention data scientists to test the models the algorithm creates to ensure their accuracy against the original data, and catch any errors from the AI.</p>

        <p class="high">Definitions: <span class="high1">Classification and Regression</span></p>
        
        <p class="ccontent">Below, we jump into explaining the different types of supervised learning algorithms. All of them can either be used for classification or regression, or both. </p>
        <p class="ccontent"><span class="high1">Classification :</span>means an either/or result using binary (0 = no, 1 = yes). So the algorithm will classify something as either one or another, but never both. There is also multi-class classification, which deals with organizing data into defined categories or types relevant to a specific need.</p>
        <p class="ccontent"><span class="high1">Regression :</span>means the result will end with a real number (either round or a decimal point). You usually have a dependent variable and an independent variable, and the algorithm will use both points to estimate a possible other result (either forecast or generalized estimate). </p>
        

        <p class="subhead">Decision Tree </p>
        <p class="ccontent">One of the most common supervised learning algorithms, decision trees get their name because of their tree-like structure (even though the tree is inverted). The “roots” of the tree are the training datasets and they lead to specific nodes which denote a test attribute. Nodes often lead to other nodes, and a node that doesn’t lead onward is called a “leaf”. </p>
        <p class="ccontent">Decision trees classify all the data into decision nodes. It uses a selection criteria called Attribute Selection Measures (ASM) which takes into account various measures (some examples would be entropy, gain ratio, information gain, etc). Using the root data and following the ASM, the decision tree can classify the data it is given by following the training data into sub-nodes until it reaches the conclusion.</p>


        <p class="subhead">Random Forest</p>
        <p class="ccontent">The random forest algorithm is actually a broad collection of different decision trees, leading to its name. The random forest builds different decision trees and connects them to gain more accurate results. These can be used for both classification and regression.</p>

        <p class="subhead">Support Vector Machines</p>
        <p class="ccontent">The support vector machine (SVM) algorithm is another common AI algorithm that can be used for either classification or regression (but is most often used for classification). SVM works by plotting each piece of data on a chart (in N dimensional space where N = the number of datapoints). Then, the algorithm classifies the datapoints by finding the hyperplace that separates each class. There can be more than one hyperplane.</p>

        <p class="subhead">Naive Bayes </p>
        <p class="ccontent">The reason this algorithm is called “Naive Bayes” is that it’s based on Bayes’ Theorem, and also relies heavily on a large assumption: that the presence of one particular feature is unrelated to the presence of other features in the same class. That major assumption is the “naive” aspect of the name.</p>
        <p class="ccontent">Naive Bayes is useful for large datasets with many different classes. It, like many other supervised learning algorithms, is a classification algorithm.</p>

        <p class="subhead">Linear regression</p>
        <p class="ccontent">Linear regression is a supervised learning AI algorithm used for regression modeling. It’s mostly used for discovering the relationship between data points, predictions, and forecasting. Much like SVM, it works by plotting pieces of data on a chart with the X-axis is the independent variable and the Y-axis is the dependent variable. The data points are then plotted out in a linear fashion to determine their relationship and forecast possible future data.</p>

        <p class="subhead">Logistic regression</p>
        <p class="ccontent">A logistic regression algorithm usually uses a binary value (0/1) to estimate values from a set of independent variables. The output of logistic regression is either 1 or 0, yes or no. An example of this would be a spam filter in email. The filter uses logistic regression to mark whether an incoming email is spam (0) or not (1). </p>
        <p class="ccontent">Logistic regression is only useful when the dependent variable is categorical, either yes or no.</p>
        


        
        <h1 class="subhead">Unsupervised learning algorithms</h1>
        <p class="ccontent">It may at this point be relatively easy to guess what unsupervised learning algorithms mean, in comparison to supervised learning. Unsupervised learning algorithms are given data that isn’t labeled. Unsupervised learning algorithms use that unlabeled data to create models and evaluate the relationships between different data points in order to give more insight to the data.</p>

        <p class="high">Definitions: <span class="high1">Clustering</span></p>
        <p class="ccontent">Many unsupervised learning algorithms perform the function of clustering, which means they sort the unlabeled data points into pre-defined clusters. The goal is to have each data point belong to only one cluster, with no overlap. There can be more than one data point in any given cluster, but a data point cannot belong to more than one cluster. </p>

        <p class="subhead">K-means clustering</p>
        <p class="ccontent">K-means is an algorithm designed to perform the clustering function in unsupervised learning. It does this by taking in the pre-determined clusters and plotting out all the data regardless of the cluster. It then plots a randoAIy-selected piece of data as the centroid for each cluster (think of it as a circle around each cluster, with that piece of data as the exact center point). From there, it sorts the remaining data points into clusters based on their proximity to each other and the centroid data point for each cluster. </p>

        <p class="subhead">Gaussian mixture model</p>
        <p class="ccontent">Gaussian mixture models are similar to K-means clustering in many ways. Both are concerned with sorting data into pre-determined clusters based on proximity. However, Gaussian models are a little more versatile in the shapes of the clusters they allow.</p>
        <p class="ccontent">Picture a graph with all your data points plotted out. K-means clustering only allows data to be clustered in circles with the centroid in the center of each cluster. Gaussian mixture can handle data that lands on the graph in more linear patterns, allowing for oblong-shaped clusters. This allows for greater clarity in clustering if one datapoint lands inside the circle of another cluster.</p>


        <h1 class="subhead">Both supervised and unsupervised algorithms</h1>
        <p class="ccontent">Some AI algorithms can use either supervised or unsupervised data input and still function. They might have slightly different applications based on their status.</p>

        <p class="subhead">K-nearest neighbor algorithm</p>
        <p classs="ccontent">K-nearest neighbor (KNN) algorithm is a simplistic AI algorithm that assumes that all the data points provided are in proximity to each other and plots them out on a map to show the relationship between them. Then the algorithm can calculate the distance between data points in order to extrapolate their relationship, and calculate the distance on a graph.</p>
        <p classs="ccontent">In supervised learning, it can be used for either classification or regression applications. In unsupervised learning, it’s popularly used for anomaly detection; that is, finding data that doesn’t belong and removing it.</p>

        <p class="subhead">Neural Networks </p>
        <p classs="ccontent">Neural network algorithm is a term for a collection of AI algorithms that mimic the functions of a human brain. These tend to be more complex than many of the algorithms discussed above and have applications beyond some of the ones discussed here. In unsupervised and supervised learning, it can be used for classification and pattern recognition. </p>

        <h1 class="subhead">Reinforcement learning algorithms</h1>
        <p class="ccontent">The last major type of AI algorithm is reinforcement learning algorithms, which learn by taking in feedback from the result of its action. This is typically in the form of a “reward.</p>
        <p class="ccontent">A reinforcement algorithm is usually composed of two major parts: an agent that performs an action, and the environment in which the action is performed. The cycle begins when the environment sends a “state” signal to the agent. That queues the agent to perform a specific action within the environment. Once the action is performed, the environment sends a “reward” signal to the agent, informing it on what happened, so the agent can update and evaluate its last action. Then, with that new information, it can take the action again. That cycle repeats until the environment sends a termination signal.</p>
        <p class="ccontent">There are two types of reinforcement the algorithm can use: either a positive reward, or a negative one. </p>

        <p class="high">Definitions: <span class="high1"> Model, Policy, Value</span></p>
        <p classs="ccontent">In reinforcement algorithms, there are slightly different approaches depending on what is being measured and how it’s being measured. Here are some definitions of different models and measures:</p>
        <li class="clist"><span class="high1">Policy:</span>The approach the agent takes to determine the next action taken by the agent.</li>
        <li class="clist"><span class="high1">Model:</span>The situation and dynamics of the environment.</li>
        <li class="clist"><span class="high1">Value: </span>The expected long-term results. This is different from the reward, which is the result of a single action within the environment. The Value is the long-term result of many actions. </li>

        <p class="subhead">Value-based</p>
        <p classs="ccontent">In a value-based reinforcement algorithm the agent pushes toward an expected long-term return, instead of just focusing on the short-term reward. </p>

        <p class="subhead">Policy-based</p>
        <p classs="ccontent">A policy-based reinforcement algorithm usually takes one of two approaches to determining the next course of action. Either a standardized approach where any state produces the same action or a dynamic approach where certain probabilities are mapped out and probabilities calculated. Each probability has its own policy reaction.</p>

        <p class="subhead">Model-based</p>
        <p classs="ccontent">In this algorithm, the programmer creates a different dynamic for each environment. That way, when the agent is put into each different model, it learns to perform consistently under each condition.</p>
        
        <h1 class="subhead">Uses of AI algorithms</h1>
        <p class="ccontent">There are thousands of applications for AI systems and algorithms. We touched on what may seem like simple algorithms in this article, but even those have hundreds of possible applications. The possibilities are endless.</p>
        <p class="ccontent">Some common uses of AI algorithms include:</p>
        <li class="clist">Data entry and classification</li>
        <li class="clist">Advanced or predictive analytics</li>
        <li class="clist">Search engines (Google, Yahoo, Bing, etc.)</li>
        <li class="clist">Digital assistants (Siri, Alexa, etc.)</li>
        <li class="clist">Robotics (assembly machines, self-driving cars, etc.)</li>


        
            <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 1;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 70) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="AI_Mcq.php"><button class="nbutton1" type="button">Next</button></a>';
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



