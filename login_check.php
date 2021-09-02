<?php
  //(C)
  require_once 'models/User.php';
  require_once 'models/Profile.php';

  session_start();
  //入力値取得　POSTグローバル変数
  // var_dump($_POST);

    $account = $_POST[account];
    $password = $_POST[password];

    //accontとpasswordをもとにログインをチェック
   $user = User::login($account, $password);
  // var_dump($user);

  // 条件分岐でユーザーが登録してあるかをチェック
  //ユーザーが登録していればtrue。
  if ($user !== false) {
      $_SESSION['login_user'] = $user;
      $id = $user->id;
      // var_dump($id);
    //ログインユーザーのidをもとにプロフィールを取得
    $profiles = Profile::find($id);
    //プロフィールからユーザーのアイコンを取得
    $user_icon = $profiles->image;
    $_SESSION["user_icon"] =$user_icon;
    

    //プロフィールの入力項目に未回答があればプロフィールページへリダイレクト
    $true = array();
      foreach ($profiles as $key => $value) {
          // 条件分岐でプロフィールに未回答の項目があればtrue。
      if ((empty($value)) === true) {
          $true[] = 'true';
      }
      }
      if (count($true) !== 0 ||$profiles === false) {
          header('Location:profile_create.php');
          exit;
      } else {
          header('Location:top.php');
          exit;
      }
  // //エラーが１つでもあればelse。
  } else {
      $errors = [];  //= $errors=array();
      $errors[] = 'お探しのユーザーが見つかりません';
      $_SESSION['errors'] = $errors;
      header('Location:index.php');
      exit;
  }
