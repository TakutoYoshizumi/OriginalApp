<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  session_start();
  
  $login_user = $_SESSION["login_user"];
  $_SESSION["login_user"] = $login_user;
  // var_dump($login_user);
  
    //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  include_once "views/profile_create_view.php";

