<?php // bmo, dvn, tlundt
session_start();
require_once '/home/mir/forum/forum.php';
include 'header.php';

if(empty($_SESSION['uid'])) {
   header('Location:login.php');
   exit;
}

$uid = $_SESSION['uid'];
$users = get_user($uid);


if (isset($_GET["submitt"])){
  session_destroy();
  header('Location:login.php');
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 <title>Proproprofile</title>
 <link rel="stylesheet" href="style.css">
 </head>
 <body>
   <div class="profil-info">
   <h1>Hej <?php echo $users['uid']; ?>, her er dine hemmelige oplysninger</h1>
   <ul>
     <li>First name : <?php echo $users['firstname']; ?></li>
     <li>Last name: <?php echo $users['lastname']; ?></li>
     <li>Kan du huske da du oprettede dig d. <?php echo $users['date']; ?></li>
   </ul>
 </div>

 </body>
 </html>
