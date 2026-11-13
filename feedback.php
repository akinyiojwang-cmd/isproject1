<?php
include 'db_connect.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $course = $_POST['course_name'];
    $comments = $_POST['comments'];
    $sql = "INSERT INTO feedback (student_name, course_name, comments)
            VALUES ('$name', '$course', '$comments')";
    if ($conn->query($sql) === TRUE) {
        $msg = "Feedback submitted successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Course Feedback Form</h2>
<p style="color:green"><?php echo $msg; ?></p>
<form method="POST" action="feedback.php">
  Student Name: <input type="text" name="student_name" required><br><br>
  Course Name:  <input type="text" name="course_name" required><br><br>
  Comments:     <textarea name="comments" rows="4" cols="40" required></textarea><br><br>
  <input type="submit" value="Submit Feedback">
</form>
</body></html>
