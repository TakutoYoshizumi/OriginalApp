<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  require_once "models/Category.php";
  
  session_start();
  
  //セッションからメッセージを取得
  $flash_message=$_SESSION["flash_message"];
  $_SESSION["flash_message"] = null;
  //セッションからログインユーザー情報を取得
  $login_user =$_SESSION["login_user"];
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  
    //全てのカテゴリー情報を取得
   $categories = Category::all();
  
  include_once "views/top_view.php";