<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  
  session_start();
  
  //セッションからログインユーザー情報を取得
  $login_user =$_SESSION["login_user"];
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  
  include_once "views/type_view.php";