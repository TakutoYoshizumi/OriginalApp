<?php

//(M)
require_once 'models/Model.php';
require_once 'models/User.php';
require_once "models/Message.php";
require_once "models/Profile.php";

   class Message_Relation extends Model {
        // プロパティ;
        public $id;
        public $send_user_id; 
        public $receive_user_id;
        public $created_at;
        // コンストラクタ
        public function __construct($send_user_id='', $receive_user_id=''){
            // プロパティの初期化
            $this->send_user_id = $send_user_id;
            $this->receive_user_id= $receive_user_id;
        }
        
            //自分自身の情報をDBに保存するメソッドを作ろう
            public function save(){
                try {
                    $pdo = self::get_connection();
                    
                    //新規登録の時
                    if($this->id === null){
                        $stmt = $pdo -> prepare("INSERT INTO message_relations (send_user_id, receive_user_id) VALUES (:send_user_id, :receive_user_id)");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':send_user_id', $this->send_user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':receive_user_id', $this->receive_user_id, PDO::PARAM_INT);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return $message_relation;
                    }else{ //更新処理
                        $stmt = $pdo -> prepare("UPDATE comments SET content=:content  WHERE id=:id");//変数値を保持しているのでprepare
            
                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT); 
                        // 実行
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "コメントを更新しました";
                        
                    }
                    
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                }
            }
             //注目するユーザーに紐付いメッセージ一覧を取得するメソッド
            public function get_message($send_user_id,$receive_user_id){
                    try {
                        $pdo = self::get_connection();
                        $stmt = $pdo -> prepare("select * from messages JOIN users ON messages.receive_user_id = users.id where(send_user_id=:send_user_id and receive_user_id=:receive_user_id) or (send_user_id=:receive_user_id and receive_user_id=:send_user_id)");
                        // バインド処理
                        $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':receive_user_id', $receive_user_id, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();
                        
                        //クラスのインスタンス配列を返す
                        $messages = $stmt->fetchAll();  //対象ユーザーのメッセージ情報を全て抜き出し
                        self::close_connection($pdo, $stmp);
                        return $messages;                    
                        
                    } catch (PDOException $e) {
                        return 'PDO exception: ' . $e->getMessage();
                    }                 
                     
                 }

             //idから対象のユーザー情報を取得するメソッド
             public static function find_message_relations($send_user_id){
                    
                 try {
                    $pdo = self::get_connection();
                    $stmt = $pdo -> prepare("select * from message_relations where send_user_id=:send_user_id");//変数値を保持しているのでprepare
                    // バインド処理
                    $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
                    // 実行
                    $stmt->execute();
                    // フェッチの結果を、Userクラスのインスタンスにマッピングする
                    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Message_Relation');
                    // Userクラスのインスタンスを返す
                    $message_relations = $stmt->fetchAll();  //ひとり抜き出し
                    self::close_connection($pdo, $stmp);
                    return $message_relations;
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                        }
                    }
                 
                
            
}

    
    
    