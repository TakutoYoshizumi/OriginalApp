<?php
 //(C)
 require_once 'filters/LoginFilter.php';
 require_once 'models/Profile.php';
 require_once 'models/User.php';
 
 session_start();
 
 
 $login_user = $_SESSION["login_user"];
 
 //入力情報を取得
 $id = $_POST['id'];
 $name = $_POST['name'];
 $password = $_POST['password'];
 
 //ユーザーidからユーザーのプロフィール情報を取得
 $user= User::find_user_info($id);
 
 var_dump($user);
 
 // //情報を更新する
 $user->name = $name;
 $user->password = $password;
 $account=$login_user->account;
 // //入力エラーチェック
 $errors = $user->edit_validation($account);
 // var_dump($errors);
 
 // 入力エラーがなければ
 if (count($errors) === 0) {
     $flash_message = $user->save();
     $_SESSION['flash_message'] = $flash_message;
 
     header('Location:user_show.php?id='.$login_user->id);
     exit;
     //入力エラーが１つでもあれば
 } else {
     $_SESSION["errors"] = $errors;
     header('Location:user_edit.php?id='.$login_user->id);
     exit;
 }

