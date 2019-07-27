<?php
$thispage=basename(__FILE__);
include("header.php");
session_start();
include("connection.php");
if($_SESSION['loginstatus']!='success')
{
  header('location: login.php');
}
$username=$_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$results = mysqli_query($db, $query);
$row = $results->fetch_assoc();
$name=$row['name'];
?>
<DOCTYPE html>
<html>
<head>
  <title>Welcome <?php echo $name; ?></title>
</head>
<body>
</body>
</html>
