<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Redirect to the login page or handle unauthorized access.
    header('Location: login.php');
    exit();
}

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Establish a database connection (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "oneyes");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Perform a query to remove the course from the user's account
    $query = "DELETE FROM user_course WHERE user_id = $user_id AND course_id = $course_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Course removed successfully
        header('Location: user_profile.php'); // Redirect to the user's dashboard or another appropriate page
        exit();
    } else {
        echo "Error removing the course: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle the case where the course ID is not provided in the query parameter.
    echo "Course ID not provided.";
}
?>
