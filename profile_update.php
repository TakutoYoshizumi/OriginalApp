<?php
 //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';
 
 session_start();
 
 
 $login_user = $_SESSION["login_user"];
 
 
 $id = $_POST['id'];
 $introduction = $_POST['introduction'];
 $country = $_POST['country'];
 $age = $_POST['age'];
 $job = $_POST['job'];
 $gender = $_POST['gender'];
 $image = $_FILES['image']['name'];
 
 //idから対象のプロフィール情報を取得
 $profile = Profile::find_by_user_id($id);
 
 
 //情報を更新する
 $profile->introduction = $introduction;
 $profile->country = $country;
 $profile->age = $age;
 $profile->job = $job;
 $profile->gender = $gender;
 
 
 //入力エラーチェック
 $errors = $profile->validate();
 
 
 //画像情報がある時のみアップロード
 //if文で空文字のアップロード防止
  if (empty($image) !== true) {
      $profile->image = $image;
      //画像をアップロード
      //画像が選択されていれば
      $file = 'upload/' . $image;
      // uploadディレクトリにファイル保存
      move_uploaded_file($_FILES['image']['tmp_name'], $file);
  }
 if (count($errors) === 0) {
     $flash_message = $profile->save();
     $_SESSION['flash_message'] = $flash_message;
 
     header('Location:profile_show.php?id='.$login_user->id);
     exit;
     //入力エラーが１つでもあれば
 } else {
     $_SESSION["errors"] = $errors;
     header('Location:profile_edit.php?id='.$login_user->id);
     exit;
 }

