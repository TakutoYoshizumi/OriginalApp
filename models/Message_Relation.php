<?php

//(M)
require_once 'models/Model.php';
require_once 'models/User.php';
require_once "models/Message.php";
class Meassage_Relation extends Model
{
    public $id;
    public $send_user_id; 
    public $message_id;    
    public $created_at;  
    public function __construct($send_user_id = '', $message_id = '')
  {
      $this->send_user_id = $send_user_id;
      $this->message_id = $message_id;
  }
  

  public function save()
  {
      try {
          $pdo = self::get_connection();
      //新規登録の時
      if ($this->id === null) {
          $stmt = $pdo->prepare('INSERT INTO message_relations (send_user_id, message_id) VALUES (:send_user_id, :message_id'); //変数値を保持しているのでprepare
        // バインド処理
        $stmt->bindParam(':send_user_id', $this->send_user_id, PDO::PARAM_INT);
          $stmt->bindParam(':message_id', $this->message_id, PDO::PARAM_INT);
          $stmt->execute();
          self::close_connection($pdo, $stmp);
          

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
}
