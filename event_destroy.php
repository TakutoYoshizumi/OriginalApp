<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Event.php";
  
  session_start();
  
  $event_id = $_GET["id"];
  $login_user = $_SESSION["login_user"];
  
  //イベント情報をDBから削除
  $flash_message = Event::destroy($login_user->id,$event_id);
  var_dump($flash_message);
  
    //インスタンスをDBに保存
  $_SESSION["flash_message"] =$flash_message;
  
  
  header("Location:event_top.php");
  exit;