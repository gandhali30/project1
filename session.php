<?php
   include('config.php');
   session_start();
   
   error_reporting(E_ERROR | E_PARSE);
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select user_id,type from user_master where user_id = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $user_id = $row['user_id'];
   $login_type = $row['type'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>