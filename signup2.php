<?php
$name=$_POST["name"];
$mobile=$_POST["mobile"];
$aadhar=$_POST["aadhar"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$location=$_POST["location"];
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="INSERT INTO sandesh.user(name,mobile,aadhar,password,gender,dob,location) VALUES ('$name','$mobile','$aadhar','$password','$gender','$dob','$location')";
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
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans' rel='stylesheet'>
	<style>
	body{
		background-color:#ffffff;
	}
	.navbar {
      margin-bottom: 0;
      background-color: #66a3ff;
      z-index: 9999;
      border: 0;
      font-size: 15px !important;
      line-height: 1.42857143 !important;
      border-radius: 0;
      font-family: Arial, sans-serif;
  }
	</style>
</head>
<body>

<!--navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top" class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
	  <a class="navbar-brand" href="index.php"><font color="white" face="Alegreya Sans">Sandesh Vahak</font></a>
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
	<p><font face="Alegreya Sans" size="6">Welcome to sandesh vahahk. This is a plafrom where you can get news regarding the new policies, ammendments and rules government is going to make.</font></p>
	<div align="center"><button type="button" id="loadmore" onclick="window.location.href='index.php'">Log In</button></div>
	</div>
	<div class="col-sm-2" style="background-color:#f9f9f9;">
	</div>
  </div>
</div>  
	
	
</body>
</html>