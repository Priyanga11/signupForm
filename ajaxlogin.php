<?php 

include("head.php");

$uname = $_POST['uname'];
$pword = $_POST['pword'];
$ucheck = $_POST['ucheck'];
$pcheck = $_POST['pcheck'];

if ($uname == $ucheck && $pword == $pcheck)
{
  echo "Fetching Data";
} 
else{
  echo "Invalid Data";
  die;
}



?>