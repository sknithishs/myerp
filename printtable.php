<?php
function printtable($n, $col,$dbs,$table)
{
  $i=0;
  $query="SELECT ";
  echo "<table>
      <tr>
        <th>#</th>";
  while ($i<$n)
  {
    $query=$query.$col[$i];
    echo "<th>'$col[$i]'</th>";
    $i++;
    if($i<$n)
      $query=$query.',';
  }
  echo "</tr>";
  $query=$query." FROM ".$table;
  $res=mysqli_query($dbs,$query);
  $i=1;
  while ($row=mysqli_fetch_assoc($res))
  {
    echo "<tr>
      <td>'$i'</td>";
    $i++;
    $j=0;
    while($j<$n)
    {
      echo "<td>".$row[$col[$j]]."</td>";
      $j++;
    }
    echo "</tr>";
  }
  echo "</table>";
}

?>
