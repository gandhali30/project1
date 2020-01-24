
<html>
   
  <head>
 <title></title>
 <link href="CSS/style.css" rel="stylesheet" type="text/css"></link>



</head>

   
   <body>
<?php
   include('session.php');

   $PROJECT_ID=$_GET["no"];
?>



   	
      <h1 align="center">Welcome <?php echo $user_id; ?></h1> 
       <h2 style="margin-right: 80%"><a href = "nmarketing.php">Back</a></h2>
      <h2 style="margin-left: 80%"><a href = "logout.php">Sign Out</a></h2>
 


 <form  action="" method="post" enctype='multipart/form-data'>
<table align="center" class="tableNewFormat" border="1"> 
		<h2>Enter Remark for Project:<?php echo $PROJECT_ID; ?></h2>
		   

<?php

$sql="select project_id 'PROJECT NO',user_id 'USER_ID',ARTWORK_NAME 'ARTWORK NAME', SELECT_TYPE 'TYPE',DIVISION_TYPE 'DIVISION',STATUS 'STATUS',Date_Time 'TIME',ATTACHMENT, REMARK 'REMARK',CMD_REMARK,VP_REMARK,DESIGNER_REMARK,DESIGNER_ATTACH,MARKETING_REMARK,SCM_REMARK from project_master where PROJECT_ID=$PROJECT_ID";
 $result = mysqli_query($db,$sql);
 $row=mysqli_fetch_assoc($result);
 $file=$data['ATTACHMENT'];
 $target = 'file/';
?>


