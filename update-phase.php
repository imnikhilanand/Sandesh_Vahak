<?php
$phase=$_POST["b"];
$query=$_POST["q"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="UPDATE sandesh.ask SET phase='$phase' WHERE id='$query'";
$rslt1=mysqli_query($con1,$qry1);
if(!$rslt1)
{
	die(mysqli_error($con1));
}
else
{
	echo "okay";
}
?>