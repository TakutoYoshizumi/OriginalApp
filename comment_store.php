<?php
    //(C)
    require_once "models/User.php";
    require_once "models/Comment.php";
    
    session_start();
    
    $login_user = $_SESSION["login_user"];
    
    
    //POSTで送られてきた値を取得
    $event_id = $_POST["event_id"];
    $content  = $_POST["content"];
    
    //ユーザーid,イベントid、コメント内容からコメントインスタンスを作成
    $comment = new Comment($login_user->id, $event_id, $content);
    
    //エラーチェック
    $errors = $comment->validate();
    
    if (count($errors) === 0) {
        //インスタンスをDBに保存
        $flash_message             = $comment->save();
        $_SESSION["flash_message"] = $flash_message;
        header("Location:event_show.php?id=" . $event_id);
        exit;
    } else {
        $_SESSION["errors"] = $errors;
        header("Location:event_show.php?id=" . $event_id);
        exit;
    }


