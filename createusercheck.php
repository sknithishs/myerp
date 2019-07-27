<?php include('connection.php');
#  session_start();
  if(isset($_POST['newuser_details']))
  {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $regstatus = 'pending';
    if(empty($username))
    {
      echo "Enter Username";
      $regstatus='error';
    }
    if(empty($pass))
    {
      echo "Enter Password";
      $regstatus='error';
    }
    if(empty($name))
    {
      echo "Enter Name";
      $regstatus='error';
    }
    if(empty($cpass))
    {
      echo "Enter Confirm Password";
      $regstatus='error';
    }
    if(empty($email))
    {
      echo "Enter Email";
      $regstatus='error';
    }
    if ($regstatus!='error')
    {
      if ($pass!=$cpass)
      {
        echo "Password doesn't match";
        $regstatus='error';
      }

      $query = "SELECT * FROM user WHERE username='$username' ";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1)
      {
  	     echo "Username exists";
  	     $regstatus='error';
       }

       $query = "SELECT * FROM user WHERE email='$email' ";
       $result = mysqli_query($db, $query);
       if (mysqli_num_rows($result) == 1)
       {
   	     echo "Email exists";
   	     $regstatus='error';
       }
    }

    if( $regstatus!= 'error')
    {
     	$query = "INSERT INTO user (username, password, email, name, createdby) VALUES('$username',  '$pass', '$email', '$name', 1)";
     	mysqli_query($db, $query);
     	$regstatus='Success';
      $query = "SELECT id FROM user WHERE username='$username'";
     	$resul=mysqli_query($db, $query);
      echo mysqli_num_rows($resul);
      $row=mysqli_fetch_assoc($resul);
      $userid=$row['id'];
      $query = "INSERT INTO userrole (userid) VALUES('$userid')";
     	mysqli_query($db, $query);
     	echo "User Creation Success";
     }
   }
   ?>
