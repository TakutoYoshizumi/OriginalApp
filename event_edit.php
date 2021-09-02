<?php
  require_once "filters/LoginFilter.php";
  require_once "models/Event.php";
  require_once "models/User.php";
  
  session_start();
  
  // var_dump($_GET);
  $id = $_GET["id"];
  
  //対象のイベントをDBから引き出す
  $events = Event::find($id);
  // var_dump($profiles);
  
  //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  // var_dump($errors);
  $_SESSION["errors"] = null;

 include_once "views/event_edit_view.php";
  
  