<?php
/*
  if(!isset($_COOKIE['loggedIn'])) {
   header("Location: login.php");
  } else {
    $cookie = $_COOKIE['loggedIn'];
    
    $frags = explode(",", $cookie);
    $salt = "g4f561dbfg4b89sb9dq1f8ù=$:";
    if(md5($frags[0].$salt) === $frags[1]) {
      // cookie is valid
    } else {
      header("Location: login.php");
    }
  }
*/

  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  } else {
    die('NO SESSION'); // 
    // exit('NO SESSION'); // exit is the same as die
  }

  include_once("data.inc.php");

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  <div id="netflix">
  <?php include_once("nav.inc.php"); ?>
  
  <div class="collection">
    <?php foreach ($collection as $key => $c): ?>
    <a href="details.php?id=<?php echo $key; ?>" class="collection__item" style="background-image: url('<?php echo $c['poster']; ?>')">
    </a>
    <?php endforeach; ?>
   
  </div>
  
</div>

</body>
</html>
