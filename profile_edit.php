<?php
    require_once "filters/LoginFilter.php";
    require_once "filters/EditFilter.php";
    require_once "models/Profile.php";
    require_once "models/User.php";
    
    session_start();
    
    //ユーザーidを取得
    $id = $_GET["id"];
    //対象のユーザーをDBから引き出す
    $profile = Profile::find_by_user_id($id);
    
    //セッションからユーザーアイコンを取得
    $user_icon = $_SESSION['user_icon'];
    
    //入力エラーを受け取る
    $errors             = $_SESSION["errors"];
    $_SESSION["errors"] = null;
    
    include_once "views/profile_edit_view.php";



    
