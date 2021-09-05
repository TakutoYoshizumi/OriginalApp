<?php
    // (C)
     require_once "filters/LoginFilter.php";
     require_once "models/User.php";
     require_once "models/Event.php";
     require_once "models/Comment.php";
     session_start();
    
    //コメントidを取得
    $id =$_GET["id"];
    

   // //  //ユーザー番号を指定してDBから削除
    $flash_message = Comment::destroy($id);

    $_SESSION['flash_message'] = $flash_message;
   //イベントidを取得
   $event_id = $_GET["event_id"];
    
   // //  // // リダイレクト
    header("Location:event_show.php?id=".$event_id);
    exit;