<?php
  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Event.php';
 require_once 'models/User.php';
 require_once "models/Profile.php";
 require_once "models/Favorite.php";

 session_start();
 
//イベントidを取得
 $id = $_GET['id'];

 //セッションからログインユーザー情報を取得
 $login_user = $_SESSION['login_user'];

  // セッションからメッセージを
  $flash_message=$_SESSION["flash_message"];
  $_SESSION["flash_message"] = null;
  
 //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];

  //イベント情報を取得
  $event = Event::find($id);
  
  //このイベント投稿に対するいいね一覧を取得
   $favorites = $event->favorites();
 

 include_once 'views/event_show_view.php';
