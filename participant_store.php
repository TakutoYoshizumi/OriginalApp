<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Event.php";
  require_once "models/Participant.php";
  
  session_start();
  
  //POSTからevent_idを取得
  $event_id = $_POST["event_id"];
  // //セッションからログインユーザー情報取得
  $login_user=$_SESSION["login_user"];
  
  // //新規イベント参加インスタンス作成
  $participant = new Participant($login_user->id,$event_id);
  
  // //イベント参加インスタンスをDBに保存
  $flash_message = $participant->save();
  $_SESSION["flash_message"] =$flash_message;
  
  // //リダイレクト
  header("Location:event_show.php?id=".$event_id);
  exit;