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
  
    //入力エラー時セッションんからすでに入力された値を取得
  $input_info = $_SESSION["input_info"];
  $_SESSION["input_info"] = null;
  $input =get_object_vars($input_info);
  
  //対象のユーザーをDBから引き出す
  $profile = Profile::find_by_user_id($login_user->id);
  
  
  include_once "views/profile_create_view.php";

