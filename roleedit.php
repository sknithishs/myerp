<?php
include('connection.php');
if(!isset($roleedittarget))
{
  echo "No target user";
}
else
{
$query="SELECT id,name,email FROM user WHERE username='$roleedittarget'";
$results=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($results);
$userid=$row['id'];
$name=$row['name'];
$email=$row['email'];
echo "Username:".$roleedittarget." Name:".$name." Email:".$email;
echo "<form action='".$thispage."' method='post'>
  <table>
    <tr>
      <th></th>
      <th>None</th>
      <th>Read only</th>
      <th>Write only</th>
      <th>Read and Write</th>
    </tr>";
$i=0;
$query = "SHOW COLUMNS FROM userrole LIKE 'ro_%'";
$results=mysqli_query($db,$query);
while ($row=mysqli_fetch_assoc($results))
{
  $i=$i+1;
  $column[$i]=$row['Field'];
}
if (isset($_POST['userrolesubmit']))
{
  $j=1;
  while ($j<=$i)
  {
    switch ($_POST [$column[$j]])
    {
      case 'none':$val=0;break;
      case 'read':$val=1;break;
      case 'write':$val=2;break;
      case 'readwrite':$val=3;break;
    }
    $query="UPDATE `userrole` SET `".$column[$j]."` = '".$val."' WHERE `userrole`.`userid` = ".$userid;
    mysqli_query($db,$query);
    $j++;
  }
  echo "Saved Successfully";
}
$query="SELECT * FROM userrole WHERE userid='$userid'";
$res=mysqli_query($db,$query);
$rows=mysqli_fetch_assoc($res);
$j=1;
while ($j<=$i)
{
  $val=$rows[$column[$j]];
  echo "<tr>
          <td>".$column[$j]."</td>
          <td> <input type='radio' name='".$column[$j]."' value='none' "; if($val==0) echo "checked='checked'";echo ">
          <td> <input type='radio' name='".$column[$j]."' value='read' "; if($val==1) echo "checked='checked'";echo ">
          <td> <input type='radio' name='".$column[$j]."' value='write' ";if($val==2) echo "checked='checked'";echo ">
          <td> <input type='radio' name='".$column[$j]."' value='readwrite'";if($val==3) echo "checked='checked'";echo ">
        </tr>";
  $j++;
}
echo '</table>
  <button type="submit" name="userrolesubmit">Save</button>
  </form>';
}
?>
