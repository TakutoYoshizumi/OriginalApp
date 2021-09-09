<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  require_once "models/Message.php";
  require_once "models/Message_Relation.php";
  
  session_start();
  
  // セッションからログインユーザー情報を取得
   //ログインユーザーを送信ユーザーとする
  $login_user = $_SESSION["login_user"];
  $send_user_id=$login_user->id;

///GETから送られてきた受信先ユーザーのidを取得
  $receive_user_id=($_GET[id]);


      
//セッションからメッセージを取得
  $flash_message = $_SESSION['flash_message'];
  $_SESSION["flash_message"] = null;
  //エラーがあればエラーを取得
  $errors =$_SESSION["errors"];
  $_SESSION["errors"] =null;

//メッセージ情報を取得
  $messages = Message::get_message($send_user_id,$receive_user_id);
  
//セッションからユーザーアイコンを取得
    $user_icon = $_SESSION["user_icon"];

  include_once "views/message_show_view.php";

  
