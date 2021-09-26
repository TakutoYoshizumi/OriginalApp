<?php

//(M)
require_once 'models/Model.php';
require_once 'models/Event.php';
require_once "models/Category.php";

class Event_Category_Relation extends Model
{
    public $id;
    public $send_user_id;   //送信するユーザーid
    public $event_id;    //イベントのid
    public $created_at;
    public function __construct($event_id = '', $category_id = '')
    {
        $this->event_id = $event_id;
        $this->category_id = $category_id;
    }
  
  public function save()
  {
      try {
          $pdo = self::get_connection();
      //新規登録の時
      if ($this->id === null) {
          $stmt = $pdo->prepare('INSERT INTO event_category_relations (event_id, category_id) VALUES (:event_id, :category_id)'); //変数値を保持しているのでprepare
        // バインド処理
        $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
          $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
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
    //イベントカテゴリーidに紐ずくイベント一覧を取得するメソッド
    public static function find($category_id)
    {
         try {
             $pdo = self::get_connection();
             $stmt = $pdo->prepare('SELECT * FROM event_category_relations WHERE category_id =:category_id');//変数値を保持しているのでprepare
            // バインド処理
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、Event_Category_relationsクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Event_Category_Relation');
            // Event_Category_relationsクラスのインスタンスを返す
            $events = $stmt->fetchAll();  //該当のイベントを全て取得
            self::close_connection($pdo, $stmp);

             return $events;
         } catch (PDOException $e) {
             return 'PDO exception: '.$e->getMessage();
         }
     }    
}
