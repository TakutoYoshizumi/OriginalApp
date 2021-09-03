<?php
  //(C)
  require_once "models/User.php";
  require_once "models/Favorite.php";
  
  session_start();
  
  //POSTからevent_idを取得
  $event_id = $_POST["event_id"];
  var_dump($event_id);
  //セッションからログインユーザー情報取得
  $login_user=$_SESSION["login_user"];
  
  //新規いいねインスタンス作成
  $favorite = new Favorite($login_user->id,$event_id);
  
  //いいねインスタンスをDBに保存
  // $flash_message = $favorite->save();
  // $_SESSION["flash_message"] =$flash_message;
  
  // //リダイレクト
  // header("Location:event_show.php?id=".$event_id);
  // exit;