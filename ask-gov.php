<?php
session_start();
if(isset($_SESSION["user_id_multi"])&&!empty($_SESSION["user_id_multi"]))
{	
	$user_id=$_SESSION["user_id_multi"];
}
else
{
	 header('Location: index.php');
}
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT name,mobile FROM sandesh.user WHERE id='$user_id'";
$rslt1=mysqli_query($con1,$qry1);
if(mysqli_num_rows($rslt1)>0)
{
	while($row1=mysqli_fetch_assoc($rslt1))
	{
		$name_view=$row1["name"];
		$phone_view=$row1["mobile"];
	}
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
      <li><a href="info.php"><font face="Alegreya Sans">Information</font></a></li>
      <li class="active"><a href="ask-gov.php"><font face="Alegreya Sans">Ask Goverment</font></a></li>
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


<!-- body-->
<div class="container">
  <div class="row">
    <div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<div id="filter" style="border:none;float:center;">
			
				<div class="form-group" style="text-align:center">
				<label for="comment"><font face="Alegreya Sans" size="5">Ask Government</font></label><br><br>
				</div>
				<label for="name"><font face="Alegreya Sans">Name</font></label><br>
				<div>   
				<input type="text" class="form-control" id="name" value="<?php echo$name_view;?>"><br>
				</div>
				<label for="phone"><font face="Alegreya Sans">Phone Number</font></label><br>
				<div>
				<input type="text" class="form-control" id="phone" value="<?php echo$phone_view;?>"><br>
				</div>
				<label for="address"><font face="Alegreya Sans">Address</font></label><br>
				<div>
				<input type="text" class="form-control" id="address"><br>
				</div>
				<div style="text-align:left">
				<div>		
				<label for="sel1"><font face="Alegreya Sans">Select ministry</font></label>
				<select class="form-control" id="department">
				<option>Ministry of Agriculture</option>
				<option>Indian Council of Agricultural Research (ICAR)</option>
				<option>Ministry of Chemical and Fertilizers</option>
				<option>Department of Chemicals and Petrochemicals</option>
				<option>Department of Fertilizers</option>
				<option>Ministry of Coal</option>
				<option>Ministry of Commerce and Industry</option>
				<option>Ministry of Corporate Affairs</option>
				<option>Ministry of Consumer Affairs, Food and Public Distribution</option>
				<option>Ministry of Culture</option>
				<option>Ministry of Defence</option>
				<option>Ministry of Earth Sciences (MoES)</option>
				<option>Ministry of Environment & Forests (MoEF)</option>
				<option>Ministry of External Affairs</option>
				<option>Ministry of Finance</option>
				<option>Ministry of Food Processing Industries (MOFPI)</option>
				<option>Ministry of Health & Family Welfare</option>
				<option>Ministry of Heavy Industries & Public Enterprises</option>
				<option>Ministry of Home Affairs (MHA)</option>
				<option>Ministry of Human Resource Development (MHRD)</option>
				<option>Ministry of Information and Broadcasting</option>
				<option>Ministry of Labour</option>
				<option>Ministry of Law and Justice</option>
				<option>Ministry of Mines</option>
				<option>Ministry of Minority Affairs</option>
				<option>Ministry of Development of North Eastern Region</option>
				<option>Ministry of Overseas Indian Affairs</option>
				<option>Ministry of Parliamentary Affairs</option>
				<option>Ministry of Personnel, Public Grievances and Pension</option>
				<option>Ministry of Petroleum and Natural Gas</option>
				<option>Ministry of Power</option>
				<option>Ministry of Railways</option>
				<option>Ministry of Rural Development</option>
				<option>Ministry of Science and Technology</option>
				<option>Ministry of Shipping, Road Transport and Highways</option>
				<option>Ministry of Road Transport & Highways</option>
				<option>Ministry of Shipping</option>
				<option>Ministry of Social Justice and Empowerment</option>
				<option>Ministry of Statistics and Programme Implementation</option>
				<option>Ministry of Steel</option>
				<option>Ministry of Textiles</option>
				<option>Ministry of Tourism</option>
				<option>Ministry of Tribal Affairs</option>
				<option>Ministry of Urban Development</option>
				<option>Ministry of Water Resources</option>
				</select><br>
				
				<label for="comment"><font face="Alegreya Sans">Complaint</font></label><br>
				<textarea class="form-control" rows="10" id="ask" style="resize:none;"></textarea>
				<br></div>
				<button type="button" id="ask_button" class="btn btn-default" onclick="send_data()"> Ask</button>
			
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
	var name=document.getElementById("name").value;
	var address=document.getElementById("address").value;
	var phone=document.getElementById("phone").value;
	var department=document.getElementById("department").value;
	var ask=document.getElementById("ask").value;
	var xhttp = new XMLHttpRequest();
	if(name==null||address==null||phone==null||department==null||ask==null)
	{
		alert("Please fill all the forms");
	}
	else
	{ 
		xhttp.onreadystatechange = function() 
		{
		if (this.readyState == 4 && this.status == 200) 
		{
			if (this.responseText=="okay")
			{
				alert("Your message has been sent successfully !");
			}
			else
			{
				alert(this.responseText);
			}
		}
		};
  xhttp.open("POST", "insert-query.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("a="+ask+"&d="+department+"&r="+address+"&p="+phone+"&n="+name);
  }
}
</script>
</body>
</html>
