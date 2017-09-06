<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sandesh Vahak</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="design/logosmall2-compressed.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Alegreya Sans' rel='stylesheet'>
</head>
<body> 
<style>
.jumbotron 
{
 background-color: #fff;
 color: #e6b800;
 padding: 50px 25px;
 font-family: Arial, sans-serif;
}
.login
{
	background-color: #3385ff; /* Blue-Green */
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 2px;
	border: 1px solid #3385ff;
}
.official
{
	background-color: #2eb82e; /* Blue-Green */
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 2px;
}
h2.center {
    text-align: center;
    color: black;
}
.signup
{
	display: block; margin: 0 auto;
	background-color: #ff6600;
	border:none;
	color:#000000;
	padding: 5px 15px;
	font-size: 18px;
	font-weight: 570;
	border-radius: 5px;
	
}
footer 
{
    padding: 2em;
    color: black;
    background-color: #cccccc;
    clear: left;
    text-align: center;
}
a
{
	color:#000000;
}
a:hover
{
	color:#000000;
}
</style>
<div class="jumbotron text-center">
 <div class="container text-center">
	<h1><b><font face="Alegreya Sans"><img src="icon2.png" height="70px"> Sandesh Vahak</font></b></h1>
 </div>    
</div>

<div class="container">
  <form class="form-horizontal" action="intermediate.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="employee">Employee ID</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="employee" name="employee"/>
      </div>
	  <div class="col-sm-4">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="password">Password</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="password" name="password"/>
      </div>
	  <div class="col-sm-4">
      </div>
    </div>
    <div class="form-group">        
    <div class="col-sm-4">
	</div>
	<div class="col-sm-4">
	<a href="#">Forgot password ?</a>
	</div>
	<div class="col-sm-4">
      </div>
	</div>
	<div class="form-group">
<div class="col-sm-4">
      </div>	
      <div class="col-sm-4">
        <button type="submit" class="login">Login</button>
	  </div>
	  <div class="col-sm-4">
      </div>
    </div>
  </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
<font face="Alegreya Sans" size="4">
Sandesh vahak</font></footer>
</body>
</html>
