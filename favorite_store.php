<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Favorite.php";
  
  session_start();
  $event_id = $_POST["event_id"];
  var_dump($event_id);
  $login_user = $_SESSION["login_user"];
  
  //いいねインスタンス作成
  $favorite = new Favorite($login_user->id,$event_id);
    //   var_dump($favorite);
  $flash_message = $favorite->save();
  $_SESSION["flash_message"] =$flash_message;
  
    //リダイレクト
  header("Location:event_show.php?id=".$event_id);
  exit;