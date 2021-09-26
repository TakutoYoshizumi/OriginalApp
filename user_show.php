<?php
  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';

 session_start();

 //user＿idを取得
 $id = $_GET['id'];

 $login_user = $_SESSION['login_user'];

 //セッションからメーセージを取得
 $flash_message = $_SESSION['flash_message'];
 $_SESSION['flash_message'] = null;
 
   //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;

 //ユーザーidからユーザーのプロフィール情報を取得
 $user= User::find_user_info($id);

  $user_icon = $_SESSION['user_icon'];

 include_once 'views/user_show_view.php';
