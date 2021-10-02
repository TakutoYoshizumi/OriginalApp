<?php
 require_once 'models/Event.php';
 require_once 'models/User.php';
 
  session_start();
 
  //全てのイベント一覧情報を取得
   $event =Event::all();
   
   //全てのカテゴリー情報を取得
   $categories = Category::all();
   
   $flash_message = $_SESSION['flash_message'];
   $_SESSION['flash_message'] = null;
   
     //セッションからユーザーアイコンを取得
   $user_icon = $_SESSION["user_icon"];
 
   include_once "views/event_top_view.php";