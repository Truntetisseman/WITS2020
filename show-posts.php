<?php
//bmo,tlundt,dvn
require_once '/home/mir/forum/forum.php';
session_start();
include 'header.php';
$pid = $_GET['pid'];
$aid = $_GET['aid'];
$uid = $_SESSION['uid'];
$content = $_POST["content"];
$post = get_post($pid);

if (isset($_POST["addreply"])){
  add_answer($uid, $pid, $content);
}

if (isset($_GET['function'])){
    delete_answer($_GET['function']);
  }
if (isset($_GET['like'])){
      add_like($aid, $uid);
    }
if (isset($_GET['dislike'])){
      delete_like($aid, $uid);
    }

if (isset($_GET["read"])){
      add_read($pid, $uid);
      $læst = true;
    }

if (isset($_POST["modify"])){
  // $content = $_POST["content"];
   $title = $_POST["title"];
   modify_post($pid, $title, $content);
   echo "<a href='show-posts.php?pid=$pid'</a>";
   }


echo '<div class="posts">';
echo $post['title'];
echo" - ";
echo $post['uid'];
echo" - ";
echo $post[ 'date'];
echo "<br>";
echo $post['content'];
echo "<br>";


if(!empty($_SESSION['uid']) && ($_SESSION['uid'] == $post['uid'])) {
echo "<a href='show-posts.php?pid=$pid&edit'>EDIT BBY</a>";
}


if(isset($_GET['edit'])){  ?>
<form action"" method="POST">
 <h2> <input type="text" placeholder='Insert Title' name="title"></h2>
   <h3><textarea rows="4" cols="50" name="content" placeholder='Rediger'></textarea></h3>
   <input type="submit" value="edit" name="modify">
</form>
  <?php
}


//add_answer(gome, 1, testest11111);
foreach (get_aids_by_pid($pid) as $aid){
  $answers = get_answer($aid);
  $get_likes = get_likes_by_aid($aid);

  echo '<div class="answers">';
  echo $answers['title'];
  echo" - ";
  echo $answers['uid'];
  echo" - ";
  echo $answers[ 'date'];
  echo "<br>";
  echo $answers['content'];
  echo "<br>";
  if(!empty($_SESSION['uid']) && ($_SESSION['uid'] == $answers['uid'])) {
  echo "<a href='?pid=$pid&function=$aid'>Slet kommentar</a>";
 }
  echo count($get_likes);

  if (has_liked($aid, $uid)){
  echo "<a href='?pid=$pid&aid=$aid&dislike'>&#x1f44e;</a>";
} else {
  echo "<a href='?pid=$pid&aid=$aid&like'>&#x1f44d;</a>";
}
  echo '</div>';
}


echo '<div class="reply">';
?>
<form action"" method="POST">
   <h3><textarea rows="4" cols="50" name="content" placeholder='Skriv din kommentar her'></textarea></h3>
   <input type="submit" value="Tilføj kommentar" name="addreply">
</form>

<?php
echo '</div>';


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet"
    href="style.css">
  </head>
  <body>
  </body>
</html>
