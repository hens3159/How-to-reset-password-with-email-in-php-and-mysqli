<?php
//connect to db.php
require_once 'db.php';
if (!$_SESSION['user']) {
 header ('location:login.php');
}

//check submit and send email
if  (isset($_POST['submit'])) {
$tujuan = $_POST['tujuan'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$headers = "From: chikennotes@gmail.com" . "\r\n";
mail($tujuan,$judul,$isi,$headers);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Send Email</title>
</head>
<body>
  <h3> Send Email </h3>
<form action=""  method="post">
<label>To</label><br>
<input type="text" name="tujuan" placeholder="to"><br>
<label>Title</label><br>
<input type="text" name="judul" placeholder="title"><br>
<label>Content</label><br>
<input type="text" name="isi" placeholder="content"><br>
<input type="submit" name="submit">
</form>
</body>
</html>
