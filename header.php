<?php
$links=array("index","createuser",'logout');
foreach ($links as $link)
{
  if($thispage!=($link.".php"))
  {
    echo '<a href="'.$link.'.php">'.$link.'</a><br>';
  }
} ?>
