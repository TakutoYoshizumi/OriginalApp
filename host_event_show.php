<?php
  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Event.php';
 require_once 'models/User.php';
 require_once "models/Profile.php";

 
 session_start();
 
//イベントidを取得
 $user_id = $_GET['id'];
 
 //セッションからログインユーザー情報を取得
 $login_user = $_SESSION['login_user'];
 
 //  // セッションからメッセージを取得
  $flash_message=$_SESSION["flash_message"];
  $_SESSION["flash_message"] = null;
 
 //  // セッションからエラーを取得
  $errors=$_SESSION["errors"];
  $_SESSION["errors"] = null;
 
 // //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
 
 //  //ホストイベント情報を取得
  $events = Event::find_host_event($user_id);
  

 include_once 'views/host_event_show_view.php';