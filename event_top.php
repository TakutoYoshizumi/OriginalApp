<?php
 require_once 'models/Event.php';
 require_once 'models/User.php';
  
  session_start();
  
  $flahsh_message =$_SESSION["flash_message"];
  $_SESSION["flash_message"] =null;
  
  //全イベントを取得
   $events =Event::all();
  // var_dump($events);
   
   include_once "views/event_top_view.php";
  