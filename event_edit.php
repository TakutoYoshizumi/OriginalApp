<?php
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Event.php";
  require_once "models/Category.php";
  
  session_start();
  
  $id = $_GET["id"];
  
  //対象のイベントをDBから引き出す
  $event = Event::find($id);
  
  //対象のイベントに紐ずくカテゴリーを全て取得
  $event_category=$event->categories();

  //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  
  $_SESSION["errors"] = null;
  
  $categories=Category::all();
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];

  include_once "views/event_edit_view.php";
  
  