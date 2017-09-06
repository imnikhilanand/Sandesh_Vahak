<?php
session_start();
if(isset($_SESSION["user_id_multi"])&&!empty($_SESSION["user_id_multi"]))
{	
	$user_id=$_SESSION["user_id_multi"];
}
else
{
	 header('Location: index.php');
}?>
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
  .post_btn{
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
      <li class="active"><a href="info.php"><font face="Alegreya Sans">Information</font></a></li>
      <li><a href="ask-gov.php"><font face="Alegreya Sans">Ask Goverment</font></a></li>
      <li><a href="track-queries.php"><font face="Alegreya Sans">Dashboard</font></a></li>
      <li><a href="logout.php"><font face="Alegreya Sans">Log out</font></a></li>
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
    	$("#news_content").load("load_news.php");
});
function upvote(index,article_id){
		var c=document.getElementsByClassName("fa fa-thumbs-up")[index].style.color;
		var d=document.getElementsByClassName("fa fa-thumbs-down")[index].style.color;
		if(c=="rgb(115, 115, 115)")
		{
			document.getElementsByClassName("fa fa-thumbs-up")[index].style.color	="#00cc00";
			if(d=="rgb(255, 0, 0)")
			{
				document.getElementsByClassName("fa fa-thumbs-down")[index].style.color	="#737373";
			}
		}
		else
		{
			document.getElementsByClassName("fa fa-thumbs-up")[index].style.color	="#737373";
		}
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		if (this.responseText=="okay")
		{
		
		}
		}
		};
		xhttp.open("POST", "increment-like.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("a="+article_id);
}
function upvote_ajax(rank)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		if (this.responseText=="okay")
		{
		
		}
		}
  };
  xhttp.open("POST", "increment_like.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("a="+article_id);
}

function downvote(index,article_id){
		var c=document.getElementsByClassName("fa fa-thumbs-down")[index].style.color;
		var d=document.getElementsByClassName("fa fa-thumbs-down")[index].style.color;
		if(c=="rgb(115, 115, 115)")
		{
			document.getElementsByClassName("fa fa-thumbs-down")[index].style.color	="#ff0000";
			if(d=="rgb(115, 115, 115)")
			{
				document.getElementsByClassName("fa fa-thumbs-up")[index].style.color	="#737373";
			}
		}
		else
		{
			document.getElementsByClassName("fa fa-thumbs-down")[index].style.color	="#737373";
		}
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		if (this.responseText=="okay")
		{
		
		}
		}
		};
		xhttp.open("POST", "decrement-like.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("a="+article_id);
}
function view(index,ref){
		var x=document.getElementsByClassName("people_views")[index].style.display;
		if(x=="none")
		{
			document.getElementsByClassName("people_views")[index].style.display="table-row";
			load_comment(index,ref);
			
		}
		else
		{
			document.getElementsByClassName("people_views")[index].style.display="none";
		}
}
function submit(index,ref){
		var x=document.getElementsByClassName("post_view")[index].value;
		if(x=="")
		alert("Write Something !");
		else
		{
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			if (this.responseText=="okay")
			{
				alert("Comment have been posted");
				document.getElementsByClassName("post_view")[index].value="";
			}
			}
			};
			xhttp.open("POST", "insert-comment.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("a="+x+"&r="+ref);
		}
}
function load_comment(index,ref){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementsByClassName("view_here")[index].innerHTML=this.responseText;
			}
			};
			xhttp.open("POST", "load-comment.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("r="+ref);
}
</script>
	
</body>
</html>	