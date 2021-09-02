<?php
 //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';
 require_once "models/Event.php";

 session_start();

 // var_dump($_POST);
 // var_dump($_FILES);
 $login_user = $_SESSION["login_user"];
 $_SESSION["login_user"] = $login_user; 
 
  //イベント情報を取得
  $id = $_POST['id'];
//   var_dump($id);
  $name = $_POST["name"];
  $content = $_POST["content"];
  $place = $_POST["place"];
  $day = $_POST["day"];
  $time = $_POST["time"];
  $participants = $_POST["participants"];
  $image = $_FILES["image"]["name"];

 //idから対象のイベント情報を取得
 $events = Event::find($id);
//   var_dump($events);

 //情報を更新する
 $events->name = $name;
 $events->content = $content;
 $events->place = $place;
 $events->day = $day;
 $events->time = $time;
 $events->participants = $participants;
 
 //入力エラーチェック
 $errors = $events->validate();
 
 //画像情報がある時のみアップロード
 //if文で空文字のアップロード防止
  if (empty($image) !== true) {
       $profiles->image = $image;
     //画像をアップロード
     //画像が選択されていれば
    $file = 'upload/' . $image;
    // uploadディレクトリにファイル保存
    move_uploaded_file($_FILES['image']['tmp_name'], $file);
  }
 if(count($errors) === 0){
    $flash_message = $events->save();
    $_SESSION['flash_message'] = $flash_message;
   
    header('Location:event_show.php?id='.$id);
    exit;
//     //入力エラーが１つでもあれば
  }else{
    // var_dump($errors);
    $_SESSION["errors"] = $errors;
    header('Location:profile_edit.php?id='.$id);
    exit;
  }
  
