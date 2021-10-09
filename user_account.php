<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  
  session_start();
 
  $login_user =$_SESSION["login_user"];
  $_SESSION["login_user"] = $login_user;
  
  //セッションからユーザーアイコンを取得
  $user_icon = $_SESSION["user_icon"];
  
  $profile = Profile::find_by_user_id($login_user->id);

  // 条件分岐でプロフィールに未回答の項目があればtrue。
  //trueがある場合,プロフィール作成ページリンクを表示
  $true = array();
   foreach ($profile as $key => $value) {
      if(empty($value)){
        $true[]="true";
      } 
  }
      
  
  include_once "views/user_account_view.php";