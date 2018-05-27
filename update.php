<?php
require_once 'db.php';
$kode=$_GET['code'];
$username = $_GET['username'];

//check link
 if (isset($kode) && isset($username)){
 $db_user = user($username);
 $row = mysqli_fetch_assoc($db_user);
 $token = $row ['token'];
 $db_username = $row ['username'];

//check between tokens & usernames that are in links and databases
if ($token==$kode && $db_username==$username){
  //check submit
  if  (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $konfir_pass = $_POST['konfir_password'];
  //check password
  if ($password==$konfir_pass) {
  echo "password telah diupdate";
    update_pass($konfir_pass, $username);
    header('location:login.php');
  }else {echo "password is different";}
  }
}else{echo "token & username is different";}
}else{echo "link is wrong";}

?>
<!DOCTYPE html>
<html>
<head>
<title>Send Email</title>
</head>
<body>
<h3>Change your password</h3>
<form action=""  method="post">
<label>password</label><br>
<input type="text" name="password" placeholder="password"><br>
<label>new password</label><br>
<input type="text" name="konfir_password" placeholder="new password"><br>
<input type="submit" name="submit">
</form>
</body>
</html>
