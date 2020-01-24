<html>
   
  <head>
 <title></title>
 <link href="CSS/style.css" rel="stylesheet" type="text/css"></link>

   
   <body>

<?php
include('session.php');
?>  
      <h1 align="center">Welcome <?php echo $user_id; ?></h1> 
      <h2 style="margin-left: 80%"><a href = "logout.php">Sign Out</a></h2>
   

<?php

      $sql="select project_id 'PROJECT NO',user_id 'USER_ID',ARTWORK_NAME 'ARTWORK NAME', SELECT_TYPE 'TYPE',DIVISION_TYPE 'DIVISION',(CASE  WHEN STATUS=1 then 'Rejected by VP' WHEN STATUS=2 then 'Approved by VP'  WHEN STATUS=2 then 'Approved by VP'  WHEN STATUS=3 then 'Pending by VP' WHEN STATUS=5 then 'Pending by CMD' when STATUS=6 then 'Approved by CMD'  when status=7 then 'Rejected by CMD' when status=8 then 'UPLOADED by DESIGNER' when status=9 then 'Approved by Normal Marketing' when status=10 then 'Rejected by Normal Marketing'  when status=11 then 'Submitted BY SCM' else '' end) 'STATUS',Date_Time 'TIME',CMD_REMARK 'CMD REMARK',VP_REMARK 'VP REMARK' from project_master order by project_id";
      $result = mysqli_query($db,$sql);
	  $count = mysqli_num_rows($result);
  	 

  	if($count >0)
  	{

  	echo "<center><table class='hoverTable'  border='1' align='center' >";  

	?>

<tr>

	<td style="text-align: center;" bgcolor="green"><b>PROJECT NO</b></td>
	<td style="text-align: center;" bgcolor="green"><b>USER ID</b></td>
	<td style="text-align: center;" bgcolor="green"><b>ARTWORK NAME</b></td>
	<td style="text-align: center;" bgcolor="green"><b>DIVISION</b></td>
	<td style="text-align: center;" bgcolor="green"><b>DATE</b></td>
	<td style="text-align: center;" bgcolor="green"><b>TIME</b></td>
	<td style="text-align: center;" bgcolor="green"><b>STATUS</b></td>
	<td style="text-align: center;" bgcolor="green"><b>CMD REMARK</b></td>
	<td style="text-align: center;" bgcolor="green"><b>VP REMARK</b></td>
	
</tr>
<?php
while($row = mysqli_fetch_assoc($result))
	
{
?>
	<tr>

		<td style="text-align: center;" ><a href="vp_edit.php?no=<?php echo $row["PROJECT NO"];?>" style="color:red;text-decoration: underline;"><?php echo $row["PROJECT NO"];?></a></td>
		<td><?php echo $row["USER_ID"];?></td>
		<td><?php echo $row["ARTWORK NAME"];?></td>
		<td><?php echo $row["DIVISION"];?></td>
		<td><?php echo substr($row["TIME"],0,10);?></td>
		<td><?php echo substr($row["TIME"],11,10);?></td>
		<td><?php echo $row["STATUS"];?></td>
		<td><?php echo $row["CMD REMARK"];?></td>
		<td><?php echo $row["VP REMARK"];?></td>
	</tr>
<?php
}
}
?>	

  </div>  
 </body>
   
</html>