<?php
$var=$_GET["c"];
$connection2=mysqli_connect("localhost","root","","sandesh");
$query2="SELECT name FROM sandesh.user WHERE aadhar='$var'";
$result=mysqli_query($connection2,$query2);
if(mysqli_num_rows($result)>0)
{
	echo"notokay";
}
else
{
	echo"okay";
}
?>