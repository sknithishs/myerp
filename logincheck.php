<?php include('connection.php');
  #session_start();
  if(isset($_POST['login_button']))
  {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username))
    {
      echo "Enter Username";
      $_SESSION['loginstatus']='error';
    }

    if(empty($password))
    {
      echo "Enter Password";
      $_SESSION['loginstatus']='error';
    }

    if( !isset($_SESSION['loginstatus']) || $_SESSION['loginstatus']!='error')
    {

      $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);

      if (mysqli_num_rows($results) == 1)
      {
  	     $_SESSION['username'] = $username;
  	     $_SESSION['loginstatus'] = "success";
         header('location: index.php');
       }
       else
       {
         echo "Wrong Username/Password";
         $_SESSION['loginstatus']='error';
       }
     }
   }
   ?>
