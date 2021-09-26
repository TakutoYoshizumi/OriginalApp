<?php
  //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Event.php';
 require_once 'models/User.php';
 require_once "models/Profile.php";
 require_once "models/Favorite.php";
 require_once "models/Comment.php";
 require_once "models/Participant.php";
 require_once "models/Event_Category_Relation.php";
 
 session_start();
 
//ユーザーが指定したカテゴリーidを取得
 $category_id = $_POST[category_id];
 
 //セッションからログインユーザー情報を取得
 $login_user = $_SESSION['login_user'];
 
  // セッションからメッセージを取得
  $flash_message=$_SESSION["flash_message"];
  $_SESSION["flash_message"] = null;
 
  // セッションからエラーを取得
  $errors=$_SESSION["errors"];
  $_SESSION["errors"] = null;
 
 //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
 
 //  //カテゴリーidに紐ずくイベント一覧を取得
  $event = Event_Category_Relation::find($category_id);
  
  //イベント一覧のイベント情報を１つずつ取得
  foreach($event as $event){
   $events[] = Event::find($event->event_id);
  }
 
  //紐ずくイベントが見つかれば
  if(!empty($events)){
   include_once 'views/event_find_view.php';
  }else{
   $alert = "お探しのカテゴリーに紐ずくイベントは見つかりません";
   $flash_message = "<script type='text/javascript'>alert('". $alert. "');</script>";
   $_SESSION["flash_message"] = $flash_message;
   header("Location: top.php?id=" . $login_user->id);
   exit;
  }

 
 