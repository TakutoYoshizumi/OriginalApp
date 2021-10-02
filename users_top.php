<?php
    require_once 'models/User.php';
    require_once 'models/Profile.php';
    
    session_start();
    
    //セッションからログインユーザー情報を取得
    $login_user = $_SESSION["login_user"];
    //セッションからユーザーアイコンを取得
    $user_icon  = $_SESSION["user_icon"];
    
    //全てのユーザー一覧情報を取得
    $users = Profile::all_profiles();
    
    include_once "views/users_top_view.php";

   