<?php
 
//(M)
require_once 'models/Model.php';
require_once 'models/Message.php';
//いいね設計図
class Message_Relation extends Model
{
    public $id;
    public $send_user_id;   //送信するユーザーid
    public $receive_user_id;    //イベントのid
    public $message_count;
    public $created_at;
    public function __construct($send_user_id = '', $receive_user_id = '',$message_count="")
    {
        $this->send_user_id = $send_user_id;
        $this->receive_user_id = $receive_user_id;
        $this->message_content = $message_count;
    }
    
    public function save()
    {
        try {
            $pdo = self::get_connection();
            //新規登録の時
            if ($this->id === null) {
                $stmt = $pdo->prepare('INSERT INTO message_relations (send_user_id, receive_user_id) VALUES (:send_user_id, :receive_user_id)'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':send_user_id', $this->send_user_id, PDO::PARAM_INT);
                $stmt->bindParam(':receive_user_id', $this->receive_user_id, PDO::PARAM_INT);
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
 
    //idから対象のユーザー情報を取得するメソッド
    public static function get_message_relations($send_user_id)
    {
        try {
            $pdo = self::get_connection();
            $stmt = $pdo->prepare('select * from message_relations where (send_user_id=:send_user_id) or (receive_user_id=:send_user_id) order by message_relations.id DESC');
            // バインド処理
            $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
 
            // 実行
            $stmt->execute();
            // フェッチの結果を、Userクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message_Relation');
            // Userクラスのインスタンスを返す
                    $message_relation_users = $stmt->fetchAll();  //ひとり抜き出し
                    self::close_connection($pdo, $stmp);
 
            return $message_relation_users;
        } catch (PDOException $e) {
            return 'PDO exception: '.$e->getMessage();
        }
    }
    
    // public static function insert_message_count($send_user_id,$receive_user_id){
    //     try {
    //         $pdo = self::get_connection();
    //         $stmt = $pdo->prepare('UPDATE message_relations SET message_count = message_count + "1" WHERE(send_user_id = :send_user_id and receive_user_id = :receive_user_id) or (send_user_id = :receive_user_id and receive_user_id =:send_user_id)');
    //         // バインド処理
    //         $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
    //         $stmt->bindParam(':receive_user_id', $send_user_id, PDO::PARAM_INT);
 
    //         // 実行
    //         $stmt->execute();
    //         self::close_connection($pdo, $stmp);
    //         return $stmt->fetch();
    //     } catch (PDOException $e) {
    //         return 'PDO exception: '.$e->getMessage();
    //     }        
    // }
}
