<?php

    //(C)
    require_once 'models/User.php';
    session_start();

    // var_dump($_POST);
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    
    
    //入力された値でユーザー登録
    $user = new User($name, $account, $password);
    //入力チェック
    $errors=$user->validation($user->account);
    // var_dump($errors);
    


    // 入力エラーが１つでもあれば
    if (count($errors) === 0) {
        $flash_message = $user->save();
        $_SESSION['flash_message'] = $flash_message;
    // //リダイレクト
    header('Location:index.php');
        exit;

    //入力エラーがあれば
    } else {
        $_SESSION['errors'] = $errors;
        // var_dump($errors);

        header('Location:user_create.php');
        exit;
    }

    

  