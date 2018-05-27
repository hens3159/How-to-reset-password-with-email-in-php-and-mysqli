<?php
require_once 'db.php';

//check for submit
if  (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$user_db = user($username);
$row= mysqli_fetch_assoc($user_db);

//if password in form same with password in database
if ($password==$row['password'] && $username == $row['username']) {
$_SESSION['user'] = $username;

if($_SESSION['user']==$username){
header ('location:home.php');
}else {
  echo "login gagal";
}
}else {
  echo "your password is wrong";
}

}
?>
<h3> form login </h3>
<form action=""  method="post">
<label>username</label><br>
<input type="text" name="username" placeholder="username"><br>
<label>password</label><br>
<input type="text" name="password" placeholder="passwrod"><br>
<p><a href="forgot.php">forgot password</a></p>
<input type="submit" name="submit"><br>

</form>
