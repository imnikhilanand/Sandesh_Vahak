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
$con1=mysqli_connect("localhost","root","","sandesh");
$qry1="SELECT id,userquery,department,name,phone,address,phase FROM sandesh.ask WHERE user='$user_id' ORDER BY id DESC";
$rslt1=mysqli_query($con1,$qry1);
$index=0;
$index2=$index*2;
$index3=$index*3;
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
			 <tr><td align="center" height="70">
			 <svg height="100%" width="100%">
			 <line x1="10%" y1="20" x2="50%" y2="20" class="line_d" style="stroke:rgb(204,204,204);stroke-width:2"/>
			 <line x1="50%" y1="20" x2="90%" y2="20" class="line_d" style="stroke:rgb(204,204,204);stroke-width:2"/>
             <circle class="circle_d" cx="10%" cy="20" r="10" fill="#cccccc"/>
			 <circle class="circle_d" cx="50%" cy="20" r="10" fill="#cccccc" />
             <circle class="circle_d" cx="90%" cy="20" r="10" fill="#cccccc" />
             <circle cx="10%" cy="20" r="7" fill="#ffffff"/>
			 <circle cx="50%" cy="20" r="7" fill="#ffffff" />
             <circle cx="90%" cy="20" r="7" fill="#ffffff" />
             <text x="8%" y="45" font-size="10" fill="rgb(128,128,128)">Viewed</text>
			 <text x="48%" y="45" font-size="10" fill="rgb(128,128,128)">Process</text>
			 <text x="88%" y="45" font-size="10" fill="rgb(128,128,128)">Finished</text>
			 </svg></td></tr>
	         </table></td></tr>
			 <tr style="display:none;" class="people_views"><td>
			 <span style="display:table-cell;width:100%;"><input type="text" class="post_view" style="width:100%"/></span>
			 <div class="view_people_int"></div>
			 </td></tr>
			 </table>
			 <br>';
			 if($phase=="1")
			 {
				 echo "<script>
						document.getElementsByClassName('circle_d')[".$index3."].style.fill='#009900';
				       </script>";
			 }
			 else if($phase=="2")
			 {
				 echo "<script>
			         document.getElementsByClassName('circle_d')[".$index3."].style.fill='#009900';
				     document.getElementsByClassName('circle_d')[".($index3+1)."].style.fill='#009900';
				     document.getElementsByClassName('line_d')[".$index2."].style.stroke='#009900';
					 </script>";
			 }
			 else if($phase=="3")
			 {
				 echo "<script>
			         document.getElementsByClassName('circle_d')[".$index3."].style.fill='#009900';
				     document.getElementsByClassName('circle_d')[".($index3+1)."].style.fill='#009900';
				     document.getElementsByClassName('circle_d')[".($index3+2)."].style.fill='#009900';
				     document.getElementsByClassName('line_d')[".$index2."].style.stroke='#009900';
				     document.getElementsByClassName('line_d')[".($index2+1)."].style.stroke='#009900';
				     </script>";
			 }
			 $index=$index+1;
			 $index2=$index*2;
			 $index3=$index*3;

			 }
}
?>
