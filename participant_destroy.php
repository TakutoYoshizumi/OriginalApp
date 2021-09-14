<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Event.php";
  require_once "models/Participant.php";
  
  session_start();
  
  // POSTからevent_idを取得
  $event_id = $_POST["event_id"];
  //セッションからログインユーザー情報取得
  $login_user = $_SESSION["login_user"];
  
  //イベント参加情報をDBから削除
  $flash_message =Participant::destroy($login_user->id,$event_id);
  
  //   //インスタンスをDBに保存
  $_SESSION["flash_message"] =$flash_message;
  
  header("Location:event_show.php?id=".$event_id);
  exit;