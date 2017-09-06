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
  #ask_button
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
      <li class="active"><a href="queries.php"><font face="Alegreya Sans">Queries</font></a></li>
      <li><a href="gov_info.php" ><font face="Alegreya Sans">Announce</font></a></li>
      <li><a href="logout_admin.php"><font face="Alegreya Sans">Log out</font></a></li>
    </ul>
	</div>
  </div>
</nav>
<br>
<br>
<br>
<br>

<!--body-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" style="background-color:#f9f9f9;">
	</div>
	 <div class="col-sm-8" style="background-color:#f9f9f9;">
		<div id="content" style="border:none;">
		<div id="news_content">
		</div>		
		</div>
	</div>
  </div>
</div><br>

<!--footer-->
<script>
$(document).ready(function(){
    	$("#news_content").load("load-queries.php");
});
function update_phase(index,query){
		var m="0";
		var k=index%3;
		if(k=="0")
		{
			box="1";
			document.getElementsByClassName('checkbox')[index].disabled=true;
		}
		else if(k=="1")
		{
			var x=document.getElementsByClassName('checkbox')[index-1].checked;
		    box="2";
			if(x!==true)
			{
				alert("Complete step 1");
				document.getElementsByClassName('checkbox')[index].checked=false;
				m=1;
			}
			else
			{
				document.getElementsByClassName('checkbox')[index].disabled=true;
			}
		}
		else if(k=="2")
		{
			var x=document.getElementsByClassName('checkbox')[index-1].checked;
		    var y=document.getElementsByClassName('checkbox')[index-2].checked;
		    box="3";
			if(x!==true)
			{
				alert("Complete step 2 first");
				document.getElementsByClassName('checkbox')[index].checked=false;
				m=1;
			}
			else if(y!==true)
			{
				alert("Complete step 1 first");
				document.getElementsByClassName('checkbox')[index].checked=false;
				m=1;
			}
			else
			{
				document.getElementsByClassName('checkbox')[index].disabled=true;
			}
		}
		if(m=="0")
		{
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			if (this.responseText=="okay")
			{
				alert("Updated Successfully");
			}
			}
			};
			xhttp.open("POST", "update-phase.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("b="+box+"&q="+query);
		}
}

</script>
	
</body>
</html>	