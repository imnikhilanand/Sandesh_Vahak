<?php
$news=$_POST["n"];
$department=$_POST["d"];
$region=$_POST["r"];
$expected=$_POST["e"];
$budget=$_POST["b"];
$con1=mysqli_connect("localhost","root","","sandesh");
$con2=mysqli_connect("localhost","root","","sandesh_likes");
$con3=mysqli_connect("localhost","root","","sandesh_views");
$qry1="INSERT INTO sandesh.news(news,department,region,upvote,downvote,views,date,expected_date,budget) VALUES ('$news','$department','$region','0','0','0',CURRENT_TIMESTAMP(),DATE '$expected','$budget')";
$rslt1=mysqli_query($con1,$qry1);
if(!$rslt1)
{
	die(mysqli_error($con1));
}
else
{
	echo "okay";
}
$qry2="SELECT id FROM sandesh.news WHERE news='$news'";
$rslt2=mysqli_query($con1,$qry2);
if(mysqli_num_rows($rslt2))
{
	while($row1=mysqli_fetch_assoc($rslt2))
	{
		$id=$row1["id"];
	}
}
$qry3="CREATE TABLE sandesh_likes.$id(user_id VARCHAR(255),opinion INT(2))";
$rslt3=mysqli_query($con2,$qry3);
if(!$rslt3)
{
	die(mysqli_error($con2));
}
$qry4="CREATE TABLE sandesh_views.$id(user_id VARCHAR(255),views TEXT(65535))";
$rslt4=mysqli_query($con3,$qry4);
if(!$rslt4)
{
	die(mysqli_error($con3));
}
?>