<?php
session_start();
require_once '/home/mir/forum/forum.php';

$uid = $_POST["Username"];
$firstname = $_POST["Firstname"];
$lastname = $_POST["Lastname"];
$password = $_POST["password"];
$get = get_uids();
$adduser = add_user($uid, $firstname, $lastname, $password);

if (isset($_POST["submit"])){
  if ($adduser == false) {
    echo "<br>";
    echo "Du kunne ikke blive tilføjet";
} else {
    echo "Bruger er blevet tilføjet";
    $_SESSION['uid'] = $_POST['Username'];
    header('Location:forums.php');
    }
  }


 ?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
  <link rel="stylesheet"  href="style.css">
</head>
<body>

<form action="" method="POST">
  <h1>Registrer dig til databasen<h1>
  <input type="text" placeholder='Username' name="Username">
  <br>
  <input type="text" placeholder='First name' name="Firstname">
  <input type="text" placeholder='Last name' name="Lastname">
  <br>
  <label for="password">Password max 10 tegn</label>
  <br>
  <input type="password" placeholder='TOP HEMMELIGE KODE' name="password" maxlength="10">
  <br>
  <input type="submit" value="Enter" name="submit">

</form>

</body>
</html>
