<?php
  //(C)
  require_once "filters/LoginFilter.php";
  
  session_start();
  $login_user =$_SESSION["login_user"];
  //   var_dump($login_user);

  include_once "views/top_view.php";

