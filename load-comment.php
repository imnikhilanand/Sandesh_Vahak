<?php
$news_id=$_POST["r"];
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
$con1=mysqli_connect("localhost","root","","sandesh_views");
$con2=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT user_id,views FROM sandesh_views.$news_id";
$rslt1=mysqli_query($con1,$qry1);
if(mysqli_num_rows($rslt1)>0)
{
	while($row1=mysqli_fetch_assoc($rslt1))
	{
		$user_id_v=$row1["user_id"];
		$views=$row1["views"];
		$qry2="SELECT name,location FROM sandesh.user WHERE id='$user_id_v'";
		$rslt2=mysqli_query($con2,$qry2);
		if(mysqli_num_rows($rslt2)>0)
		{
			while($row2=mysqli_fetch_assoc($rslt2))
			{
				$name=$row2["name"];
				$location=$row2["location"];
				echo '<table class="views_data" style="width:100%;border:none;" bgcolor="#ffffff" >
					  <tr style="none;background:#ffffff;"><td style="width:100%;border:none;padding:1px"><b>'.$name.' - '.$location.'</b></td></tr>
					  <tr style="none;background:#ffffff;"><td style="width:100%;border:none;padding:1px">'.$views.'</td></tr>
					  </table>';
			}
		}
	}
}
?>