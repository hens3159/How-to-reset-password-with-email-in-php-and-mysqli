<?php
require_once 'db.php';

//check submit
if  (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$db = user($username);
$jumlah = mysqli_num_rows($db);

//check is there username in database
if ($jumlah !=0) {
  while ($row=mysqli_fetch_assoc($db)){
    $db_email = $row['email'];
  }

//check input email similiar with email in database
if ($email==$db_email){
// make random code
  $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
  $code = str_shuffle($code);
  $code = substr($code,0, 10);

// for send token
  $alamat = "http://localhost/coba2/update.php?code=$code&username=$username";
  $to = $db_email;
  $judul = "passwrod reset";
  $isi = "this is automatic email, dont repply. For reset your password please click this link ".$alamat;
  $headers = "From: chikennotes@gmail.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

//echo $alamat;
if (update_token($code, $username)){
  echo "your password have reset";
}else {
  echo "please try again";
}

}else {echo"your email didn't register";}

}else {echo"your username didn't register";}
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<h3>Reset Password </h3>
<form action=""  method="post">
<label>username</label>
<input type="text" name="username" placeholder="username">
<label>email</label>
<input type="text" name="email" placeholder="email">
<input type="submit" name="submit">

</form>
</body>
</html>
