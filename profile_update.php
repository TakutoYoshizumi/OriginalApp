<?php
 //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';

 session_start();

 // var_dump($_POST);
 var_dump($_FILES);
 $id = $_POST['id'];
 $introduction = $_POST['introduction'];
 $country = $_POST['country'];
 $age = $_POST['age'];
 $job = $_POST['job'];
 $gender = $_POST['gender'];
 $image = $_FILES['image']['name'];

 //idから対象のプロフィール情報を取得
 $profiles = Profile::find($id);
 // var_dump($profiles);

 //情報を更新する
 $profiles->introduction = $introduction;
 $profiles->country = $country;
 $profiles->age = $age;
 $profiles->job = $job;
 $profiles->gender = $gender;
 
 //入力エラーチェック
 $errors = $profiles->validate();
 
 if(count($errors) === 0){
   if (empty($image) !== true) {
       $profiles->image = $image;
     //画像をアップロード
     //画像が選択されていれば
    $file = 'upload/'.$image;
    // uploadディレクトリにファイル保存
    move_uploaded_file($_FILES['image']['name'], $file);
   }
  
   $flash_message = $profiles->save();
   $_SESSION['flash_message'] = $flash_message;
  
   header('Location:profile_show.php?id='.$id);
   exit;
    //入力エラーが１つでもあれば
  }else{
    // var_dump($errors);
    $_SESSION["errors"] = $errors;
    header('Location:profile_edit.php?id='.$id);
    exit;
  }
  

