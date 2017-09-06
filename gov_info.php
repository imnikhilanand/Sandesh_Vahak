<?php
session_start();
if(isset($_SESSION["user_admin_id_multi"])&&!empty($_SESSION["user_admin_id_multi"]))
{	
	$user_admin_id=$_SESSION["user_admin_id_multi"];
	$department=$_SESSION["department"];
}
else
{
	 header('Location: index.php');
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
		background-color:#f9f9f9;
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
  .navbar li a, .navbar .navbar-brand {
      color: #ffffff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #000000 !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  #publish
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
	</style>
</head>

<body>
<!--navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top" id="navi_bar">
  <div class="container-fluid">
    <div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><font face="Alegreya Sans">Sandesh Vahak</font></a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="info-news-admin.php"><font face="Alegreya Sans">News</font></a></li>
      <li><a href="queries.php"><font face="Alegreya Sans">Queries</font></a></li>
      <li  class="active"><a href="gov_info.php"><font face="Alegreya Sans">Announce</font></a></li>
      <li><a href="logout_admin.php"><font face="Alegreya Sans">Log out</font></a></li>
    </ul>
	</div>
  </div>
</nav>

<br>
<br>
<br>
<br>


<!-- body-->
<div class="container">
  <div class="row">
    <div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<div id="filter" style="border:none;float:center;">
			<div class="form-group" style="text-align:center">
				<label for="comment"><font face="Alegreya Sans" size="5">Proposal / Announcement</font></label><br><br>
				</div>
				<div style="text-align:left">
				<div>		
				<label for="sel1"><font face="Alegreya Sans">Ministry</font></label><br>
				<div>
				<input type="text" class="form-control" id="department" value="<?php echo$department;?>" disabled><br>
				</div>
				<label for="region"><font face="Alegreya Sans">Region</font></label><br>
				<div>
				<input type="text" class="form-control" id="region" placeholder="eg. National, Maharashtra, Gujrat"><br>
				</div>
				<label for="region"><font face="Alegreya Sans">Expected date</font></label><br>
				<div>
				<input type="date" class="form-control" id="expected" placeholder="YYYY-MM-DD"><br>
				</div>
				<label for="region"><font face="Alegreya Sans">Budget</font></label><br>
				<div>
				<input type="text" class="form-control" id="budget"><br>
				</div>
				<label for="comment"><font face="Alegreya Sans">Proposal / Announcement</font></label><br>
				<div>
				<textarea class="form-control" rows="10" id="news" style="resize:none;"></textarea>
				</div>
				<br></div>
				<button type="button" class="btn btn-default" id="publish" onclick="send_data()">Publish</button>
			</div>
		</div>
	</div>
	 <div class="col-sm-2">
	 </div>
</div></div>
<br>
<script>
function send_data()
{
	var department=document.getElementById("department").value;
	var news=document.getElementById("news").value;
	var region=document.getElementById("region").value;
	var budget=document.getElementById("budget").value;
	var expected=document.getElementById("expected").value;
	document.getElementById("publish").disabled=true;
	var xhttp = new XMLHttpRequest();
	if(department==null||news==null)
	{
	  alert("Please fill all the forms");
	}
	else
	{ 
		alert("entered");
		xhttp.onreadystatechange = function() 
		{
		if (this.readyState == 4 && this.status == 200) 
		{
			if (this.responseText=="okay")
			{
				alert("News have been broadcast");
				document.getElementById("publish").disabled=false;
			}
			else
			{
				alert(this.responseText);
			}
		}
		};
  xhttp.open("POST", "insert-news.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("n="+news+"&d="+department+"&r="+region+"&b="+budget+"&e="+expected);
  }
}
</script>
</body>
</html>
