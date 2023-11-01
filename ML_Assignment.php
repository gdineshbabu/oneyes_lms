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
        header("Location: ML_Complete.php");
        exit();
    } else {
        // Handle the error
        echo "Error updating progress: " . mysqli_error($conn);
    }
}


if (isset($_POST['inputValue'])) {
    $inputValue = $_POST['inputValue'];
    
    $user_id = $_SESSION['user_id'];
    $course_id = 10; // Change this to the appropriate course ID

    $query = "UPDATE user_course SET marks = $inputValue * 10 WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Handle the score update
        // You can add a message or redirection here
    } else {
        // Handle the error
        echo "Error updating score: " . mysqli_error($conn);
    }
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_ML_ASSIGNMENT</title>
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
                    <a href="#" class="completed_c">Types of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Types.php" class="completed_c">Types of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#" class="completed_c">Applications of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Applications.php" class="completed_c">Applications of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#" class="completed_c">History of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_History.php" class="completed_c">History of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#" class="completed_c">Goals of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Goals.php" class="completed_c">Goals of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#" class="completed_c">Algorithms of ML</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Algorithms.php" class="completed_c">Algorithms of ML<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#" class="completed_c">ML DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Mcq.php" class="completed_c">ML DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#" class="active">Assignment<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Assignment.php" class="active">Assignment<br><span class="small">Completed</span></a>';
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

        
        <script src="https://unpkg.com/soloalert" type="text/javascript"></script>
        <div class="parent">
    
        <div class="first-child">
            <h2 class="question">Questions</h2>
        </br>
            <ul>
                <li>
                    <span>A :</span>
                    <input type="radio" name="answer" id="ans1" class="answer">
                    <label for="ans1" id="option1">Option</label>
                </li>
                <li>
                <span>B :</span>
                    <input type="radio" name="answer" id="ans2" class="answer">
                    <label for="ans2" id="option2">Option</label>
                </li>
                <li>
                <span>C :</span>
                    <input type="radio" name="answer" id="ans3" class="answer">
                    <label for="ans3" id="option3">Option</label>
                </li>
                <li>
                <span>D :</span>
                    <input type="radio" name="answer" id="ans4z" class="answer">
                    <label for="ans4" id="option4">Option</label>
                </li>
            </ul>
        </br>
            <button id="submit">submit</button>
        </br>
            <div id="showScore" class="scoreArea">Choose any option ans then click submit</div>
        </div>
    </div>




        <div class="nbutton">
            <?php
            $user_id = $user_id;
            $course_id = 10;
            $selected = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = '$user_id' AND course_id = '$course_id'") or die('query failed');
            if(mysqli_num_rows($selected) > 0){
                $fetched = mysqli_fetch_assoc($selected);
                $progress = $fetched['progress'];
                if ($progress < 90) {
                    echo '<form method="post">
                        <button class="nbutton1" type="submit" name="increase_progress">Complete & Next</button>
                    </form>';
                } else {
                    // Display the "Next" button
                    echo '<a href="ML_Complete.php"><button class="nbutton1" type="button">Next</button></a>';
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        const quizDatabase = [
    {
        question: "Q1.  What is true about Machine Learning?",
        a : " Machine Learning (ML) is that field of computer science",
        b : " ML is a type of artificial intelligence that extract patterns out of raw data by using an algorithm or method.",
        c : "All of the above",
        d : "The main focus of ML is to allow computer systems learn from experience without being explicitly programmed or human intervention.",
        ans : "ans3"
    },
    {
        question : "Q2. ML is a field of AI consisting of learning algorithms that?",
        a : " Improve their performance",
        b : "All of the above",
        c : "At executing some task",
        d : "Over time with experience",
        ans : "ans2"
    },
    {
        question : "Q3. p → 0q is not a?",
        a : " hack clause",
        b : "structural clause",
        c : "horn clause",
        d : "system clause",
        ans : "ans3"
    },
    {
        question : "Q4. The action _______ of a robot arm specify to Place block A on block B. ?",
        a : "LIST(A,B)",
        b : "STACK(A,B)",
        c : "QUEUE(A,B)",
        d : "ARRAY(A,B)",
        ans : "ans2"
    },
    {
        question : "Q5.  A model of language consists of the categories which does not include ________.",
        a : "structural units.",
        b : "System Unit",
        c : "data units",
        d : "empirical units",
        ans : "ans1"
    },
    {
        question: "Q6. Different learning methods does not include?",
        a : " Analogy",
        b : "Deduction",
        c : "Introduction",
        d : "Memorization",
        ans : "ans3" 
    },
    {
        question : "Q7. The model will be trained with data in one single batch is known as ?",
        a : "Batch learning",
        b : "Offline learning",
        c : "Both A and B",
        d : " None of the above",
        ans : "ans3"
    },
    {
        question : "Q8.  In Model based learning methods, an iterative process takes place on the ML models that are built based on various model parameters, called ?",
        a : "mini-batches",
        b : " optimizedparameters",
        c : "hyperparameters",
        d : "superparameters",
        ans : "ans3"
    },
    {
        question : "Q9. Which of the following are ML methods?",
        a : "Which of the following are ML methods?",
        b : "supervised Learning",
        c : "semi-reinforcement Learning",
        d : "All of the above",
        ans : "ans1"
    },
    {
        question : "Q10. Which of the following is a widely used and effective machine learning algorithm based on the idea of bagging?",
        a : "Decision Tree",
        b : "Regression",
        c : "Random Forest",
        d : " Classification",
        ans : "ans3"
    }
    
]


let question = document.querySelector(".question");
let option1 = document.querySelector("#option1");
let option2 = document.querySelector("#option2");
let option3 = document.querySelector("#option3");
let option4 = document.querySelector("#option4");
let submit = document.querySelector("#submit");
let answers = document.querySelectorAll(".answer")
var score = 0;
let showScore = document.querySelector("#showScore")

let questionCount = 0;

const loadQuestion = () => {
    const questionList = quizDatabase[questionCount];
    question.textContent = questionList.question;

    option1.textContent = questionList.a;
    option2.textContent = questionList.b;
    option3.textContent = questionList.c;
    option4.textContent = questionList.d;
}

loadQuestion();

const getCheckAnswer = () => {
    var answer;
    answers.forEach((curAnsElem) => {
        if (curAnsElem.checked){
            answer = curAnsElem.id;
        }
    });
    
    return answer;
};

const desall = () => {
    answers.forEach((curAnsElem) => curAnsElem.checked = false)
}

submit.addEventListener("click", () => {
    const checkedAnswer = getCheckAnswer();
    // console.log(checkedAnswer);

    if (checkedAnswer == quizDatabase[questionCount].ans){
        score++;
        showScore.innerHTML = "Your answer was correct👌"
        // console.log(showScore)
    }else {
        showScore.innerHTML = "Your answer was incorrect! 🤦‍♂️"
        // console.log(showScore)
    }
    
    questionCount++;

    desall();

    if (questionCount < quizDatabase.length){
        loadQuestion();
    }
    else
    {
        showScore.innerHTML = `
        <h3>You scored ${score}/${quizDatabase.length} 👍</h3>
                
        </br>
        <button class="btn" onclick="location.reload()">Try Again?</button>
        </br>
        <form method="post">
                <input type="hidden" name="inputValue" value="${score}">
                <button class="btn" type="submit">Submit Score</button>
            </form>
        `;

        
       
    }
})
    </script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    .yt{
    margin-bottom:20px;
    padding:5px 20px 5px 20px;
    text-align:center;
    color:black;
    background-color:white;
    box-shadow: 0 0 20px black;
    border: none;
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
    margin-left: 20%;
}
.yt a{
    text-decoration:none;
    color:black;
}
.parent{

    display: grid;
    margin-left: 30%;
    margin-bottom: 3%;
}
.first-child{
    width: 50%;
    background-color: white;
    padding: 1rem;
    border: none;
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
    box-shadow: 0 0 20px rgb(0, 0, 0);
}
.question{
    font-size: 20px;
}
li{
    margin-top: 0.5rem;
    font-size: 17px;
    margin-left: 0.5rem;
}
input{
    cursor: pointer;
    /* font-size: 15px; */
}
#submit, .btn{
    padding:10px 35px 10px 35px;
    outline: none;
    border: none;
    color: white;
    cursor: pointer;
    background: rgb(57, 54, 54);
    box-shadow: 0 0 20px rgb(103, 100, 100);
    font-size: 1rem;
    display: block;
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
    margin: auto;
}

.btn{
    background: white;
    color: black;
    box-shadow: 0 0 20px black;
    border: none;
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-radius: 5px;
}



#showScore{
    background-color: rgb(57, 54, 54);
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
    color: white;
    margin-bottom: -1px;
    padding: 10px;
    /* box-shadow:0 0 20px rgb(108, 106, 106); */
}
/* .scoreArea{
    display: none;
} */
#submit:active{
   padding: 3px;
}
@media screen and (max-width:375px) {
    .first-child{
        transform: scale(0.7);
    }
}
@media screen and (max-width:316px) {
    .first-child{
        transform: scale(0.6);
    }
}
@media screen and (max-width:762px) {
    .parent{
        margin-left: 3%;
    }
    .first-child{
        width:100%;
    }
}
@media screen and (max-width:562px) {
    .parent{
        margin-left: 0%;
    }
    .first-child{
        width:100%;
    }
}
</style>



