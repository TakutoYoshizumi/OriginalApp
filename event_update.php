<?php
    //(C)
    require_once 'filters/LoginFilter.php';
    require_once 'models/Profile.php';
    require_once 'models/User.php';
    require_once "models/Event.php";
    require_once "models/Event_Category_Relation.php";
    
    session_start();
    
    //セッションからログインユーザー情報取得
    $login_user = $_SESSION["login_user"];
    
    //イベントidを取得
    $id = $_POST['id'];
    
    //その他入力情報を取得
    $name         = $_POST["name"];
    $content      = $_POST["content"];
    $place        = $_POST["place"];
    $day          = $_POST["day"];
    $time         = $_POST["time"];
    $participants = $_POST["participants"];
    $type         = $_POST["type"];
    $image        = $_FILES["image"]["name"];
    //選択されたカテゴリーを取得
    $category_ids = $_POST["category_id"];
    
    //イベントidから対象のイベント情報を取得
    $event = Event::find($id);
    
    // //インスタンス情報を更新する
    $event->name         = $name;
    $event->content      = $content;
    $event->place        = $place;
    $event->day          = $day;
    $event->time         = $time;
    $event->participants = $participants;
    $event->type         = $type;
    
    
    // //入力エラーチェック
    $errors = $event->validate();
    //カテゴリーが選択させれいなければエラーを返す
    if (!isset($category_ids)) {
        $errors[] = "イベントカテゴリーを選択してください";
    }
    
    
    // 入力エラーが１つもなければ
    if (count($errors) === 0) {
        
        //画像が選択されている時
        if (empty($image) !== true) {
            $event->image = $image;
            $file         = 'upload/' . $image;
            // 画像をuploadディレクトリにファイル保存
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
        }
        //更新されたイベントインスタンスの保存
        $flash_message = $event->save();
        
        //イベントカテゴリーが選択されている場合
        if (isset($category_ids)) {
            //一度紐ずくカテゴリーを削除
            $flash_message = Event_Category_Relation::destroy($event->id);
            //再度イベントインスタンスを作成
            foreach ($category_ids as $category_id) {
                $event_category_relation = new Event_Category_Relation($event->id, $category_id);
                // //入力項目に誤りがないかチェック
                $errors                  = $event_category_relation->validate();
                $event_category_relation->save();
            }
        }
        
        $_SESSION["flash_message"] = $flash_message;
        header("Location:event_show.php?id=" . $id);
        exit;
    } else { //入力エラーが１つでもあれば
        $_SESSION["errors"] = $errors;
        header("Location:event_edit.php?id=" . $id);
        exit;
    }
