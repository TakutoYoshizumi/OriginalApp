<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  require_once "models/Event.php";
  require_once "models/Event_Category_Relation.php";
  
  session_start();
  
  //セッションからログインユーザー情報を取得
   $login_user = $_SESSION["login_user"];
  
  
  //入力情報を取得
  $type=$_POST[type];
  var_dump($type);
  
 
  
  
  //入力からイベントインスタンスを新規作成
  $type= new Category($type);
  
  
  
  // //入力項目に誤りがないかチェック
  
  
  

  
    // イベントインスタンスを作成
    $type = $type->save();
    var_dump($type);
    
    
    // header("Location:type.php");
    // exit;


  
  
