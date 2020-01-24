
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
       <h2 style="margin-right: 80%"><a href = "scm.php">Back</a></h2>
      <h2 style="margin-left: 80%"><a href = "logout.php">Sign Out</a></h2>
 
 <form  action="" method="post" enctype='multipart/form-data'>
<table align="center" class="tableNewFormat" border="1"> 
		<h2>Enter Remark for Project:<?php echo $PROJECT_ID; ?></h2>
		   

<?php

$sql="select project_id 'PROJECT NO',user_id 'USER_ID',ARTWORK_NAME 'ARTWORK NAME', SELECT_TYPE 'TYPE',DIVISION_TYPE 'DIVISION',STATUS 'STATUS',Date_Time 'TIME',ATTACHMENT,CMD_REMARK,VP_REMARK,DESIGNER_REMARK,DESIGNER_ATTACH,MARKETING_REMARK,SCM_REMARK,REMARK from project_master where PROJECT_ID=$PROJECT_ID";
 $result = mysqli_query($db,$sql);
 $row=mysqli_fetch_assoc($result);
 $file=$data['ATTACHMENT'];
?>


<tr><th style='text-align:left;'> PROJECT NO. </th><td style='text-align:left;'><?php echo $row["PROJECT NO"];?></td></tr>
<tr><th style='text-align:left;'> USER ID </th><td style='text-align:left;'><?php echo $row["USER_ID"];?></td></tr>
<tr><th style='text-align:left;'> ARTWORK NAME </th><td style='text-align:left;'><?php echo $row["ARTWORK NAME"];?></td></tr>
<tr><th style='text-align:left;'>TYPE </th><td style='text-align:left;'><?php echo $row["TYPE"];?></td></tr>
<tr><th style='text-align:left;'> SELECT DIVISION </th><td style='text-align:left;' ><?php echo $row["DIVISION"];?></td></tr>

<tr><th style='text-align:left;'>REMARK </th><td style='text-align:left;' ><?php echo $row["REMARK"];?></td></tr>


<tr><th style='text-align:left;'> CMD REMARK </th><td style='text-align:left;' ><?php echo $row["CMD_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> VP REMARK </th><td style='text-align:left;' ><?php echo $row["VP_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> DESIGNER REMARK </th><td style='text-align:left;' ><?php echo $row["DESIGNER_REMARK"];?></td></tr>

<tr><th style='text-align:left;'> MARKETING REMARK </th><td style='text-align:left;' ><?php echo $row["MARKETING_REMARK"];?></td></tr>



<tr><th style='text-align:left;'> ATTACHMENT </th><td style='text-align:left;' ><a href="<?php echo $row["ATTACHMENT"];?>"><?php echo $row["ATTACHMENT"];?></a></td></tr>


<tr><th style='text-align:left;'> DESIGN </th><td style='text-align:left;' ><a href="<?php echo $row["DESIGNER_ATTACH"];?>"><?php echo $row["DESIGNER_ATTACH"];?></a></td></tr>
</tr>

<?php
if($row[STATUS]==9 and $row[SCM_REMARK]=='')
{
?>
<tr><th style='text-align:left'>REMARK</th><td style='text-align:LEFT'>  
				<textarea name="SCM_REMARK"  style="width:100%" ></textarea></td></tr>
<tr><th colspan="2" style='text-align:LEFT'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="submit" >Submit</button></th></tr>				
<?php
			if(isset($_POST["submit"]))
			{	
			$SCM_REMARK = $_POST['SCM_REMARK'];			
			$sql_query="update project_master set SCM_REMARK='$SCM_REMARK',STATUS=11 where PROJECT_ID=$PROJECT_ID";
			
			$result = mysqli_query($db,$sql_query);
			
					
						if ($result)
						{
							header("location:scm.php");
						}
						else
						{
							echo "<br>Data Incorrect. Try again...$sql3 "; 
						}
				}
			}
?>


<?php
if($row[SCM_REMARK]!='')
{
?>
<tr><th style='text-align:left;'> REMARK </th><td style='text-align:left;' ><?php echo $row["SCM_REMARK"];?></td></tr>
<?php
}
?>
  </div>  
 </body>
   
</html>