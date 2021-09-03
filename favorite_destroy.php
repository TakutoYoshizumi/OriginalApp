<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Favorite.php";
  
  session_start();
  
  $event_id = $_POST["event_id"];
  $login_user = $_SESSION["login_user"];
  
  //いいね情報をDBから削除
  $flash_message = Favorite::destroy($login_user->id,$event_id);
  
    //インスタンスをDBに保存
  $_SESSION["flash_message"] =$flash_message;
  
  header("Location:event_show.php?id=".$event_id);
  exit;