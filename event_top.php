<?php
 require_once 'models/Event.php';
 require_once 'models/User.php';
 
  session_start();
 
 
  //全てのイベント一覧情報を取得
   $event =Event::all();
   
   //全てのカテゴリー情報を取得
   $categories = Category::all();
 
   include_once "views/event_top_view.php";