<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/Profile.php";
  require_once "models/User.php";
  
  session_start();
  
  //セッションからログインユーザー情報を取得
  $login_user = $_SESSION["login_user"];
  
  
    //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  
  include_once "views/event_create_view.php";

