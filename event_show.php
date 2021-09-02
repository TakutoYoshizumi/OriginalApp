<?php
  //(C)

 require_once 'filters/LoginFilter.php';
 require_once 'models/Event.php';
 require_once 'models/User.php';
 require_once "models/Profile.php";

 session_start();

 $id = $_GET['id'];
// var_dump($id);
 $login_user = $_SESSION['login_user'];
// var_dump($login_user);
 $flash_message = $_SESSION['flash_message'];
 $_SESSION['flash_message'] = null;
  
    //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  $_SESSION["user_icon"] = $user_icon;

  //イベント情報を取得
  $events = Event::find($id);
  // var_dump($events);

 include_once 'views/event_show_view.php';
