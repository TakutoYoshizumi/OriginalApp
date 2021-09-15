<?php
  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Event.php';
 require_once 'models/User.php';
 require_once "models/Profile.php";
 require_once "models/Participant.php";

 
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
 
 //  //参加予定イベント情報を取得
  $participants = Participant::find($user_id);
  
 //  //いいねしたイベントから情報を取得
  foreach ($participants as $participant) {
    $id = $participant->event_id;
    $events[]=Event::find($id);
  }
  
 include_once 'views/event_participant_show_view.php';