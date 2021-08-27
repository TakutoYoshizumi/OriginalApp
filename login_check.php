<?php
  //(C)
  require_once 'models/User.php';
  session_start();
  //入力値取得　POSTグローバル変数
  // var_dump($_POST);

    $userID = $_POST[userID];
    $password = $_POST[password];
    // var_dump($userID);
    // var_dump($password);
    //UserIDとpasswordをもとにログインをチェック
   $user = User::login($userID, $password);
  // var_dump($user);


  //ユーザーが登録されていれば
  if ($user !== false) {
      $_SESSION['login_user'] = $user;
      header('Location:top.php');
    //条件分岐でプロフィール完成していたらトップページへ
    // header("Location:profile_show.php");
    exit;
  } else {
      $errors = [];  //= $errors=array();
    $errors[] = 'お探しのユーザーが見つかりません';
      $_SESSION['errors'] = $errors;
      header('Location:index.php');
      exit;
  }
