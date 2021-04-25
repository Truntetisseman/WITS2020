<?php

session_start();
require_once '/home/mir/forum/forum.php';
include 'header.php';

if (isset($_GET["addpost"])){
  $uid = $_SESSION['uid'];
  $title = $_GET["title"];
  $content = $_GET["content"];
  add_post($uid, $title, $content);
}

if (isset($_GET["Seeall"])){
  foreach (get_pids() as $pid){
    $post = get_post($pid);
    echo '<div class="posts">';
    echo $post['title'];
    echo" - ";
    echo $post['uid'];
    echo" - ";
    echo $post[ 'date'];
  echo "<br>";
  echo $post['content'];
  echo "<br>";

  echo "<a href='show-posts.php?pid=$pid&read'>Vis hele opslag</a>";
  echo "   "; // Håndværkerfix
  if(!empty($_SESSION['uid']) && ($_SESSION['uid'] == $post['uid'])) {
  echo "<a href='show-posts.php?pid=$pid&edit'>Rediger tekst</a>";
 }

  echo '</div>';

  }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ny main</title>
    <link rel="stylesheet"  href="style.css">
  </head>
  <body>

    <div class="addpostform">
        <h1>Skriv indlæg</h1>
      <?php
      if(!empty ($_SESSION['uid'])) { ?>
        <form action"" method="GET">
         <h2> <input type="text" placeholder='Indsæt titel' name="title"></h2>
           <h3><textarea rows="4" cols="50" name="content" placeholder='Skriv indhold'></textarea></h3>
           <input type="submit" value="Slå indlæg op" name="addpost">
        </form>

        <h1>Nye Indlæg</h1>

      <?php }

      echo "<a href='forums.php?Seeall'>Vis alle indlæg</a>";
      ?>


    </div>



    <?php

      foreach (get_pids() as $pid){
        $post = get_post($pid);
        if(has_read($pid, $_SESSION['uid']) == false){
        echo '<div class="posts">';
        echo $post['title'];
        echo" - ";
        echo $post['uid'];
        echo" - ";
        echo $post[ 'date'];
      echo "<br>";
      echo $post['content'];
      echo "<br>";

      echo "<a href='show-posts.php?pid=$pid&read'>Vis hele opslag</a>";
      echo "   "; // Håndværkerfix
      if(!empty($_SESSION['uid']) && ($_SESSION['uid'] == $post['uid'])) {
      echo "<a href='show-posts.php?pid=$pid&edit'>Rediger tekst</a>";
     }

      echo '</div>';
      }
    }
     ?>


    <aside>

    </aside>

  </body>
</html>
