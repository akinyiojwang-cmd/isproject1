<?php
include 'db_connect.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$u'");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($p, $row['password'])) {
            $msg = "Welcome, " . $u . "! Login successful.";
        } else {
            $msg = "Wrong password.";
        }
    } else {
        $msg = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html><body>
<h2>Login</h2>
<p style="color:blue"><?php echo $msg; ?></p>
<form method="POST" action="login.php">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <input type="submit" value="Login">
</form>
<a href="signup.php">Go to Signup</a>
</body></html>
