<?php
 include("config.php");
   session_start();
   
  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT type FROM user_master WHERE user_id = UPPER('$myusername') and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $type = $row['type'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 and $type==2) 
      {
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: nmarketing.php");
      }
      elseif($count == 1 and $type==0) 
      {
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: cmd.php");
      }
      elseif($count == 1 and $type==1) 
      {
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: vp.php");
      }
      elseif($count == 1 and $type==3) 
      {
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: designer.php");
      }
       elseif($count == 1 and $type==4) 
      {
     
         $_SESSION['login_user'] = $myusername;
         
         header("location: scm.php");
      }
      else
      {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
<head>
 <title></title>
 <link href="CSS/style.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
 <div class="log-box">
 <img class="usrimg" src="usr.jpg" />
 <h2>
LOGIN</h2>
 <form action = "" method = "post">
    User Name:<br />

    <input name="username" placeholder="Enter username" required="" type="text" />
    Password<br />

    <input name="password" placeholder="Enter Password" required="" type="Password" />
    <input name="submit" type="submit" value="Sign In" />
    
 </form>
 <div style="font-size: 15px;color: Balck;margin-top: 10px"><?php echo $error;?></div>
</div>
</body>
</html>


