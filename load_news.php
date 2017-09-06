<?php
session_start();
$user_id=$_SESSION["user_id_multi"];
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
$qry1="SELECT id,news,department,region,upvote,downvote,views,date,expected_date,budget FROM sandesh.news ORDER BY id DESC";
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
			 <tr><td align="center"><font color="#808080">'.$upvote.' liked</font></td><td align="center"><font color="#808080">'.$downvote.' disliked</font></td><td align="center"><font color="#808080">'.$views.' reacted<font color="#808080"></td><td align="center"><font color="#808080">Analyze</font></td></tr>
	         <tr><td align="center"><button class="upvote" type="button" style="none" onclick="upvote('.$index.','.$news_id.')"><i class="fa fa-thumbs-up" style="font-size:24px;color:#737373"></i></button></td><td align="center"><button class="downvote" type="button" onclick="downvote('.$index.','.$news_id.')"><i class="fa fa-thumbs-down" style="font-size:24px;color:#737373"></i></button></td><td align="center"><button type="button" class="views" onclick="view('.$index.','.$news_id.')"><i class="fa fa-pencil" style="font-size:24px;color:#737373"></i></button></td><td align="center"><a href="analyze.php?key='.$news_id.'"><i class="fa fa-bar-chart" style="font-size:24px;color:#737373"></i></a></td></tr>
	         </table>
			 </td></tr>
			 <tr style="display:none;background:#ffffff;" class="people_views"><td width="100%">
			 <table width="100%">
			 <tr><td width="100%"><div class="view_here"></div></td></tr>
			 <tr><td width="100%"><input type="text" class="post_view" style="width:100%"/></td><td><button onclick="submit('.$index.','.$news_id.')" class="post_btn">Post</button></td></tr></table>
			 <div class="view_people_int"></div>
			 </td></tr>
			 </table>
			 <br>';
			 $qry2="SELECT opinion FROM sandesh_likes.$news_id WHERE user_id='$user_id'";
			 $rslt2=mysqli_query($con2,$qry2);
			 if(mysqli_num_rows($rslt2)>0)
			 {
				 while($row2=mysqli_fetch_assoc($rslt2))
				 {
					 $opinion=$row2["opinion"];
				 }
				 if($opinion=="0")
				 {
					 echo"<script>
						  document.getElementsByClassName('fa fa-thumbs-down')[".$index."].style.color='#ff0000';
						  </script>";
				 }
				 else if($opinion=="1")
				 { 	
					echo"<script>
						  document.getElementsByClassName('fa fa-thumbs-up')[".$index."].style.color='#00cc00';
						  </script>";
				 }
			 }
		$check=1;	 
		$index=$index+1;
	}
}
if($check==0)
{
	echo'<table style="width:100%;border:1px solid #ff3300;" bgcolor="#ffffff" >
	     <tr style="border:1px solid #ff3300;background:#ff3300;"><td><font color="white" size="3">Sorry there is no news or announcement by Government !</font></td></tr>
		 </table>';
	echo "<br>";
}
?>
