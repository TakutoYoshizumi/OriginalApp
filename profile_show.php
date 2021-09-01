<?php
  //(C)

 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';

 session_start();

 $id = $_GET['id'];
//  var_dump($id);
 $login_user = $_SESSION['login_user'];
// var_dump($login_user);
  $flash_message = $_SESSION['flash_message'];

  $_SESSION['flash_message'] = null;
 //ユーザーのプロフィール情報を取得
 $profiles = Profile::find($id);
//  var_dump($profiles);

 include_once 'views/profile_show_view.php';
