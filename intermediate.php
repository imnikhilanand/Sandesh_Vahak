<?php
session_start();
$employee=$_POST["employee"];
$password=$_POST["password"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT id,department FROM sandesh.admin WHERE employee='$employee' AND password='$password'";
$rslt1=mysqli_query($con1,$qry1);
if(mysqli_num_rows($rslt1)>0)
{
	while ($obj = mysqli_fetch_object($rslt1)) 
	    {
			$user_id=$obj->id;
			$department=$obj->department;
        }
   $_SESSION["user_admin_id_multi"]=$user_id;
   $_SESSION["department"]=$department;
   header('Location: info-news-admin.php');
}
else
{
   header('Location: login_admin.php');
}
?>