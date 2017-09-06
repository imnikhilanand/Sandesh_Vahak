<?php
session_start();
$aadhar=$_POST["aadhar"];
$password=$_POST["password"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT id FROM sandesh.user WHERE aadhar='$aadhar' AND password='$password'";
$rslt1=mysqli_query($con1,$qry1);
if(mysqli_num_rows($rslt1)>0)
{
	while ($obj = mysqli_fetch_object($rslt1)) 
	    {
          $user_id=$obj->id;
        }
   $_SESSION["user_id_multi"]=$user_id;
   echo $user_id;
   header('Location: info.php');
}
else
{
   header('Location: index.php');
}
?>