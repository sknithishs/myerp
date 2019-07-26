<?php
session_start();
include("connection.php");
include("logout.php");
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
<a href="index.php?logout">logout</a>
</body>
</html>
