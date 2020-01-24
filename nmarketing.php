<html>
   
  <head>
 <title></title>
 <link href="CSS/style.css" rel="stylesheet" type="text/css"></link>


</head>

   
   <body>
<?php
   include('session.php');
?>
   	
      <h1 align="center">Welcome <?php echo $user_id; ?></h1> 
      <h2 style="margin-left: 80%"><a href = "logout.php">Sign Out</a></h2>
      

 <center>
<form action="" method="post" enctype='multipart/form-data'>
<div style="text-align: center;padding:10px">
<input name="FillForm" type="submit" value="Fill Form" style='border-radius:20px;font-size: 14px;padding: 10px 20px 10px 20px;background-color: grey;color:white;cursor:pointer' />
<input name="ViewDetails" type="submit" value="View  details" style='border-radius:20px;font-size: 14px;padding: 10px 20px 10px 20px;background-color: green;color:white;cursor:pointer;margin-left: 50px' /><br><br>


 
<?php
if(isset($_POST['FillForm']))
{ 
?>   

 <h2 style="margin-right: 80%"><a href = "nmarketing.php">Back</a></h2>
<?php

    error_reporting(E_ERROR | E_PARSE);
echo "<form method='post' action='nmarketing.php' enctype='multipart/form-data'>";

echo "<table class='tableNewFormat' align='center' border=1>";

echo "<tr><th style='text-align:left;'> ARTWORK NAME </th><td style='text-align:left;'><input type='text' name='ARTWORK_NAME' size=55 /></td></tr>
	<tr><th style='text-align:left;'> SELECT DIVISION </th><td style='text-align:left;' ><select name='DIVISION_TYPE' >
      <option value='biological'>biological</option>
      <option value='pesticides'>pesticides</option>
      </select></td></tr>
      <tr><th style='text-align:left;'> SELECT TYPE </th><td style='text-align:left;' ><select name='SELECT_TYPE' >
      <option value='new'>new</option>
      <option value='revised'>revised</option>
      </select></td></tr>



      <tr><th style='text-align:left;'> REMARK </th><td style='text-align:left;'><input type='text' name='REMARK' size=55 /></td></tr>

      <tr><th style='text-align:left;'>Select files: </th><td style='text-align:left;'><input type='file' name='MYFILE' multiple></td></tr>

	  <tr><th colspan='2' ><input type='submit' name='Submit' value='Submit'/> *All fields are mandatory </th></tr>

	  </form>";
?>
<?php
}
$out="";

if(isset($_POST["Submit"]))
{
	$ARTWORK_NAME = $_POST['ARTWORK_NAME'];
	$DIVISION_TYPE = $_POST['DIVISION_TYPE'];
	$SELECT_TYPE=$_POST['SELECT_TYPE'];
	$REMARK = $_POST['REMARK'];
	

$target = 'file/';
$target = $target . basename($_FILES["MYFILE"]["name"]);
$res=move_uploaded_file($_FILES["MYFILE"]["tmp_name"], $target);

$Filename=basename($_FILES["MYFILE"]["name"]);

 
	
if(	$ARTWORK_NAME != "" && $DIVISION_TYPE !="" && $SELECT_TYPE !="" && $REMARK !="" )
{
 			if($SELECT_TYPE=='new')	
 			{	
			 $sql_query="insert into project_master(user_id,ARTWORK_NAME,DIVISION_TYPE,SELECT_TYPE,REMARK,ATTACHMENT,STATUS) values('$user_id','$ARTWORK_NAME','$DIVISION_TYPE','$SELECT_TYPE','$REMARK','$target',5)";

			}
			else
			{
				 $sql_query="insert into project_master(USER_ID,ARTWORK_NAME,DIVISION_TYPE,SELECT_TYPE,REMARK,ATTACHMENT,STATUS) values('$user_id','$ARTWORK_NAME','$DIVISION_TYPE','$SELECT_TYPE','$REMARK','$target',3)";
			}
				if(!mysqli_query($db,$sql_query)) die('Data not uploaded successfully:'. mysqli_error($db));
	            
	            else

                   $out="Updated Successfully";
              // header("location:logout.php");
			} 
			
	

else
{
	$out="Please fill in all the details";
}
echo $out;
}

?>
<?php

	if (isset($_POST['ViewDetails']))
	{
		echo "<h2 style='margin-right: 80%'><a href = 'nmarketing.php'>Back</a></h2>";
      $sql="select project_id 'PROJECT NO',user_id 'USER_ID',ARTWORK_NAME 'ARTWORK NAME', SELECT_TYPE 'TYPE',DIVISION_TYPE 'DIVISION',(CASE  WHEN STATUS=1 then 'Rejected by VP' WHEN STATUS=2 then 'Approved by VP'  WHEN STATUS=2 then 'Approved by VP'  WHEN STATUS=3 then 'Pending by VP' WHEN STATUS=5 then 'Pending by CMD' when STATUS=6 then 'Approved by CMD'  when status=7 then 'Rejected by CMD' when status=8 then 'UPLOADED BY DESIGNER' when status=9 then 'Approved BY Normal Marketing' when status=10 then 'Rejected BY Normal Marketing' when status=11 then 'Submitted BY SCM' else '' end) 'STATUS',Date_Time 'TIME',DESIGNER_REMARK 'DESIGNER REMARK',MARKETING_REMARK 'MARKETING REMARK' from project_master order by project_id";
      $result = mysqli_query($db,$sql);
	  $count = mysqli_num_rows($result);
  	} 

  	if($count >0)
  	{

  	echo "<center><table class='hoverTable' bgcolor='#bde9ba' border='1' align='center' >";  

	?>

<tr>

	<td align="center" bgcolor="green"><b>PROJECT NO</b></td>
	<td style="text-align: center;" bgcolor="green"><b>USER ID</b></td>
	<td style="text-align: center;" bgcolor="green"><b>ARTWORK NAME</b></td>
	<td style="text-align: center;" bgcolor="green"><b>TYPE</b></td>
	<td style="text-align: center;" bgcolor="green"><b>DIVISION</b></td>
	<td style="text-align: center;" bgcolor="green"><b>DATE</b></td>
	<td style="text-align: center;" bgcolor="green"><b>TIME</b></td>
	<td style="text-align: center;" bgcolor="green"><b>ACTION</b></td>
	<td style="text-align: center;" bgcolor="green"><b>DESIGNER REMARK</b></td>
	<td style="text-align: center;" bgcolor="green"><b>MARKETING REMARK</b></td>
	
	
</tr>
<?php
while($row = mysqli_fetch_assoc($result))
	
{
?>
	<tr>
		<td><a href="nmarketing_edit.php?no=<?php echo $row["PROJECT NO"];?>" style="color:red;text-decoration: underline;"><?php echo $row["PROJECT NO"];?></a></td>
		<td><?php echo $row["USER_ID"];?></td>
		<td><?php echo $row["ARTWORK NAME"];?></td>
		<td><?php echo $row["TYPE"];?></td>
		<td><?php echo $row["DIVISION"];?></td>
		<td><?php echo substr($row["TIME"],0,10);?></td>
		<td><?php echo substr($row["TIME"],11,10);?></td>
		<td><?php echo $row["STATUS"];?></td>
		<td><?php echo $row["DESIGNER REMARK"];?></td>
		<td><?php echo $row["MARKETING REMARK"];?></td>
		
	</tr>
<?php
}
}
?>	

  </div>  
 </body>
   
</html>