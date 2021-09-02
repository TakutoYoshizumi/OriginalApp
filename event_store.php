<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  require_once "models/Event.php";
  
  session_start();
  
  // var_dump($_POST);
  // var_dump($_FILES);
   $login_user = $_SESSION["login_user"];
  $_SESSION["login_user"] = $login_user;
  // var_dump($login_user);
  
  //プロフィール情報を取得
  $name = $_POST["name"];
  $content = $_POST["content"];
  $place = $_POST["place"];
  $day = $_POST["day"];
  $time = $_POST["time"];
  $participants = $_POST["participants"];
  $image = $_FILES["image"]["name"];
  
  $events = new Event($login_user->id,$name,$content,$place,$day,$time,$image,$participants);
  // var_dump($events);
  //入力項目に誤りがないかチェック
  $errors = $events->validate();
  var_dump($errors);
  // //画像をアップロード
  // //画像が選択されていれば
  if($_FILES["image"]["size"] !==0){
    //uploadディレクトリにファイルを保存
    $file = 'upload/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $file);
  }else{
    $image = "";
  }
  
  // // 入力エラーが１つもなければ
  // if(count($errors) === 0){
  //   イベントインスタンスを作成
    // $flseash_message = $events->save();
    // var_dump($flash_message);
    // $SESSION["flash_message"] = $flash_message;
      header("Location:event_top.php");
    // header("Location:event_show.php?id=".$login_user->id);
    // exit;
    
  // //   //入力エラーが１つでもあれば
  // }else{
  //   var_dump($errors);
  //   $SESSION["errors"] = $errors;
  //   header("Location:profile_create.php");
  //   exit;
  // }
  
  
