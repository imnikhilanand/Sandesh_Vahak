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
$check=0;		
$con1=mysqli_connect("localhost","root","","sandesh");
$con2=mysqli_connect("localhost","root","","sandesh_likes");
$qry1="SELECT id,news,department,region,upvote,downvote,views,date,expected_date,budget FROM sandesh.news WHERE department='$department' ORDER BY id DESC";
$rslt1=mysqli_query($con1,$qry1);
$index=0;
if(mysqli_num_rows($rslt1)>0)
{
	while($row=mysqli_fetch_assoc($rslt1))
	{
		$news_id=$row["id"];
		$news=$row["news"];
		$department=$row["department"];
		$region=$row["region"];
		$upvote=$row["upvote"];
		$downvote=$row["downvote"];
		$views=$row["views"];
		$expected_date=$row["expected_date"];
		$budget=$row["budget"];
		echo'<table class="news_data" style="width:100%;border:1px solid #66a3ff;" bgcolor="#ffffff" >
			 <tr style="border:1px solid #66a3ff;background:#66a3ff;"><td><font color="white" size="3">'.$department.'</font></td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>'.$news.'</td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table>
			 <tr><td style="padding:5px"><font size="2"><b>Region</b></font></td><td style="padding:5px"><font size="2">'.$region.'</font></td>
			 <tr><td style="padding:5px"><font size="2"><b>Budget</b></font></td><td style="padding:5px"><font size="2">'.$budget.'</font></td></tr>
			 <tr><td style="padding:5px"><font size="2"><b>Expected date</b></font></td><td style="padding:5px"><font size="2">'.$expected_date.'</font></td>
			 </tr></table>
			 </td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table style="width:100%;">
			 <tr><td align="center"><font color="#808080">'.$upvote.' liked</font></td><td align="center"><font color="#808080">'.$downvote.' disliked</font></td><td align="center"><font color="#808080"><button class="button" onclick="view('.$index.','.$news_id.')">'.$views.' reacted</button><font color="#808080"></td><td align="center"><font color="#808080"><a href="analyze_admin.php?key='.$news_id.'">Analyze</a></font></td></tr>
	         </table>
			 </td></tr>
			 <tr style="display:none;background:#ffffff;" class="people_views"><td width="100%">
			 <table width="100%">
			 <tr><td width="100%"><div class="view_here"></div></td></tr>
			 <div class="view_people_int"></div>
			 </td></tr>
			 </table><br>';
			 
		$check=1;	 
		$index=$index+1;
	}
}
if($check==0)
{
	echo'<table style="width:100%;border:1px solid #ff3300;" bgcolor="#ffffff" >
	     <tr style="border:1px solid #ff3300;background:#ff3300;"><td><font color="white" size="3">Sorry there is no announcement related to your ministry !</font></td></tr>
		 </table>';
	echo "<br>";
}
?>
