<?php
    require_once 'models/Event.php';
    require_once 'models/User.php';
    require_once 'models/Event_Category_Relation.php';
    
    session_start();
    
    //全てのカテゴリー情報を取得
    $categories = Category::all();
    
    //アウトドアのカテゴリーに紐ずくイベントのみ取得
    $events = Event_Category_Relation::find(9);
    
    //メッセージのやりとりのあるidを取得
    foreach ($events as $event) {
        $events_indoor[] = Event::find($event->event_id);
    }
    
    
    $flash_message             = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //セッションからユーザーアイコンを取得
    $user_icon = $_SESSION["user_icon"];
    
    include_once "views/event_top_indoor_view.php";

