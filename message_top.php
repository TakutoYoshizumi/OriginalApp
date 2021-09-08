<?php
 require_once "filters/LoginFilter.php";
 require_once 'models/Message.php';
 require_once 'models/User.php';
  
  session_start();

  
  //ログインユーザーに紐付いた全てのメッセージを取得
   $event =Message::all();

   include_once "views/event_top_view.php";
  