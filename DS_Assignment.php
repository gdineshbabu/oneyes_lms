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
        header("Location: DS_Complete.php");
        exit();
    } else {
        // Handle the error
        echo "Error updating progress: " . mysqli_error($conn);
    }
}


if (isset($_POST['inputValue'])) {
    $inputValue = $_POST['inputValue'];
    
    $user_id = $_SESSION['user_id'];
    $course_id = 1; // Change this to the appropriate course ID

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
        <title>ONEYES_DS_ASSIGNMENT</title>
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
                    <a href="#" class="completed_c">Basics of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Basics.php" class="completed_c">Basics of DS<br><span class="small">Completed</span></a>';
                }
                if ($progress < 30) {
                    echo '
                    <a href="#" class="completed_c">Types of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Types.php" class="completed_c">Types of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 40) {
                    echo '
                    <a href="#" class="completed_c">Applications of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Applications.php" class="completed_c">Applications of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 50) {
                    echo '
                    <a href="#" class="completed_c">History of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_History.php" class="completed_c">History of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 60) {
                    echo '
                    <a href="#" class="completed_c">Goals of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Goals.php" class="completed_c">Goals of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 70) {
                    echo '
                    <a href="#" class="completed_c">Algorithms of DS</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Algorithms.php" class="completed_c">Algorithms of DS<br><span class="small">Completed</span></a>';
                }

                if ($progress < 80) {
                    echo '
                    <a href="#" class="completed_c">DS DisAdvantages</a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Mcq.php" class="completed_c">DS DisAdvantages<br><span class="small">Completed</span></a>';
                }
                if ($progress < 90) {
                    echo '
                    <a href="#" class="active">Assignment<br><span class="small">Current</span></a>
                    ';
                } else {
                    // Display the "Next" button
                    echo '<a href="DS_Assignment.php" class="active">Assignment<br><span class="small">Completed</span></a>';
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
        <h1 class="chead">Data Science</h1>

        
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
            $course_id = 5;
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
                    echo '<a href="DS_Complete.php"><button class="nbutton1" type="button">Next</button></a>';
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        const quizDatabase = [
    {
        question: "Q1.  Point out the correct statement?",
        a : "Preprocessed data is original source of data",
        b : " Raw data is the data obtained after processing steps",
        c : "Raw data is original source of data",
        d : "None of the mentioned",
        ans : "ans3"
    },
    {
        question : "Q2. Which of the following is performed by Data Scientist?",
        a : "Define the question",
        b : "All of the mentioned",
        c : "Create reproducible code",
        d : "Challenge results",
        ans : "ans2"
    },
    {
        question : "Q3. Which of the following is the most important language for Data Science?",
        a : "Java",
        b : " Ruby",
        c : "R",
        d : " None of the mentioned",
        ans : "ans3"
    },
    {
        question : "Q4. Point out the wrong statement ?",
        a : " Merging concerns combining datasets on the same observations to produce a result with more variables",
        b : "Data visualization is the organization of information according to preset specifications",
        c : "Subsetting can be used to select and exclude variables and observations",
        d : "All of the mentioned",
        ans : "ans2"
    },
    {
        question : "Q5.  Which of the following approach should be used to ask Data Analysis question?",
        a : " Find out the question which is to be answered",
        b : "Find only one solution for particular problem",
        c : "Find out answer from dataset without asking question",
        d : "None of the mentioned",
        ans : "ans1"
    },
    {
        question: "Q6. Which of the following is one of the key data science skills?",
        a : "Statistics",
        b : "Machine Learning",
        c : "All of the mentioned",
        d : "Data Visualization",
        ans : "ans3" 
    },
    {
        question : "Q7. Which of the following is a key characteristic of a hacker?",
        a : "Willing to find answers on their own",
        b : "Afraid to say they don’t know the answer",
        c : "Not Willing to find answers on their own",
        d : "All of the mentioned",
        ans : "ans1"
    },
    {
        question : "Q8. Which of the following is characteristic of Processed Data?",
        a : "Data is not ready for analysis",
        b : "Hard to use for data analysis",
        c : "All steps should be noted",
        d : " None of the mentioned",
        ans : "ans3"
    },
    {
        question : "Q9. Point out the correct statement ?",
        a : "Least square is an estimation tool",
        b : " Least square problems falls in to three categories",
        c : " Compound least square is one of the category of least square",
        d : "None of these",
        ans : "ans1"
    },
    {
        question : "Q.10 How many principles of analytical graphs exist?",
        a : "3",
        b : "4",
        c : "6",
        d : " None of the mentioned",
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



