<?php
    // (C)
     require_once "filters/LoginFilter.php";
     require_once "models/User.php";
     require_once "models/Profile.php";
     session_start();
    
    // var_dump($_POST);
    //詳細画面から飛んできたユーザー番号を取得
    $id =$_GET["id"];
   //  var_dump($id);
   
    //ユーザー番号を指定してDBから削除
    $flash_message = Profile::destroy($id);

    $_SESSION['flash_message'] = $flash_message;
    
   //  // // リダイレクト
    header('Location: profile_show.php');
    exit;