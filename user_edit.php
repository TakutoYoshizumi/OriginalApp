<?php
  require_once "filters/LoginFilter.php";
  require_once "models/Profile.php";
  require_once "models/User.php";
  
  session_start();
  
  //ユーザーidを取得
  $id = $_GET["id"];
  
 //ユーザーidからユーザーのプロフィール情報を取得
 $user= User::find_user_info($id);
  
  
  //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  $user_icon = $_SESSION['user_icon'];

include_once "views/user_edit_view.php";
  
  