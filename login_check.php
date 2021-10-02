<?php
  //(C)
  require_once 'models/User.php';
  require_once 'models/Profile.php';
 
  session_start();
 
  //入力さたログイン情報を取得
  $account = $_POST[account];
  $password = $_POST[password];
 
  //取得した値をもとにログインをチェック
  $user = User::login($account, $password);
  
  // 条件分岐でユーザーが登録してあるかをチェック
  //ユーザーが登録していればtrue。
  if ($user !== false) {
      //ユーザーをセッションに保存
      $_SESSION['login_user'] = $user;
      //ユーザーのidを取得
      $id = $user->id;
      //取得したidからプロフィールを取得
      $profile = Profile::find($id);
      //プロフィールからユーザーのアイコンを取得
      $user_icon = $profile->image;
      //アイコンをセッションに保存
      $_SESSION["user_icon"] = $user_icon;
 
 
      //プロフィールの入力項目に未回答があればプロフィールページへリダイレクト
      $true = array();
      foreach ($profile as $key => $value) {
          // 条件分岐でプロフィールに未回答の項目があればtrue。
          if ((empty($value)) === true) {
              $true[] = 'true';
          }
      }
      if (count($true) !== 0 ||$profile === false) {
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
