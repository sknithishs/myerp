<?php
  session_start();
  if ( !isset($_SESSION['loginstatus']) || $_SESSION['loginstatus']!='success') {
    header('location:login.php');
  }
  session_destroy();
  unset($_SESSION['username']);
  echo "Logout Success";
  echo '<a href="login.php">login</a>';
?>
