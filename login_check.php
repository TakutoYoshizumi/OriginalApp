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
      //ユーザーをセッションに保存_
      $_SESSION['login_user'] = $user;

      $id = $user->id;
      //取得したidからプロフィールを取得
      $profile = Profile::find_by_user_id($id);
      
      //プロフィール登録されていなければfalse
      //未登録のユーザーのプロフィールインスタンスを作成　プロフィール情報閲覧のため作成
      //user_id,imageのみ、初期値はない状態で保存
      if($profile === false){
        $image = 'user_pic.jpg';
        $age          = "";
        $gender       = "";
        $job          = "";
        $country      = "";
        $introduction = "";        
        $profile = new Profile($id, $age, $gender, $job, $country, $introduction, $image);
        
        $profile->save();
      }      
      
      //プロフィールからユーザーのアイコンを取得
      if(isset($profile->image)){
        $user_icon = $profile->image;
        //アイコンをセッションに保存
        $_SESSION["user_icon"] = $user_icon;
      }else{
        $user_icon = 'user_pic.jpg';   
        $_SESSION["user_icon"] = $user_icon;  var_dump($profile);
      }
      
          header('Location:top.php');
          exit;
      // }
      // //エラーが１つでもあればelse。
  } else {
      $errors = [];  //= $errors=array();
      $errors[] = 'お探しのユーザーが見つかりません';
      $_SESSION['errors'] = $errors;
      header('Location:index.php');
      exit;
  }
