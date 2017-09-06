<?php
session_start();
$news_id=$_GET["key"];
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
      <a class="navbar-brand" href="index.php"><font face="alike">Sandesh Vahak</font></a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="info-news-admin.php">News</a></li>
      <li><a href="queries.php">Queries</a></li>
      <li><a href="gov_info.php" >Announce</a></li>
      <li><a href="logout_admin.php">Log out</a></li>
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
		<div id="graphs" style="border:none;background:white;">
		<div id="indicate">
    <table class="news_data" style="width:100%;border:1px solid #66a3ff;" bgcolor="#ffffff" >
       <tr style="border:1px solid #66a3ff;background:#66a3ff;"><td><font color="white" size="3">Indiacation </font></td></tr>
       <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
       <table style="width:100%;">
          <tr><td align="center" height="80">
          <svg height="100%" width="100%">
          <rect x="20%" y="25" width="5%" height="25" style="fill:#0066ff;" />
          <rect x="65%" y="25" width="5%" height="25" style="fill:#ff6600;" />
          <text x="27.5%" y="44" font-size="15" fill="rgb(128,128,128)">Favour</text>
          <text x="72.5%" y="44" font-size="15" fill="rgb(128,128,128)">Against</text>
          </svg></td></tr>
       </table></td></tr>
    </table>
       <br>
    </div>
    <div id="gender">
		</div>
		<div id="agegroups">
		</div>	
		<div id="location">
		</div>
		</div>
		</div>
	</div>
	<div class="col-sm-2" style="background-color:#f9f9f9;">
	</div>
   </div>
</div><br>

<!--functions-->
<script>
$(document).ready(function(){
    	$("#gender").load("load-gender.php",{'data':<?php echo$news_id;?>});
});
$(document).ready(function(){
    	$("#agegroups").load("load-age.php",{'data':<?php echo$news_id;?>});
});
</script>
	
</body>
</html>	