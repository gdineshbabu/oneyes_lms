<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equip="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ONEYES_User_Profile</title>
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
                        <a href="#" class="active1">Hii <?php echo $fetch['name']; ?></a>
                    </li>
                </ul>
            </nav>
        
        </header>
        <br><br><br><br>
        <section>
            <br>
            <div>
                <br><br><br><br><br>
            <?php
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                           $fetch = mysqli_fetch_assoc($select);
                        }
                        
                     ?>
                        <a href="user_profile.php" class="do7a2"><?php echo $fetch['name']; ?></a>
            </div>
            <div>
            <?php
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                           $fetch = mysqli_fetch_assoc($select);
                        }
                        if($fetch['image'] == ''){
                           echo '<img src="images/default-avatar.png" class="profile_img">';
                        }else{
                           echo '<img src="https://th.bing.com/th/id/OIP.GJrlZfzC1waiU0Ol25L5aAHaFJ?pid=ImgDet&rs=1" class="profile_img">';
                        }
                     ?>
            </div>
            
            <div class="upd">
            <a href="update_profile.php" class="do7a1"><button class="glow-on-hover" type="button"  id="buttonsdo">Update Pofile</button></a>
            <a href="index.html" class="do7a1"><button class="glow-on-hover" type="button"  id="buttonsdo">LogOut</button></a>
            
            </div>
            <hr>
            <div class="">
                <h1 class="courses">Registered Courses </h1>
                <?php
$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}

$userCourses = array();
$coursesQuery = mysqli_query($conn, "SELECT course_name FROM `courses` INNER JOIN `user_course` ON courses.course_id = user_course.course_id WHERE user_course.user_id = '$user_id'");
while ($row = mysqli_fetch_assoc($coursesQuery)) {
    $userCourses[] = $row['course_name'];
}
?>



<!-- For AI-->



<?php if (in_array("Artificial Intelligence", $userCourses)) { ?>
    <div class="do21">
        <img src="https://i.ibb.co/pnQGhTc/OIP-14.jpg" alt="User Image" class="img21">
        <a href="AI.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
                
            <?php
            if (!empty($userCourses)) {
                $firstCourse = reset($userCourses);
                echo $firstCourse;
            } else {
                echo 'No courses registered';
                }
            ?>


            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 1; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
            
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>


        
    </div>
<?php } ?>

<?php

if (!in_array("Artificial Intelligence", $userCourses)) {
    array_unshift($userCourses, "A"); 
}

?>



<?php if (in_array("C++", $userCourses)) { ?>
    <div class="do21">
        <img src="https://miro.medium.com/max/1080/1*kYLN8FgczBfrWvELzHrRdQ.png" alt="https://i.ibb.co/jvgzDRX/1-k-YLN8-Fgcz-Bfr-Wv-ELz-Hr-Rd-Q.png" border="0" class="img22">
        <a href="C++.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
                <?php
                if (!empty($userCourses)) {
                    next($userCourses);
                    $nextCourse = current($userCourses);
                    if ($nextCourse !== false) {
                        echo $nextCourse;
                    } else {
                        echo 'No more courses registered';
                    }
                } else {
                    echo 'No courses registered';
                }
                ?>
            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
                <?php
                $user_id = $_SESSION['user_id'];
                $course_id = 2; // Set the appropriate course ID here

                $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $marks = $row['marks'];
                    $progress = $row['progress'];
                    echo "Course Progress: $progress%<br>";
                    if ($marks == 0) {
                        echo ' you need to take the test';
                    } else {
                        echo "Course marks: $marks";
                    }

                    // Add the "Remove this course" button
                    echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
                } else {
                    echo "Error fetching data: " . mysqli_error($conn);
                }
                ?>
            </h3>
        </div>
    </div>
<?php } ?>




<!-- For Cyber Security-->




