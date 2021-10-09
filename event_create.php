<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/Profile.php";
  require_once "models/User.php";
  require_once "models/Category.php";
  
  session_start();
  
  //セッションからログインユーザー情報を取得
  $login_user = $_SESSION["login_user"];
  
    //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  $categories=Category::all();
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];

  //入力エラー時、すでに入力された値を取得
  $input_info = $_SESSION["input_info"];
  $_SESSION["input_info"] = null;
  $input =get_object_vars($input_info);
  //入力エラー時,すでに入力されたカテゴリー値をを取得
  $category_ids= $_SESSION["category_ids"];
  $_SESSION["category_ids"] = null;
  
  include_once "views/event_create_view.php";

