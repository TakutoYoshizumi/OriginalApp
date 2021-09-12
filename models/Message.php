<?php
    // メッセージの設計図を作る
    require_once 'models/Model.php';
    require_once 'models/User.php';
    require_once 'models/Profile.php';

    class Message extends Model
    {
        // プロパティ;
        public $id;
        public $send_user_id;
        public $receive_user_id;
        public $message_content;
        public $created_at;
        // コンストラクタ
        public function __construct($send_user_id = '', $receive_user_id = '', $message_content = '')
        {
            // プロパティの初期化
            $this->send_user_id = $send_user_id;
            $this->receive_user_id = $receive_user_id;
            $this->message_content = $message_content;
        }

        // 入力チェックを行うメソッド
        public function validate()
        {
            // エラー配列を作成
            $errors = array();
            //もしコメント内容が入力されていれば
            if ($this->message_content === '') {
                $errors[] = 'メッセージを入力してください';
            }
            // 完成したエラー配列をはい、あげる
            return $errors;
        }
            // 全テーブル情報を取得するメソッド
            public static function all()
            {
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->query('SELECT * FROM comments WHERE id=:id');
                    // フェッチの結果を、Commentクラスのインスタンスにマッピングする
                    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');
                    $comments = $stmt->fetchAll();
                    self::close_connection($pdo, $stmp);
                    // Commentクラスのインスタンスの配列を返す
                    return $comments;
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }

            //自分自身の情報をDBに保存するメソッドを作ろう
            public function save()
            {
                try {
                    $pdo = self::get_connection();

                    //新規登録の時
                    if ($this->id === null) {
                        $stmt = $pdo->prepare('INSERT INTO messages (send_user_id, receive_user_id,message_content) VALUES (:send_user_id, :receive_user_id,:message_content)');//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':send_user_id', $this->send_user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':receive_user_id', $this->receive_user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':message_content', $this->message_content, PDO::PARAM_STR);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);

                        return 'メッセージを送信しました';
                    } else { //更新処理
                        $stmt = $pdo->prepare('UPDATE comments SET content=:content  WHERE id=:id');//変数値を保持しているのでprepare

                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);

                        return 'コメントを更新しました';
                    }
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }
             //注目するユーザーに紐付いメッセージ一覧を取得するメソッド
            public function get_message($send_user_id, $receive_user_id)
            {
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->prepare('select messages.send_user_id,messages.receive_user_id,messages.message_content,messages.created_at,profiles.image,users.name from messages JOIN profiles ON messages.send_user_id = profiles.user_id JOIN users ON messages.send_user_id=users.id where (send_user_id=:send_user_id and receive_user_id=:receive_user_id) or (send_user_id=:receive_user_id and receive_user_id=:send_user_id) order by messages.id');
                        // バインド処理
                    $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
                    $stmt->bindParam(':receive_user_id', $receive_user_id, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();

                        // フェッチの結果を、Messageクラスのインスタンスにマッピングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
                        //クラスのインスタンス配列を返す
                        $all = $stmt->fetchAll();  //対象ユーザーのメッセージ情報を全て抜き出し
                        self::close_connection($pdo, $stmp);

                    return $all;
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }
             //注目するユーザーに紐付い最後のメッセージを取得するメソッド
            public static function get_last_message($send_user_id, $relation_user)
            {
                try {
                    $pdo = self::get_connection();
                    // $stmt = $pdo->prepare('select messages.message_content,messages.created_at,profiles.image,users.name,profiles.user_id from messages JOIN profiles ON messages.receive_user_id = profiles.user_id JOIN users ON messages.receive_user_id=users.id where (send_user_id=:send_user_id and receive_user_id=:receive_user_id) or (send_user_id=:receive_user_id and receive_user_id=:send_user_id) order by messages.id DESC');
                    $stmt = $pdo->prepare('select *from messages where (send_user_id=:send_user_id and receive_user_id=:relation_user) or (send_user_id=:relation_user and receive_user_id=:send_user_id) order by messages.id DESC');
                        // バインド処理
                    $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
                    $stmt->bindParam(':relation_user', $relation_user, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();

                        // フェッチの結果を、Messageクラスのインスタンスにマッピングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
                        //クラスのインスタンス配列を返す
                        $last_message = $stmt->fetch();  //対象ユーザーのメッセージ情報を全て抜き出し
                        self::close_connection($pdo, $stmp);

                    return $last_message;
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }
             //注目するユーザーに紐付い最後のメッセージを取得するメソッド
            public static function get_last_message_by_user($send_user_id, $receive_user)
            {
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->prepare('select messages.id,messages.message_content,messages.created_at,profiles.image,users.name,profiles.user_id from messages JOIN profiles ON messages.receive_user_id = profiles.user_id JOIN users ON messages.receive_user_id=users.id where (send_user_id=:send_user_id and receive_user_id=:receive_user) or (send_user_id=:receive_user and receive_user_id=:send_user_id) order by messages.id DESC');
                        // バインド処理
                    $stmt->bindParam(':send_user_id', $send_user_id, PDO::PARAM_INT);
                    $stmt->bindParam(':receive_user', $receive_user, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();

                        // フェッチの結果を、Messageクラスのインスタンスにマッピarングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
                        //クラスのインスタンス配列を返す
                        $message = $stmt->fetch();  //対象ユーザーのメッセージ情報を全て抜き出し
                        self::close_connection($pdo, $stmp);

                    return $message;
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }
             //注目するユーザーに紐付い最後のメッセージを取得するメソッド
            public static function get_last_message_by_other($send_user, $receive_user)
            {
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->prepare('select messages.id,message_content,messages.created_at,profiles.image,users.name,profiles.user_id from messages JOIN profiles ON messages.send_user_id = profiles.user_id JOIN users ON messages.send_user_id=users.id where (send_user_id=:send_user and receive_user_id=:receive_user) or (send_user_id=:receive_user and receive_user_id=:send_user) order by messages.id DESC');
                        // バインド処理
                    $stmt->bindParam(':send_user', $send_user, PDO::PARAM_INT);
                    $stmt->bindParam(':receive_user', $receive_user, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();

                        // フェッチの結果を、Messageクラスのインスタンスにマッピングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Message');
                        //クラスのインスタンス配列を返す
                        $message = $stmt->fetch();  //対象ユーザーのメッセージ情報を全て抜き出し
                        self::close_connection($pdo, $stmp);

                    return $message;
                } catch (PDOException $e) {
                    return 'PDO exception: '.$e->getMessage();
                }
            }
    }