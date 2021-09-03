<?php
    //(C)
    require_once 'models/User.php';
    session_start();
    
    //ユーザー情報を取得
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    //入力された値でユーザー登録
    $user = new User($name, $account, $password);
    
    //入力チェック
    //引数の値が既にDBに登録されていればエラーが返る
    $errors = $user->validation($user->account);


    // 入力エラーがなければ
    if (count($errors) === 0) {
        $flash_message = $user->save();
        $_SESSION['flash_message'] = $flash_message;

    　　header('Location:index.php');
        exit;
    //入力エラーがあれば
    } else {
        $_SESSION['errors'] = $errors;

        header('Location:user_create.php');
        exit;
    }

  