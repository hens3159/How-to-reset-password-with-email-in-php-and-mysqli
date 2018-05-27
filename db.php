<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'coba';
$link = mysqli_connect ($host, $user, $pass, $db) or die (mysqli_error()); //die digunakan untuk memberhentikan syntax sampai disini
 ?>

<?php
session_start();
function result ($query) {
  global $link;
  if ($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
  return $result;
  }
}

function run($query) {
  global $link;
  if (mysqli_query ($link, $query)) return true;
  else return false;
  }

function user($username) {
  $query = "SELECT * FROM user WHERE username='$username'";
  return result ($query);
}

function update_token($code,$username) {
$query = "UPDATE user SET token='$code' WHERE username='$username'";
return run ($query);
}

function update_pass($konfir_pass,$username) {
$query = "UPDATE user SET password='$konfir_pass' WHERE username='$username'";
return run ($query);
}
 ?>
