<?php // bmo, dvn, tlundt
session_start();

require_once '/home/mir/forum/forum.php';
$uid = $_GET["uid"];
$password = $_GET["password"];
$login = login($uid, $password);

if (isset($_GET["submit"])){
if ($login == true){
  echo 'du er logget ind';
  $_SESSION['uid'] = $_GET['uid'];
  header('Location:forums.php');
  } else {
  echo 'Kode eller brugernavn er forkert';
  }
}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 <title>wits06</title>
 <link rel="stylesheet"  href="style.css">
 </head>

 <body>
   <form action="" method="GET">
     <h1>Registrer dig til databasen<h1>
     <input type="text" placeholder='Username' name="uid">
     <br>
     <label for="password">Password max 10 tegn</label>
     <br>
     <input type="password" placeholder='TOP HEMMELIGE KODE' name="password" maxlength="10">
     <input type="submit" value="Enter" name="submit">
   </form>

   <p>Har du ikke en bruger? <a href="signup.php">Sign up</a>
 </body>

 </html>
