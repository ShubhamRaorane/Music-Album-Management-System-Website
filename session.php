<?php
   session_start();
   $mysql_host     = "localhost";
   $mysql_username = "root";
   $mysql_password = "";
   $mysql_database = "album management system";
   $db = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);

   
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select USERNAME from users where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['USERNAME'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:Registration-SignIn.php");
      die();
   }
?>