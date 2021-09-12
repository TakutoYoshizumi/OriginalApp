<?php
  //(C)
  require_once 'filters/LoginFilter.php';
  require_once 'models/User.php';
  require_once 'models/Profile.php';
  require_once 'models/Message.php';
  require_once 'models/Message_Relation.php';

  session_start();

  // セッションからログインユーザー情報を取得
   //ログインユーザーを送信ユーザーとする
  $login_user = $_SESSION['login_user'];
  $send_user_id = $login_user->id;

  //メッセージ履歴のあるユーザーを一覧を取得
  $message_relation_users = Message_Relation::get_message_relations($send_user_id);

  //メッセージのやりとりのあるidを取得
  foreach ($message_relation_users as $user) {
      if ($user->send_user_id === $send_user_id) {
          $relation_user = $user->receive_user_id;
          $users[] = $relation_user;
      } elseif ($user->receive_user_id === $send_user_id) {
          $relation_user = $user->send_user_id;
          $users[] = $relation_user;
      }
  }

//重複チェック
      $relation_users = array_unique($users);

  foreach ($relation_users as $relation_user) {
      $last_message = Message::get_last_message($relation_user, $send_user_id);

//ユーザーが最後にメッセージを送っていれば
      if ($last_message->send_user_id === $login_user->id) {
          $receive_user = $last_message->receive_user_id;

          $messages[] = Message::get_last_message_by_user($send_user_id, $receive_user);

 //ユーザーが最後にメッセージを受け取っていれば
      } else {
          $receive_user = $last_message->receive_user_id;
        //変数が上書きになるので$send_idに変数にelse文は変更
        $send_user = $last_message->send_user_id;

          $messages[] = Message::get_last_message_by_other($send_user, $receive_user);
      }
  }

 //セッションからユーザーアイコンを取得
    $user_icon = $_SESSION['user_icon'];

  include_once 'views/message_top_view.php';