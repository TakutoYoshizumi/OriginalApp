<?php

  //(M)
  require_once 'models/Model.php';
  require_once 'models/Favorite.php';
  //いいね設計図
  class Favorite extends Model
  {
      public $id;
      public $user_id; //いいねする人のid
      public $event_id; //いいねされるイベントのid
      public $created_at; //いいね登録時間
      public function __construct($user_id = '', $event_id = '')
    {
        $this->user_id = $user_id;
        $this->event_id = $event_id;
    }
      //いいね登録メソッド
      public function save()
      {
          try {
              $pdo = self::get_connection();
          //新規登録の時
          if ($this->id === null) {
              $stmt = $pdo->prepare('INSERT INTO favorites (user_id, event_id) VALUES (:user_id, :event_id)'); //変数値を保持しているのでprepare
            // バインド処理
            $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
              $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
              $stmt->execute();
              self::close_connection($pdo, $stmp);
    
              return 'いいねが成功しました';
          } else { //更新処理
            $stmt = $pdo->prepare('UPDATE posts SET title=:title, content=:content,image=:image WHERE id=:id'); //変数値を保持しているのでprepare
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
              $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
              $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
              $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
              self::close_connection($pdo, $stmp);
    
              return $this->id.'番目の投稿情報を更新しました';
          }
          } catch (PDOException $e) {
              return 'PDO exception: '.$e->getMessage();
          }
      }
      
      //user_id,event_idを指定していいね削除するメソッド
      public static function destroy($user_id, $event_id)
      {
          try {
              $pdo = self::get_connection();
              $stmt = $pdo->prepare('DELETE FROM favorites WHERE user_id=:user_id AND event_id=:event_id'); //変数値を保持しているのでprepare
          // バインド処理
          $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
              $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
              $stmt->execute();
              self::close_connection($pdo, $stmp);
    
              return 'いいねを削除しました';
          } catch (PDOException $e) {
              return 'PDO exception: '.$e->getMessage();
          }
      }
      
      //いいね一覧から対象のいいね一覧を取得するメソッド
      public static function find($user_id)
      {
         try {
             $pdo = self::get_connection();
             $stmt = $pdo->prepare('SELECT * FROM favorites WHERE user_id=:user_id order by created_at desc');//変数値を保持しているのでprepare
            // バインド処理
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、Favoriteクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Favorite');
            // Favoriteクラスのインスタンスを返す
            $favorites = $stmt->fetchAll();  //ひとり抜き出し
            self::close_connection($pdo, $stmp);

             return $favorites;
         } catch (PDOException $e) {
             return 'PDO exception: '.$e->getMessage();
         }
     }      
  }
