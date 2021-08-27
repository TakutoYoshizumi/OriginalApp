<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  session_start();
 
  $login_user =$_SESSION["login_user"];
  // var_dump($login_user);
  
  include_once "views/user_account_view.php";