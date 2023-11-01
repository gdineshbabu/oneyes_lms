
<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$message = [];

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $user_id = $row['id'];

        // Assuming you have a field for selecting courses in your HTML form
        $course = mysqli_real_escape_string($conn, $_POST['course']);

        if (!empty($course)) {
            // Check if the association already exists
            $checkAssociation = mysqli_query($conn, "SELECT * FROM `user_course` WHERE user_id = $user_id AND course_id = (SELECT course_id FROM `courses` WHERE course_name = '$course')");

            if (mysqli_num_rows($checkAssociation) == 0) {
                // Insert the new course association
                $insertCourse = mysqli_query($conn, "INSERT INTO `user_course` (user_id, course_id) VALUES ($user_id, (SELECT course_id FROM `courses` WHERE course_name = '$course'))") or die('query failed');
                if (!$insertCourse) {
                    die('Failed to associate courses with the user');
                }
            }

            header('location: user_profile.php');
        } else {
            $message[] = 'Please select a course.';
        }
    } else {
        $message[] = 'Incorrect email or password!';
    }
}
?>









<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_COURSE_REGISTRATION</title>
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
                        <a href="oneyes_courses.php">Home</a>
                    </li>
                    <li>
                        <a href="oneyes_about.php">About</a>
                    </li>
                    <li>
                        <a href="oneyes_services.php">Services</a>
                    </li>
                    <li>
                        <a href="oneyes_team.php">Team</a>
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
        <section >
            <br>
        <div class="reg1">
            <h1 class="reg11">Course Registration </h1>
            <h1 class="reg12">All The Best !!</h1>
        </div>
        <br>
        <div class="reg3">
        
            <form action="" method="post" enctype="multipart/form-data">

                <?php
                if(isset($message)){
                foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
                    }
                    }
                ?>
                <input type="email" name="email" placeholder="Email"class="regform11"required><br>
                  <input type="password" name="password" placeholder="Password"class="regform1"required/><br>
                <label for="Course" class="courses_label"> Selct Your Course</label>
                  <select name="course" id="courses" class="course">
                    <option value="None" class="option">-- None --</option>
                    <option value="Artificial Intelligence" class="option">Artificial Intelligence</option>
                    <option value="C++" class="option">C++</option>
                    <option value="Cyber Security" class="option">Cyber Security</option>
                    <option value="Data Analytics" class="option">Data Analytics</option>
                    <option value="Data Science" class="option">Data Science</option>
                    <option value="DevOps" class="option">DevOps</option>
                    <option value="FullStack Development" class="option">FullStack Development</option>
                    <option value="IT Automation" class="option">IT Automation</option>
                    <option value="Java" class="option">Java</option>
                    <option value="Machine Learning" class="option">Machine Learning</option>
                    <option value="Python" class="option">Python</option>
                    <option value="UI/UX Design" class="option">UI/UX Design</option>
                  </select>
                  <br><br><br><br><br>
                  <button class="glow-on-hover" name="submit" type="submit" id="buttona1" onclick="message()">Register Course</button></input>
                  
                  
            </form>
            
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </section>

    <script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </body>

</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

.message
{
	color:black;
	font-size:2.0vw;
	text-align:center;
	margin-bottom:-20px;
	margin-top:-40px;
	background-color:red;
}
.courses_label
{
    margin-left: 10%;
    font-size: 1.5vw;
    margin-right: 3%;
    color:black;
}
.reg3
{
    background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);
}
</style>
