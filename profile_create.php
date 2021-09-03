<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  session_start();
  
  // セッションからログインユーザー情報を取得
  $login_user = $_SESSION["login_user"];
  
  //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  include_once "views/profile_create_view.php";