<tr><th style='text-align:left;'> PROJECT NO. </th><td style='text-align:left;color: white;' ><?php echo $row["PROJECT NO"];?></td></tr>
<tr><th style='text-align:left;'> USER ID </th><td style='text-align:left;color: white;' ><?php echo $row["USER_ID"];?></td></tr>
<tr><th style='text-align:left;'> ARTWORK NAME </th><td style='text-align:left;color: white;' ><?php echo $row["ARTWORK NAME"];?></td></tr>
<tr><th style='text-align:left;'> TYPE </th><td style='text-align:left;color: white;' ><?php echo $row["TYPE"];?></td></tr>
<?php
if($row[STATUS]!=8 && $row[STATUS]!=9 && $row[STATUS]!=10 && $row[STATUS]!=7 && $row[STATUS]!=1)
{
?>	
<tr><th style='text-align:left;'>REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["REMARK"];?></td></tr>
<tr><th style='text-align:left;'> CMD REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["CMD_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> VP REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["VP_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> DESIGNER REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["DESIGNER_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> MARKETING REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["MARKETING_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> SCM REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["SCM_REMARK"];?></td></tr>
<tr><th style='text-align:left;'>ATTACHMENT</th><td style='text-align:left;color: white;' ><a href="<?php echo $row["ATTACHMENT"];?>"><?php echo $row["ATTACHMENT"];?></a></td></tr>

<tr><th style='text-align:left;'>DESIGNER ATTACHMENT</th><td style='text-align:left;color: white;' ><a href="<?php echo $row["DESIGNER_ATTACH"];?>"><?php echo $row["DESIGNER_ATTACH"];?></a></td></tr>

<?php
}
?>
<?php
if($row[STATUS]==8 or $row[STATUS]==9 or $row[STATUS]==10)
{
?>
<tr><th style='text-align:left;'>ATTACHMENT</th><td style='text-align:left;color: white;' ><a href="<?php echo $row["ATTACHMENT"];?>"><?php echo $row["ATTACHMENT"];?></a></td></tr>
<tr><th style='text-align:left;'> DESIGNER REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["DESIGNER_REMARK"];?></td></tr>
<tr><th style='text-align:left;'> DESIGN </th><td style='text-align:left;color: white;' ><a href="<?php echo $row["DESIGNER_ATTACH"];?>"><?php echo $row["DESIGNER_ATTACH"];?></a></td></tr>
<tr><th style='text-align:left'>REMARK</th><td style='text-align:LEFT'>  
				<textarea name="MARKETING_REMARK"  style="width:100%" ></textarea></td></tr>



<tr><th colspan="1" style='text-align:LEFT'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="APPROVE" >APPROVE</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th style='text-align:LEFT'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="REJECT" >REJECT</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>	

<?php

			if(isset($_POST["APPROVE"]))
			{	

			$MARKETING_REMARK = $_POST['MARKETING_REMARK'];			
			$sql_query="update project_master set STATUS=9, MARKETING_REMARK='$MARKETING_REMARK' where PROJECT_ID=$PROJECT_ID";
			
			$result = mysqli_query($db,$sql_query);
			
					
						if ($result)
						{
							header("location:nmarketing.php");
						}
						else
						{
							echo "<br>Data Incorrect. Try again...$sql3 "; 
						}
					}
?>

<?php
			if(isset($_POST["REJECT"]))
			{	
			$MARKETING_REMARK = $_POST['MARKETING_REMARK'];			
			$sql_query="update project_master set STATUS=10,MARKETING_REMARK='$MARKETING_REMARK' where PROJECT_ID=$PROJECT_ID";
			
			$result = mysqli_query($db,$sql_query);
			
					
						if ($result)
						{
							header("location:nmarketing.php");
						}
						else
						{
							echo "<br>Data Incorrect. Try again...$sql3 "; 
						}
	}	
}			
?>

<?php
if($row[STATUS]==7)
{
?>
<tr><th style='text-align:left;'> CMD REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["CMD_REMARK"];?></a></td></tr>

<tr><th style='text-align:left;'> VP REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["VP_REMARK"];?></a></td></tr>

<tr><th style='text-align:left;'>ATTACH A FILE: </th><td style='text-align:left;color: white;' ><a href="<?php echo $row["ATTACHMENT"];?>"><?php echo $row["ATTACHMENT"];?></a><input type='file' name='MYFILE' multiple></td></tr>

<tr><th style='text-align:left'>REMARK</th><td style='text-align:LEFT'>  
				<textarea name="REMARK"  style="width:100%" value="<?php echo $row['REMARK'];?>"><?php echo $row['REMARK'];?></textarea></td></tr>

<tr><th colspan="2" style='text-align:center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Edit" >Edit</button></th></tr>	

<?php

			if(isset($_POST["Edit"]))
			{	

			$REMARK = $_POST['REMARK'];	

			$target = 'file/';
			$target = $target . basename($_FILES["MYFILE"]["name"]);
			$res=move_uploaded_file($_FILES["MYFILE"]["tmp_name"], $target);
			$Filename=basename($_FILES["MYFILE"]["name"]);

			$sql_query="update project_master set STATUS=5, REMARK='$REMARK',ATTACHMENT='$target' where PROJECT_ID=$PROJECT_ID";
			
			$result = mysqli_query($db,$sql_query);
			
					
						if ($result)
						{
							header("location:nmarketing.php");
						}
						else
						{
							echo "<br>Data Incorrect. Try again...$sql3 "; 
						}
	}				}
?>
			
<?php
if($row[STATUS]==1)
{
?>
<tr><th style='text-align:left;'> CMD REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["CMD_REMARK"];?></a></td></tr>
<tr><th style='text-align:left;'> VP REMARK </th><td style='text-align:left;color: white;' ><?php echo $row["VP_REMARK"];?></a></td></tr>

<tr><th style='text-align:left;'>ATTACH A FILE: </th><td style='text-align:left;color: white;' ><a href="<?php echo $row["ATTACHMENT"];?>"><?php echo $row["ATTACHMENT"];?></a><input type='file' name='MYFILE' multiple></td></tr>

<tr><th style='text-align:left'>REMARK</th><td style='text-align:LEFT'>  
				<textarea name="REMARK"  style="width:100%" value="<?php echo $row['REMARK'];?>"><?php echo $row['REMARK'];?></textarea></td></tr>

<tr><th colspan="2" style='text-align:center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Edit" >Edit</button></th></tr>	

<?php

			if(isset($_POST["Edit"]))
			{	

			$REMARK = $_POST['REMARK'];	

			$target = 'file/';
			$target = $target . basename($_FILES["MYFILE"]["name"]);
			$res=move_uploaded_file($_FILES["MYFILE"]["tmp_name"], $target);
			$Filename=basename($_FILES["MYFILE"]["name"]);

			$sql_query="update project_master set STATUS=3, REMARK='$REMARK',ATTACHMENT='$target' where PROJECT_ID=$PROJECT_ID";
			
			$result = mysqli_query($db,$sql_query);
			
					
						if ($result)
						{
							header("location:nmarketing.php");
						}
						else
						{
							echo "<br>Data Incorrect. Try again...$sql3 "; 
						}
	}				}
?>
		


  </div>  
 </body>
   
</html>