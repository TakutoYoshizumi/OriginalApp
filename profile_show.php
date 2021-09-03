<?php
  //(C)

 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';

 session_start();

 $id = $_GET['id'];
 $login_user = $_SESSION['login_user'];
 
 //セッションからメーセージを取得
 $flash_message = $_SESSION['flash_message'];
 $_SESSION['flash_message'] = null;
 
 //ユーザーidからユーザーのプロフィール情報を取得
 $profile = Profile::find($id);

 include_once 'views/profile_show_view.php';
