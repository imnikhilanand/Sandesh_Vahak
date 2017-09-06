<?php
session_start();
$user_id=$_SESSION["user_id_multi"];
$comment=$_POST["a"];
$news_id=$_POST["r"];
$con1=mysqli_connect("localhost","root","","sandesh_views");
$con2=mysqli_connect("localhost","root","","sandesh");
$qry1="INSERT INTO sandesh_views.$news_id(user_id,views) VALUES ('$user_id','$comment')";
$rslt1=mysqli_query($con1,$qry1);
if(!$rslt1)
{
	die(mysqli_error($con1));
}
else
{
	echo "okay";
}
$qry2="SELECT views FROM sandesh_views.$news_id";
$rslt2=mysqli_query($con2,$qry2);
$new_view=mysqli_num_rows($rslt2);
$qry3="UPDATE sandesh.news SET views='$new_view' WHERE id='$news_id'";
$rslt3=mysqli_query($con2,$qry3);
?>