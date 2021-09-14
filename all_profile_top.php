<?php
 require_once 'models/Profile.php';
 require_once 'models/User.php';
 
  session_start();
 
 
  //全てのユーザープロフィール一覧情報を取得
   $all_profiles =Profile::all_profiles();
   // var_dump($all_profiles);
 
   include_once "views/all_profile_top_view.php";
 