<?php
$news_id=$_POST["data"];
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
$age_18_30_o=0;
$age_30_40_o=0;
$age_40_50_o=0;
$age_50_60_o=0;
$age_60_more_o=0;
$age_18_30_l=0;
$age_30_40_l=0;
$age_40_50_l=0;
$age_50_60_l=0;
$age_60_more_l=0;
$con1=mysqli_connect("localhost","root","","sandesh");
$con2=mysqli_connect("localhost","root","","sandesh_likes");
$qry1="SELECT user_id,opinion FROM sandesh_likes.$news_id";
$rslt1=mysqli_query($con2,$qry1);
$total_likes=mysqli_num_rows($rslt1);
$qry2="SELECT user_id,opinion FROM sandesh_likes.$news_id WHERE opinion='0'";
$rslt2=mysqli_query($con2,$qry2);
if(mysqli_num_rows($rslt2)>0)
{
	while($row1=mysqli_fetch_assoc($rslt2))
	{
		$user_id=$row1["user_id"];
		$qry5="SELECT dob FROM sandesh.user WHERE id=$user_id";
		$rslt5=mysqli_query($con1,$qry5);
		if(mysqli_num_rows($rslt5)>0)
		{
			while($row2=mysqli_fetch_assoc($rslt5))
			{
				$dob=$row2["dob"];
				$age=curr_time($dob);
				if((17<$age)&&($age<=30))
				{
					$age_18_30_o=$age_18_30_o+1;
				}
				else if((30<$age)&&($age<=40))
				{
					$age_30_40_o=$age_30_40_o+1;
				}
				else if((40<$age)&&($age<=50))
				{
					$age_40_50_o=$age_40_50_o+1;
				}
				else if((50<$age)&&($age<=60))
				{
					$age_50_60_o=$age_50_60_o+1;
				}
				else
				{
					$age_60_more_o=$age_60_more_o+1;
				}
			}
		}
	}
}
$upvote=mysqli_num_rows($rslt2);
$qry3="SELECT user_id,opinion FROM sandesh_likes.$news_id WHERE opinion='1'";
$rslt3=mysqli_query($con2,$qry3);
if(mysqli_num_rows($rslt3)>0)
{
	while($row3=mysqli_fetch_assoc($rslt3))
	{
		$user_id=$row3["user_id"];
		$qry6="SELECT dob FROM sandesh.user WHERE id=$user_id";
		$rslt6=mysqli_query($con1,$qry6);
		if(mysqli_num_rows($rslt6)>0)
		{
			while($row4=mysqli_fetch_assoc($rslt6))
			{
				$dob=$row4["dob"];
				$age=curr_time($dob);
				if((17<$age)&&($age<=30))
				{
					$age_18_30_l=$age_18_30_l+1;
				}
				else if((30<$age)&&($age<=40))
				{
					$age_30_40_l=$age_30_40_l+1;
				}
				else if((40<$age)&&($age<=50))
				{
					$age_40_50_l=$age_40_50_l+1;
				}
				else if((50<$age)&&($age<=60))
				{
					$age_50_60_l=$age_50_60_l+1;
				}
				else
				{
					$age_60_more_l=$age_60_more_l+1;
				}
			}
		}
	}
}
if(($age_18_30_o!=0)||($age_18_30_l!=0))
{	
	$age_18_30_against=$age_18_30_o/($age_18_30_l+$age_18_30_o)*240;
	$age_18_30_favour=$age_18_30_l/($age_18_30_l+$age_18_30_o)*240;
}
else
{
	$age_18_30_favour=0;
	$age_18_30_against=0;	
}
if(($age_30_40_o!=0)||($age_30_40_l!=0))
{
	$age_30_40_against=$age_30_40_o/($age_30_40_l+$age_30_40_o)*240;
	$age_30_40_favour=$age_30_40_l/($age_30_40_l+$age_30_40_o)*240;
}
else
{
	$age_30_40_against=0;
	$age_30_40_favour=0;
}
if(($age_40_50_o!=0)||($age_40_50_l!=0))
{
	$age_40_50_against=$age_40_50_o/($age_40_50_l+$age_40_50_o)*240;
	$age_40_50_favour=$age_40_50_l/($age_40_50_l+$age_40_50_o)*240;
}
else
{
	$age_40_50_against=0;
	$age_40_50_favour=0;
}
if(($age_50_60_o!=0)||($age_50_60_l!=0))
{
	$age_50_60_against=$age_50_60_o/($age_50_60_l+$age_50_60_o)*240;
	$age_50_60_favour=$age_50_60_l/($age_50_60_l+$age_50_60_o)*240;
}
else
{
	$age_50_60_against=0;
	$age_50_60_favour=0;
}
if(($age_60_more_o!=0)||($age_60_more_l!=0))
{	
	$age_60_more_against=$age_60_more_o/($age_60_more_l+$age_60_more_o)*240;
	$age_60_more_favour=$age_60_more_l/($age_60_more_l+$age_60_more_o)*240;
}
else
{
	$age_60_more_against=0;
	$age_60_more_favour=0;
}
$age_18_30_o_g=250-$age_18_30_against;
$age_30_40_o_g=250-$age_30_40_against;
$age_40_50_o_g=250-$age_40_50_against;
$age_50_60_o_g=250-$age_50_60_against;
$age_60_more_o_g=250-$age_60_more_against;
$age_18_30_l_g=250-$age_18_30_favour;
$age_30_40_l_g=250-$age_30_40_favour;
$age_40_50_l_g=250-$age_40_50_favour;
$age_50_60_l_g=250-$age_50_60_favour;
$age_60_more_l_g=250-$age_60_more_favour;

			 echo'<table class="news_data" style="width:100%;border:1px solid #66a3ff;" bgcolor="#ffffff" >
			 <tr style="border:1px solid #66a3ff;background:#66a3ff;"><td><font color="white" size="3">Age wise analysis </font></td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table style="width:100%;">
			 <tr><td align="center" height="300">
			 <svg height="100%" width="100%">
			 <line x1="10%" y1="250" x2="90%" y2="250" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <line x1="10%" y1="2" x2="10%" y2="250" class="line_d" style="stroke:rgb(128,128,128);"/>
			 <rect x="15%" y="'.$age_18_30_l_g.'" width="5%" height="'.$age_18_30_favour.'" style="fill:#0066ff;" />
			 <rect x="20%" y="'.$age_18_30_o_g.'" width="5%" height="'.$age_18_30_against.'" style="fill:#ff6600;" />
			 <rect x="30%" y="'.$age_30_40_l_g.'" width="5%" height="'.$age_30_40_favour.'" style="fill:#0066ff;" />
			 <rect x="35%" y="'.$age_30_40_o_g.'" width="5%" height="'.$age_30_40_against.'" style="fill:#ff6600;" />
			 <rect x="45%" y="'.$age_40_50_l_g.'" width="5%" height="'.$age_40_50_favour.'" style="fill:#0066ff;" />
			 <rect x="50%" y="'.$age_40_50_o_g.'" width="5%" height="'.$age_40_50_against.'" style="fill:#ff6600;" />
			 <rect x="60%" y="'.$age_50_60_l_g.'" width="5%" height="'.$age_50_60_favour.'" style="fill:#0066ff;" />
			 <rect x="65%" y="'.$age_50_60_o_g.'" width="5%" height="'.$age_50_60_against.'" style="fill:#ff6600;" />
			 <rect x="75%" y="'.$age_60_more_l_g.'" width="5%" height="'.$age_60_more_favour.'" style="fill:#0066ff;" />
			 <rect x="80%" y="'.$age_60_more_o_g.'" width="5%" height="'.$age_60_more_against.'" style="fill:#ff6600;" />
			 <text x="17.5%" y="280" font-size="10" fill="rgb(128,128,128)">18-30</text>
			 <text x="32.5%" y="280" font-size="10" fill="rgb(128,128,128)">30-40</text>
			 <text x="47.5%" y="280" font-size="10" fill="rgb(128,128,128)">40-50</text>
			 <text x="62.5%" y="280" font-size="10" fill="rgb(128,128,128)">50-60</text>
			 <text x="78.5%" y="280" font-size="10" fill="rgb(128,128,128)">60 - more</text>
			 <line x1="9.5%" y1="10" x2="10.5%" y2="10" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <line x1="9.5%" y1="130" x2="10.5%" y2="130" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <text x="3%" y="260" font-size="10" fill="rgb(128,128,128)">0</text>
			 <text x="3%" y="135" font-size="10" fill="rgb(128,128,128)">50</text>
			 <text x="3%" y="15" font-size="10" fill="rgb(128,128,128)">100</text>
			 </svg></td></tr>
	         </table></td></tr>
			 <tr style="display:none;" class="people_views"><td>
			 <span style="display:table-cell;width:100%;"><input type="text" class="post_view" style="width:100%"/></span>
			 <div class="view_people_int"></div>
			 </td></tr>
			 </table>
			 <br>';
	
function curr_time($date_prev)
{
$date_curr=date("Y-m-d H:i:s");
$time_diff=round((strtotime($date_curr) - strtotime($date_prev)) /60);
return intval($time_diff/525600);
}
?>
