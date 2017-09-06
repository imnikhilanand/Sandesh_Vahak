<?php
$name=$_POST["name"];
$employee=$_POST["employee"];
$aadhar=$_POST["aadhar"];
$password=$_POST["password"];
$department=$_POST["department"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="INSERT INTO sandesh.admin(name,employee,aadhar,password,department) VALUES ('$name','$employee','$aadhar','$password','$department')";
$rslt1=mysqli_query($con1,$qry1);
if($rslt1)
{
	echo "Successful";
}
else
{
	die(mysqli_error($con1));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sandesh Vahak</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Alike' rel='stylesheet'>
	<style>
	body{
		background-color:#ffffff;
	}
	#navi_bar{
	border-style: solid;
    border-bottom-color: #66a3ff;
	}
	</style>
</head>
<body>

<!--navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top" id="navi_bar">
  <div class="container-fluid">
    <div class="navbar-header">
	  <a class="navbar-brand" href="index.php">Sandesh Vahak</a>
    </div>
	</div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--body-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" style="background-color:#ffffff;">
	</div>
	<div class="col-sm-8" style="background-color:#ffffff;">
	<p><font face="alike" size="6">Welcome to sandesh vahahk. You will get Queries that people have related to your ministry. You will be given three checkboxes denoting three stages of the query. After completion of each step click on the checkbox, this will notify the person about his query.</font></p>
	<div align="center"><button type="button" id="loadmore" onclick="window.location.href='index.php'">Log In</button></div>
	</div>
	<div class="col-sm-2" style="background-color:#f9f9f9;">
	</div>
  </div>
</div>  
	
	
</body>
</html>