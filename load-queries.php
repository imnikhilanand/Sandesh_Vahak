<?php
session_start();
$user_admin_id=$_SESSION["user_admin_id_multi"];
$department=$_SESSION["department"];
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
';
echo '<style>
		table {
		border-collapse: collapse;
		border-spacing: 2px;
		}
		td{
			padding:10px;
		}
		.upvote,.downvote,.views{
			 background-color: #ffffff;
			 border: none;
		}
		</style>';
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT id,userquery,department,name,phone,address,phase FROM sandesh.ask WHERE department='$department' ORDER BY id DESC";
$rslt1=mysqli_query($con1,$qry1);
$index=0;
$index2=0;
$check=0;
if(mysqli_num_rows($rslt1)>0)
{
	while($row=mysqli_fetch_assoc($rslt1))
	{
		$id=$row["id"];
		$userquery=$row["userquery"];
		$department=$row["department"];
		$address=$row["address"];
		$phone=$row["phone"];
		$name=$row["name"];
		$phase=$row["phase"];
		if($phase!="3")
		{
			echo'<table class="news_data" style="width:100%;border:1px solid #66a3ff;" bgcolor="#ffffff" >
			 <tr style="border:1px solid #66a3ff;background:#66a3ff;"><td><font color="white" size="3">'.$department.'</font></td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>'.$userquery.'</td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table>
			 <tr><td style="padding:5px"><font size="2"><b>Name</b></font></td><td style="padding:5px"><font size="2">'.$name.'</font></td>
			 <tr><td style="padding:5px"><font size="2"><b>Phone</b></font></td><td style="padding:5px"><font size="2">'.$phone.'</font></td></tr>
			 <tr><td style="padding:5px"><font size="2"><b>Address</b></font></td><td style="padding:5px"><font size="2">'.$address.'</font></td>
			 </tr></table>
			 </td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table style="width:100%;">
			 <tr><td align="center"><input type="checkbox" class="checkbox" onclick="update_phase('.$index2.','.$id.')" name="1" value="1">Viewed</td><td align="center"><input type="checkbox" class="checkbox" name="2" value="2" onclick="update_phase('.($index2+1).','.$id.')"> Under Proccess</td><td align="center"><input type="checkbox" class="checkbox" name="3" value="3" onclick="update_phase('.($index2+2).','.$id.')"> Finished</td></tr>
	         </table>
			 </td></tr>
			 <tr style="display:none;" class="people_views"><td>
			 <span style="display:table-cell;width:100%;"><input type="text" class="post_view" style="width:100%"/></span>
			 <div class="view_people_int"></div>
			 </td></tr>
			 </table>
			 <br>';
			 $check=1;
			 if($phase>"0")
			 {
				 echo "<script>
			     var i;
			     for(i=".$index2.";i<".($phase+$index2).";i++)
				 {
				     document.getElementsByClassName('checkbox')[i].checked=true;
				     document.getElementsByClassName('checkbox')[i].disabled=true;
			     }
			     </script>";
			 }
			 $index=$index+1;
			 $index2=$index2+3;
			 }
}
}
if($check==0)
{
	echo'<table style="width:100%;border:1px solid #ff3300;" bgcolor="#ffffff" >
	     <tr style="border:1px solid #ff3300;background:#ff3300;"><td><font color="white" size="3">Sorry there is no new Query !</font></td></tr>
		 </table>';
	echo "<br>";
}
?>
