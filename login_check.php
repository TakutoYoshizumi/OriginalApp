<?php
  //(C)
  require_once 'models/User.php';
  require_once 'models/Profile.php';

  session_start();
  //入力値取得　POSTグローバル変数
  // var_dump($_POST);
  
    $account= $_POST[account];
    $password = $_POST[password];

    //accontとpasswordをもとにログインをチェック
   $user = User::login($account, $password);
  // var_dump($user);

  // 条件分岐でユーザーが登録してあるかをチェック
  //ユーザーが登録していればtrue。
  if ($user !== false) {
      $_SESSION["login_user"] = $user;
      $id = $user->id;
      // var_dump($id);
    //ログインユーザーのプロフィールを取得
    $profiles = Profile::find($id);
    
    

  // 条件分岐でプロフィールに未回答の項目があればtrue。
      if ((empty($profiles)) === true) {
          header('Location:profile_create.php');
          exit;
    //条件分岐でプロフィールが完成していたらトップページへ
      } else {
          header('Location:top.php');
          exit;
      }
  //エラーが１つでもあればelse。
  } else {
      $errors = [];  //= $errors=array();
      $errors[] = 'お探しのユーザーが見つかりません';
      $_SESSION['errors'] = $errors;
      header('Location:index.php');
      exit;
  }