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
   
   
  $message_relations = Message_Relation::find_message_relations($send_user_id);
  
 
  
// //   // //セッションからユーザーアイコンを取得
    $user_icon = $_SESSION["user_icon"];
  
  include_once "views/message_top_view.php";