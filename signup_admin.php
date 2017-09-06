<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>sandesh Vahak</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<style>
.jumbotron 
{
 background-color: #fff;
 color: #66a3ff;
 padding: 30px 25px;
 font-family: arial, sans-serif;
}
#next{
	background-color: #3385ff; /* Blue-Green */
    border: none;
    color: white;
    padding: 5px 18px;
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
<script>
function checkusername() 
{
  var str1=document.getElementById("username").value;
  document.getElementById("2").src = "design/89.gif"; 
  if (str1=='') 
  {
    document.getElementById('2').innerHTML = 'oyehoye';
    return;
  } 
  else 
  {
   if (window.XMLHttpRequest) 
    {
      xmlhttp=new XMLHttpRequest();
    } 
   else 
    {
      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange=function() 
	{
      if(this.readyState==4&&this.status==200) 
	  {
       if(this.responseText=="okay")
	   {
		document.getElementById('2').src="design/right.png";
        document.getElementById('next').disabled=false;
	   }
	   else
       {
	   document.getElementById('2').src="design/wrong.png";
       document.getElementById('next').disabled=true;   
	   }
	  }
    };
   xmlhttp.open('GET','checkusername.php?c='+str1,true);
   xmlhttp.send();
}
}

function checkemail() 
{
  var str2=document.getElementById("email").value;
  document.getElementById("3").src = "design/89.gif"; 
  if (str2=='') 
  {
    document.getElementById('3').innerHTML = '';
    return;
  } 
  else 
  {
   if (window.XMLHttpRequest) 
    {
      xmlhttp=new XMLHttpRequest();
    } 
   else 
    {
      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange=function() 
	{
      if(this.readyState==4&&this.status==200) 
	  {
       if(this.responseText=="okay")
	   {
		document.getElementById('3').src="design/right.png";
        document.getElementById('next').disabled=false;
	   }
	   else
       {
	   document.getElementById('3').src="design/wrong.png";
       document.getElementById('next').disabled=true;   
	   }
	  }
    };
   xmlhttp.open('GET','checkemail.php?c='+str2,true);
   xmlhttp.send();
}
}


function checkDetails()
{
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var username=document.getElementById("username").value;
	var password=document.getElementById("password").value;
	var recheck_password=document.getElementById("recheck_password").value;
	var dob=document.getElementById("dob").value;
	var institute=document.getElementById("institute").value;
	
	if(name=="")
	{
		alert("Name must be filled");
		return false;
	}
	else if(username=="")
	{
		alert("Username must be filled");
		return false;
	}
    else if(email=="")
	{
		alert("Email must be filled");
		return false;
	}
    else if(password=="")
	{
		alert("Password must be filled");
		return false;
	}
    else if(recheck_password=="")
	{
		alert("Recheck password must be filled");
		return false;
	}
    else if(dob=="")
	{
		alert("Date of birth must be filled");
		return false;
	}
    else
	{
		return true;
	}		
}
</script>
</head>
</head>
<body>

<div class="jumbotron">
 <div class="container text-center">
<h1>Sandesh Vahak</h1></div>    
</div>

<div class="container">
  <form action="signup2_admin.php" class="form-horizontal" name="signup_form" method="post" onsubmit="return checkDetails()">
    <div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="name">Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
    </div>
    </div>
	<div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="employee">Employee ID</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="employee" name="employee" onblur="checkmobile()" required>
      </div><img id="2" width="26" height="26">
    </div>
    </div>
    <div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="aadhar">Aadhar Number</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="aadhar" name="aadhar" onblur="checkaadhar()" required>
      </div><img id="3" width="26" height="26">
    </div>
    </div>
    <div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="password">Password</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
    </div>
    </div>
    <div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="password">Re-enter Password</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="recheck_password" name="recheck_password" onblur="recheckPassword()" required>
      </div><img id="1" width="26" height="26">
    </div>
    </div>
    <script>
	function recheckPassword()
    { 
	var password1 = document.getElementById("recheck_password").value;
	var password2 = document.getElementById("password").value;
	if(password2!=password1)
	{
		document.getElementById("1").src = "design/wrong.png";
		document.getElementById("dob").disabled=true;
		document.getElementById("institute").disabled=true;
	}
	else
	{
		document.getElementById("1").src = "design/right.png";
		document.getElementById("dob").disabled=false;
		document.getElementById("institute").disabled=false;
	}
    }
	</script>
	<div class="row">
	<div class="form-group">
      <label class="control-label col-sm-4" for="department">Select ministry</label>
				<div  class="col-sm-4">
				<select class="form-control" name="department" id="department">
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
		</div>
    </div>
    </div>
    <div class="form-group">        
      <div class="row">
	  <div class="col-sm-offset-4 col-sm-4">
        <button type="submit" value="submit" class="btn btn-primary pull-right btn-sm" id="next">Sign Up</button>
      </div>
    </div>
  </div>
  </form>
</div>
</body>
</html>
