<?php
session_start();
$question=$_POST["a"];
$user_id=$_SESSION["user_id_multi"];
$con1=mysqli_connect("localhost","root","","sandesh_likes");
$con2=mysqli_connect("localhost","root","","sandesh");
$qry6="SELECT upvote,downvote FROM sandesh.news WHERE id='$question'";
$rslt6=mysqli_query($con2,$qry6);
if(mysqli_num_rows($rslt6)>0)
{
		while($row6=mysqli_fetch_assoc($rslt6))
		{
			$upvote=$row6["upvote"];
			$downvote=$row6["downvote"];
		}
}
$qry1="SELECT user_id,opinion FROM sandesh_likes.$question WHERE user_id='$user_id'";
$rslt1=mysqli_query($con1,$qry1);
if(mysqli_num_rows($rslt1)>0)
{
		while($row1=mysqli_fetch_assoc($rslt1))
		{
			$opinion=$row1["opinion"];
			if($opinion=="0")
			{
				$upvote=$upvote+1;
				$downvote=$downvote-1;
				$qry3="UPDATE sandesh_likes.$question SET opinion='1' WHERE user_id='$user_id'";
				$rslt3=mysqli_query($con1,$qry3);
				$qry8="UPDATE sandesh.news SET upvote='$upvote',downvote='$downvote' WHERE id='$question'";
				$rslt8=mysqli_query($con2,$qry8);
			}
			else if($opinion=="1")
			{
				$upvote=$upvote-1;
				$qry4="DELETE FROM sandesh_likes.$question WHERE user_id='$user_id'";
				$rslt4=mysqli_query($con1,$qry4);
				$qry7="UPDATE sandesh.news SET upvote='$upvote' WHERE id='$question'";
				$rslt7=mysqli_query($con2,$qry7);
			}
		}
}
else
{
	$upvote=$upvote+1;
	$qry2="INSERT INTO sandesh_likes.$question (user_id,opinion) VALUES ('$user_id','1')";
	$rslt2=mysqli_query($con1,$qry2);
	$qry5="UPDATE sandesh.news SET upvote='$upvote' WHERE id='$question'";
	$rslt5=mysqli_query($con2,$qry5);
}
?>