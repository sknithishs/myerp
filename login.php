<?php
session_start();
if(isset($_SESSION['loginstatus']) && $_SESSION['loginstatus']=='success')
  header('location:index.php');
  include('logincheck.php');?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
  <form method="post" action='login.php'>
    <input type="text" name="username" >
    <input type="password" name="password">
    <button type="submit" class="btn" name="login_button">Login</button>
  </form>
</body>
</html>
