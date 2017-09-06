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
$con1=mysqli_connect("localhost","root","","sandesh");
$con2=mysqli_connect("localhost","root","","sandesh_likes");
$male_o=0;$female_o=0;
$male_l=0;$female_l=0;
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
		$qry5="SELECT gender FROM sandesh.user WHERE id=$user_id";
		$rslt5=mysqli_query($con1,$qry5);
		if(mysqli_num_rows($rslt5)>0)
		{
			while($row2=mysqli_fetch_assoc($rslt5))
			{
				$gender=$row2["gender"];
				if($gender=="male")
				{
					$male_o=$male_o+1;
				}
				else if($gender=="female")
				{
					$female_o=$female_o+1;
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
		$qry6="SELECT gender FROM sandesh.user WHERE id=$user_id";
		$rslt6=mysqli_query($con1,$qry6);
		if(mysqli_num_rows($rslt6)>0)
		{
			while($row4=mysqli_fetch_assoc($rslt6))
			{
				$gender=$row4["gender"];
				if($gender=="male")
				{
					$male_l=$male_l+1;
				}
				else if($gender=="female")
				{
					$female_l=$female_l+1;
				}
			}
		}
	}
}
if(($male_l!=0)||($male_o!=0))
{
	$male_favour=$male_l/($male_l+$male_o)*240;
	$male_against=$male_o/($male_o+$male_l)*240;
}
else
{
	$male_favour=0;$male_against=0;
}
if(($female_l!=0)||($female_o!=0))
{
	$female_favour=$female_l/($female_o+$female_l)*240;
	$female_against=$female_o/($female_l+$female_o)*240;
}
else
{
	$female_favour=0;$female_against=0;
}
$male_favour_g=250-$male_favour;
$female_favour_g=250-$female_favour;
$male_against_g=250-$male_against;
$female_against_g=250-$female_against;
$downvote=mysqli_num_rows($rslt3);
$qry4="SELECT news,department,region,upvote,downvote,views FROM sandesh.news WHERE id='$news_id'";
$rslt4=mysqli_query($con1,$qry4);
$index=0;
if(($upvote!=0)||($downvote!=0))
{
	$one=($upvote/($upvote+$downvote))*240;
	$two=($downvote/($upvote+$downvote))*240;
}
else
{
	$one=0;$two=0;
}
$one_g=250-$one;
$two_g=250-$two;

if(mysqli_num_rows($rslt4)>0)
{
	while($row=mysqli_fetch_assoc($rslt4))
	{
			 $news=$row["news"];
			 
			 echo'<table class="news_data" style="width:100%;border:1px solid #66a3ff;" bgcolor="#ffffff" >
			 <tr style="border:1px solid #66a3ff;background:#66a3ff;"><td><font color="white" size="3">Gender wise analysis</font></td></tr>
			 <tr style="border:1px solid #66a3ff;background:#ffffff;"><td>
			 <table style="width:100%;">
			 <tr><td align="center" height="300">
			 <svg height="100%" width="100%">
			 <line x1="10%" y1="250" x2="90%" y2="250" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <line x1="10%" y1="2" x2="10%" y2="250" class="line_d" style="stroke:rgb(128,128,128);"/>
			 <rect x="25%" y="'.$one_g.'" width="5%" height="'.$one.'" style="fill:#ff6600;" />
			 <rect x="20%" y="'.$two_g.'" width="5%" height="'.$two.'" style="fill:#0066ff;" />
			 <rect x="45%" y="'.$male_favour_g.'" width="5%" height="'.$male_favour.'" style="fill:#0066ff;" />
			 <rect x="50%" y="'.$male_against_g.'" width="5%" height="'.$male_against.'" style="fill:#ff6600;" />
			 <rect x="70%" y="'.$female_favour_g.'" width="5%" height="'.$female_favour.'" style="fill:#0066ff;" />
			 <rect x="75%" y="'.$female_against_g.'" width="5%" height="'.$female_against.'" style="fill:#ff6600;" />
			 <text x="22.5%" y="280" font-size="10" fill="rgb(128,128,128)">All</text>
			 <text x="47.5%" y="280" font-size="10" fill="rgb(128,128,128)">Male</text>
			 <text x="72.5%" y="280" font-size="10" fill="rgb(128,128,128)">Female</text>
			 <line x1="9.5%" y1="10" x2="10.5%" y2="10" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <line x1="9.5%" y1="130" x2="10.5%" y2="130" class="line_d" style="stroke:rgb(128,128,128);stroke-width:1"/>
			 <text x="3%" y="260" font-size="10" fill="rgb(128,128,128)">0</text>
			 <text x="3%" y="135" font-size="10" fill="rgb(128,128,128)">50</text>
			 <text x="3%" y="15" font-size="10" fill="rgb(128,128,128)">100</text>
			 </svg></td></tr>
	         </table></td></tr>
			 </table>
			 <br>';
			 
	 }
}
?>
