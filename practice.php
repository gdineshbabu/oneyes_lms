
<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];




$user_id = $user_id;
$course_id = 1; 

$sql = "SELECT progress FROM user_course WHERE user_id = $user_id AND course_id = $course_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $progress = $row["progress"];
    echo "Progress for user $user_id in course $course_id is $progress%";
} else {
    echo "No progress found for user $user_id in course $course_id.";
}
$conn->close();
?>
