<?php
  //(C)
  require_once 'models/User.php';
  require_once 'models/Profile.php';

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
      $id = $user->id;
      // var_dump($id);
      $_SESSION['login_user'] = $user;
      //ログインユーザーのプロフィールを取得
      $profiles = Profile::find($id);
      // var_dump($profiles);
      // var_dump(empty($profiles));

  //プロフィールに未回答の項目があれば
      if ((empty($profiles)) === true) {
          header('Location:profile_create.php');
          exit;
      } else {
          header('Location:top.php');
          exit;
      }
    //条件分岐でプロフィール完成していたらトップページへ
    header('Location:profile_show.php');
      exit;
  } else {
      $errors = [];  //= $errors=array();
    $errors[] = 'お探しのユーザーが見つかりません';
      $_SESSION['errors'] = $errors;
      header('Location:index.php');
      exit;
  }