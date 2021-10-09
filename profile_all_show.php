<?php
    //(C)
    
    require_once 'filters/LoginFilter.php';
    require_once 'models/Profile.php';
    require_once 'models/User.php';
    
    session_start();
    
    //user＿idを取得
    $id = $_GET['id'];
    
    $login_user = $_SESSION['login_user'];
    
    //セッションからメーセージを取得
    $flash_message             = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //ユーザーidからユーザーのプロフィール情報を取得
    $profile = Profile::find_by_user_id($id);
    
    // 条件分岐でプロフィールに未回答の項目があればtrue。
    //trueがある場合,プロフィール作成ページリンクを表示
    $true = array();
    foreach ($profile as $key => $value) {
      if(empty($value)){
        $true[]="true";
      } 
    }    
    
    //プロフィールからユーザーのアイコンを取得
    $user_icon = $_SESSION['user_icon'];
    
    
    include_once 'views/profile_show_view.php';
