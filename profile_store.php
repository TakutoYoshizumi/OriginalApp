<?php
  //(C)
  require_once "filters/LoginFilter.php";
  require_once "models/User.php";
  require_once "models/Profile.php";
  
  session_start();
  
  // var_dump($_POST);
  // var_dump($_FILES);
  $login_user = $_SESSION["login_user"];
  //入力情報を取得
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $job = $_POST["job"];
  $country = $_POST["country"];
  $introduction = $_POST["introduction"];
  $image = $_FILES["image"]["name"];
  
  //画像をアップロード
  //画像が選択されていれば
  if($_FILES["image"]["size"] !==0){
    //uploadディレクトリにファイルを保存
    $file = "upload/".$image;
    move_uploaded_file($_FILES["image"]["tmp_name"],$file);
  }else{
    $image = "";
  }
  
  //ユーザーのプロフィールインスタンスを作成
  $profile = new Profile($login_user->id,$age,$gender,$job,$country,$introduction,$image);
  // var_dump($profile);
  $flash_message = $profile->save();
  $SESSION["flash_message"] = $flash_message;
  
  header("Location:profil_show.php");
  exit;
  
