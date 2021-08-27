<?php

  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';

 session_start();

$login_user = $_SESSION['login_user'];
// var_dump($login_user);
  $flash_message = $_SESSION['flash_message'];
  $_SESSION['flash_message'] = null;
 //全プロフィール情報を取得する
 $profiles = Profile::all();
 var_dump($profiles);

 include_once 'views/profile_show_view.php';
