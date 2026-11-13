<?php
include 'db_connect.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $e = $_POST['email'];
    $sql = "INSERT INTO users (username, password, email) VALUES ('$u', '$p', '$e')";
    if ($conn->query($sql) === TRUE) {
        $msg = "Signup successful! You can now login.";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Sign Up</h2>
<p style="color:green"><?php echo $msg; ?></p>
<form method="POST" action="signup.php">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  Email:    <input type="email" name="email" required><br><br>
  <input type="submit" value="Sign Up">
</form>
<a href="login.php">Go to Login</a>
</body></html>
