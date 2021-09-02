<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  
  session_start();
  $login_user =$_SESSION["login_user"];
  // var_dump($login_user);
  $_SESSION["login_user"] = $login_user;
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  $_SESSION["user_icon"] = $user_icon;
  
  
  include_once "views/top_view.php";