<?php if (in_array("Cyber Security", $userCourses)) { ?>
    <div class="do21">
    <img src="https://world-ma.com/fileadmin/_processed_/1/a/csm_HWG_2022_72ace5917d.jpg" alt="https://i.ibb.co/3W1L3wB/csm-HWG-2022-72ace5917d.webp" border="0" class="img22">        
    <a href="CyberSecurity.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
            if (!empty($userCourses)) {

                next($userCourses);


                $nextCourse = current($userCourses);

                if ($nextCourse !== false) {
                    echo $nextCourse;
                } else {
                echo 'No more courses registered';
                }
                } else {
                echo 'No courses registered';
                }
            ?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 3; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>


<!-- For Data Analytics-->



<?php if (in_array("Data Analytics", $userCourses)) { ?>
    <div class="do21">
    <img src="https://th.bing.com/th/id/OIP.KJKxnBdQGm9AwECSTtJxjgAAAA?pid=ImgDet&rs=1" alt="https://i.ibb.co/YBnnWfw/OIP-18.jpg" border="0" class="img22">       
     <a href="DataAnalytics.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 4; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>



<!-- For data Science-->


<?php if (in_array("Data Science", $userCourses)) { ?>
    <div class="do21">
    <img src="https://th.bing.com/th/id/OIP.A05U6VziETlmD9unMsIWHQHaEK?pid=ImgDet&rs=1" alt="https://i.ibb.co/3R1SFZt/Data-Science.jpg" border="0" class="img22">       
     <a href="DS.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 5; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>



    </div>
<?php } ?>



<!-- For Devops-->


<?php if (in_array("DevOps", $userCourses)) { ?>
    <div class="do21">
    <img src="https://wallpaperaccess.com/full/2648921.jpg" alt="https://i.ibb.co/MpHksyy/2648921.jpg" border="0" class="img22">
    <a href="DevOps.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 6; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>


<!-- For FullStack Development-->



<?php if (in_array("FullStack Development", $userCourses)) { ?>
    <div class="do21">
    <img src="https://swansoftwaresolutions.com/wp-content/uploads/2020/04/05.14.20-Meet-a-Full-Stack-Developer-Vlad-Ryba.jpg" alt="https://i.ibb.co/m5Dg47K/05-14-20-Meet-a-Full-Stack-Developer-Vlad-Ryba.jpg" border="0" class="img22">      
      <a href="FullStackDevelopment.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 7; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>


<!-- For IT Automation-->



<?php if (in_array("IT Automation", $userCourses)) { ?>
    <div class="do21">
    <img src="https://smallbizclub.com/wp-content/uploads/2018/10/Office-Automation-Keeping-Up.jpg" alt="https://i.ibb.co/1q8NzpH/Office-Automation-Keeping-Up.jpg" border="0" class="img22">        
    <a href="IT_Automation.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 8; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>

<!-- For Java-->


<?php if (in_array("Java", $userCourses)) { ?>
    <div class="do21">
    <img src="https://www.shutterstock.com/shutterstock/videos/1065281794/thumb/11.jpg?ip=x480" alt="https://i.ibb.co/yhrVr5x/11.webp" border="0" class="img22">        
    <a href="Java.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 9; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>



<!-- For Machine Learning-->


<?php if (in_array("Machine Learning", $userCourses)) { ?>
    <div class="do21">
    <img src="https://th.bing.com/th/id/OIP.6vVq7gsqpCe9wJooMeIYSAHaEK?pid=ImgDet&w=800&h=450&rs=1" alt="https://i.ibb.co/1RbSfNR/OIP-17.jpg" border="0" class="img22">       
     <a href="ML.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 10; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>





    </div>
<?php } ?>



<!-- For python-->


<?php if (in_array("Python", $userCourses)) { ?>
    <div class="do21">
    <img src="https://th.bing.com/th/id/OIP.-oJVOgJZzl6olYiJaHqSdgAAAA?pid=ImgDet&w=474&h=266&rs=1" alt="https://i.ibb.co/DpQsbDY/OIP-20.jpg" border="0" class="img22">       
     <a href="Python.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 11; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>


<!-- For UI/UX Design-->


<?php if (in_array("UI/UX Design", $userCourses)) { ?>
    <div class="do21">
    <img src="https://s3.ap-south-1.amazonaws.com/townscript-production/images/3db55480-5fb4-43c3-baf5-791d33796ad2.jpg" alt="https://i.ibb.co/QDrJtVZ/3db55480-5fb4-43c3-baf5-791d33796ad2.jpg" border="0" class="img22">        
    <a href="UI_UX.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
            <?php
if (!empty($userCourses)) {

    next($userCourses);


    $nextCourse = current($userCourses);

    if ($nextCourse !== false) {
        echo $nextCourse;
    } else {
        echo 'No more courses registered';
    }
} else {
    echo 'No courses registered';
}
?>

            </button>
        </a>
        <div class="finalpm">
            <h3 class="pm">
        <?php

        $user_id = $_SESSION['user_id'];
        $course_id = 12; // Set the appropriate course ID here

        $query = "SELECT marks, progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $marks = $row['marks'];
            $progress = $row['progress'];
            echo "Course Progress: $progress%<br>";
            if($marks == 0)
            {
                echo ' you need to take the test';
            }
            else{
            echo "Course marks: $marks";
            }
            echo '<a href="remove_course.php?course_id=' . $course_id . '" class="remove-button"><button class="remove">Remove this course</button></a>';
        }
        else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
        ?>
        </h3>
        </div>
    </div>
<?php } ?>

<?php if (in_array(" ", $userCourses)) { ?>
    <div class="do21">
        <img src="https://i.ibb.co/pnQGhTc/OIP-14.jpg" alt="User Image" class="img21">
        <a href="AI.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
                <?php
                if (!empty($userCourses)) {
                    $firstCourse = reset($userCourses);
                    echo $firstCourse;
                } else {
                    echo 'No courses registered';
                }
                ?>
            </button>
        </a>
    </div>
<?php } else { ?>
    <br>
    <div class="no" style="text-align:center">
    <div class="do21" style="background-color:black">
    <a href="course_registration.php" class="do7a1">
            <button class="glow-on-hover" type="button" id="buttonsdo">
                <?php
                if (!empty($userCourses)) {
                    $firstCourse = reset($userCourses);
                    echo 'Register courses';
                } else {
                    echo 'No courses registered Register a course';
                }
                ?>
            </button>
        </a>
    </div>
    </div>
<?php } ?>
                        
        </div>
            </div>
            

            <div class="do8" id="contact">
                <div class="do81">
                    <h1 class="do8h1">ONEYES INFOTECH SOLUTIONS</h1>
                    <p class="do8p">You might have a business that you wish to take to the next level. In the age of the internet, it’s possible! Your business can have a presence online. We at OneYes Infotech Solutions, provide you with a custom-made applications that fulfill your needs.Build your site with us!.</p>
                </div>
                <div class="do82">
                    <h1 class="do8h2">Contact Us</h1>
                    <i class="fas fa-envelope" id="tt"><a class="tt" href="mailto:info@oneyesinfotechsolutions.com">Email</a></i><br>
                    <br>
                        
                        <i class="fa fa-instagram" area-hidden="true" id="tt"><a class="tt"
                                                                                href="https://www.instagram.com/oneyes_technologies/?hl=en">Instagram</a></i><br>
                        <br>
                        <i class="fa fa-facebook" area-hidden="true" id="tt"><a class="tt"
                                                                                 href="https://www.facebook.com/OneYesTechnologies/">Facebook</a></i><br>
                        <br>
                        <i class="fa fa-linkedin" id="tt"><a class="tt" href="https://www.linkedin.com/in/oneyestechnologies">LinkedIn</a></i><br>

                        <br>
                </div>
                <br>
                <a href="OneYes_lms.php" class="la2">Home</a>
                <a href="oneyes_about.php" class="la1">About</a>
                <a href="oneyes_services.php" class="la1">Services</a>
                <a href="oneyes_team.php" class="la1">Team</a>
                <a href="oneyes_contact.php" class="la1">Contact Us</a>
                <br><br>
                <br>
                <a href="meetUs.php" class="do7a1"><button class="glow-on-hover" type="button"  id="buttonsdo">Feedback</button></a>
                <br><br>
        
            </div>
            
    </section>

    <script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </body>

</html>
<style>
    .do7a2
{
  color:orangered;
  text-align: center;
  margin-top: 5%;
  font-size: 7vw;
  margin-left: 25%;
  text-decoration: none;
  font-family: algerian;

}
.profile_img
{
    text-align: center;
    margin-left: 40%;
    width:20%;
    border-radius: 50%;
    border-color: aquamarine;
    border-width: 20px;
}
.upd
{
  width:50%;
  margin-left: 27%;
}
h1.courses
{
    color:white;
    font-size: 3vw;
    margin-left: 5%;
}
.pm{
    color:orangered;
    font-size: 15px;
    text-align: center;
    margin-bottom: 2%;
}
.finalpm
{
    background-color: black;
}
.remove
{
    color:red;
    background-color: white;
    width:70%;
    height:5%;
    font-size: 1.5vw;
    margin-bottom: 2%;
    margin-left: 10%;
    margin-top: 2%;
}
.remove:hover
{
    color:white;
    background-color: red;
    cursor:pointer;
   
    animation-delay: 1s;
}
.msg
{
    color:white;
    background-color: red;
    text-align: center;
}

</style>
