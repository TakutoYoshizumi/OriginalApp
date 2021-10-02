<?php
    //(C)
    require_once 'filters/LoginFilter.php';
    require_once 'models/Comment.php';
    require_once 'models/User.php';
    require_once "models/Event.php";
    
    session_start();
    
    //セッションからログインユーザー情報取得
    $login_user = $_SESSION["login_user"];
    
    //コメントidを取得
    $id = $_POST['id'];
    //コメント内容を取得
    $content = $_POST["content"];
    
    
    //コメントidから対象のコメント情報を取得
    $comment = Comment::find($id);
    //インスタンス情報を更新
    $comment->content = $content;
    //取得したコメントインスタンスからイベントidを取得
    $event_id = $comment->event_id;
    
    //入力エラーチェック
    $errors = $comment->validate();
    
    // 入力エラーが１つもなければ
    if (count($errors) === 0) {
        
        //更新されたコメントインスタンスの保存
        $flash_message = $comment->save();
        $_SESSION["flash_message"] = $flash_message;
        header("Location:event_show.php?id=" . $event_id);
        exit;
    } else { //入力エラーが１つでもあれば
        $_SESSION["errors"] = $errors;
        header("Location:event_show.php?id=" . $event_id);
        exit;
    }
