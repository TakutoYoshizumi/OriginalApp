<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  
  session_start();
  
  // var_dump($_POST);
  // var_dump($_FILES);
  $login_user = $_SESSION["login_user"];
  var_dump($login_user);
  
  //プロフィール情報を取得
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $job = $_POST["job"];
  $country = $_POST["country"];
  $introduction = $_POST["introduction"];
  $image = $_FILES["image"]["name"];
  
  $profiles = new Profile($login_user->id,$age,$gender,$job,$country,$introduction,$image);
  
  //入力項目に誤りがないかチェック
  $errors = $profiles->validate();
  
  //画像をアップロード
  //画像が選択されていれば
  if($_FILES["image"]["size"] !==0){
    //uploadディレクトリにファイルを保存
    $file = "upload/".$image;
    move_uploaded_file($_FILES["image"]["name"],$file);
  }else{
    $image = "";
  }
  
  $login_user = $_SESSION["login_user"];
  $_SESSION["login_user"] = $login_user;
  // 入力エラーが１つもなければ
  if(count($errors) === 0){
    //ユーザーのプロフィールインスタンスを作成
    $flash_message = $profiles->save();
    $SESSION["flash_message"] = $flash_message;
    header("Location:profile_show.php?id=".$login_user->id);
    exit;
    
    //入力エラーが１つでもあれば
  }else{
    var_dump($errors);
    $SESSION["errors"] = $errors;
    header("Location:profile_create.php");
    exit;
  }
  
  
