<?php
session_start();
$user_id=$_SESSION["user_id_multi"];
$ask=$_POST["a"];
$department=$_POST["d"];
$address=$_POST["r"];
$phone=$_POST["p"];
$name=$_POST["n"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="INSERT INTO sandesh.ask(userquery,user,department,name,address,phone,phase,date) VALUES('$ask','$user_id','$department','$name','$address','$phone','0',CURRENT_TIMESTAMP())";
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