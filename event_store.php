<?php
    //(C)
    require_once "filters/LoginFilter.php";
    require_once "models/User.php";
    require_once "models/Profile.php";
    require_once "models/Event.php";
    require_once "models/Event_Category_Relation.php";
    
    session_start();
    
    //セッションからログインユーザー情報を取得
    $login_user = $_SESSION["login_user"];
    
    
    //入力情報を取得
    $name         = $_POST["name"];
    $content      = $_POST["content"];
    $place        = $_POST["place"];
    $day          = $_POST["day"];
    $time         = $_POST["time"];
    $type         = $_POST["type"];
    $participants = $_POST["participants"];
    $image        = $_FILES["image"]["name"];
    
    
    //選択されたカテゴリーを取得
    $category_ids = $_POST["category_id"];
    
    //入力からイベントインスタンスを新規作成
    $event = new Event($login_user->id, $name, $content, $place, $day, $time, $image, $participants, $type);
    
    // // //入力項目に誤りがないかチェック
    $errors = $event->validate();
    
    // カテゴリーが選択させれいなければエラーを返す
    if (!isset($category_ids)) {
        $errors[] = "イベントカテゴリーを選択してください";
    }
    
        //画像が選択されていれば
        if ($_FILES["image"]["size"] !== 0) {
            //uploadディレクトリにファイルを保存
            $file = 'upload/' . $image;
            //画像をアップロード
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
        }
    // // 入力エラーが１つもなければ
    if (count($errors) === 0) {
        
        
        // イベントインスタンスを作成
        $event_id = $event->save();
        
        //カテゴリーインスタンスを作成
        foreach ($category_ids as $category_id) {
            $event_category_relation = new Event_Category_Relation($event_id, $category_id);
            // //入力項目に誤りがないかチェック
            $errors                  = $event_category_relation->validate();
            //全体の入力エラーが１つもなけらばイベントリレーションインスタンスを保存
            if (count($errors) === 0){
                 $event_category_relation->save();
                 var_dump("反応している");
            }
        }
        
        $_SESSION["flash_message"] = $flash_message;
        
        header("Location:event_top.php");
        exit;
        
        //   //入力エラーが１つでもあれば
    } else {
        //セッションにエラーを保存
        $_SESSION["errors"] = $errors;
        $input_info = $event;
        $_SESSION["input_info"] = $input_info;
        $_SESSION["category_ids"] = $category_ids;
        header("Location:event_create.php");
        exit;
    }

