<?php
    //(C)
    require_once "filters/LoginFilter.php";
    require_once "models/User.php";
    require_once "models/Profile.php";
    
    session_start();
    
    
    //セッションからログインしているログイン情報を取得
    $login_user = $_SESSION["login_user"];
    $profile = Profile::find_by_user_id($login_user->id);


    //入力情報を取得
    $age          = $_POST["age"];
    $gender       = $_POST["gender"];
    $job          = $_POST["job"];
    $country      = $_POST["country"];
    $introduction = $_POST["introduction"];
    $image = $_FILES["image"]["name"];
    
    // //情報を更新する
    $profile->country      = $country;
    $profile->age          = $age;
    $profile->job          = $job;
    $profile->gender       = $gender;
    $profile->introduction = $introduction;       
    
    //入力項目に誤りがないかチェック
    $errors = $profile->validate();
    
    //   //画像が選択されていれば
    if ($_FILES["image"]["size"] !== 0) {
        //uploadディレクトリにファイルを保存
        $file = 'upload/' . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
        
        //画像が選択されていなければ
    } else {
        $image = 'user_pic.jpg';
    }
    
    // 入力エラーが１つもなければ
    if (count($errors) === 0) {
        
        //データベースにプロフィールを保存
        $flash_message             = $profile->save();
        $_SESSION["flash_message"] = $flash_message;
        
        header("Location: profile_show.php?id=" . $login_user->id);
        exit;
        
        //入力エラーが１つでもあれば
    } else {
        $_SESSION["errors"] = $errors;
        $input_info = $profile;
        $_SESSION["input_info"] = $input_info;
        header("Location:profile_create.php");
        exit;
    }
