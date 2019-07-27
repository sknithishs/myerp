<?php
$thispage=basename(__FILE__);
include("header.php");
session_start();
if( !isset($_SESSION['loginstatus']) && $_SESSION['loginstatus']!='success' && !isset($_SESSION['username']) )
  header('location:login.php');
 elseif ($_SESSION['username']!='admin')
  header('location:userrole_err.php');
include("createusercheck.php"); ?>
<DOCTYPE html>
  <html>
  <head>
    <title> Create User </title>
  </head>
  <body>
  <?php
  if(!isset($_POST['newuser_details']) || !isset($regstatus) || $regstatus=='error')
  {
    echo '<form action="createuser.php" method="post">
      Name:
      <input type="text" name="name">
      E Mail:
      <input type="email" name="email">
      Username:
      <input type="text" name="username">
      Password:
      <input type="password" name="pass">
      Confirm Password:
      <input type="password" name="cpass">
      <button type="submit" name="newuser_details">Create</button>
    </form>';
  }
  else
  {
    $roleedittarget=$username;
    include("roleedit.php");
  } ?>
  </body>
</html>
