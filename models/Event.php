<?php
    //(M)
    //イベント設計図
    require_once 'models/Model.php';
    require_once 'models/User.php';
    require_once 'models/Favorite.php';
    require_once 'models/Category.php';
    require_once 'models/Comment.php';
    require_once 'models/Participant.php';
    
    class Event extends Model
    {
        public $id;
        public $user_id;
        public $name;
        public $content;
        public $place;
        public $day;
        public $time;
        public $participants;
        public $type;
        public $image;
        public $created_at;
        
        public function __construct($user_id = '', $name = '', $content = '', $place = '', $day = '', $time = '', $image = '', $participants = '', $type = '')
        {
            $this->user_id      = $user_id;
            $this->name         = $name;
            $this->content      = $content;
            $this->place        = $place;
            $this->day          = $day;
            $this->time         = $time;
            $this->image        = $image;
            $this->participants = $participants;
            $this->type         = $type;
        }
        
        //イベント登録・更新メソッド
        public function save()
        {
            try {
                $pdo = self::get_connection();
                
                //新規登録の時
                if ($this->id === null) {
                    $stmt = $pdo->prepare('INSERT INTO events (user_id,name,content,place,day,time,image,participants,type) VALUES (:user_id,:name,:content,:place,:day,:time,:image,:participants,:type)'); //変数値を保持しているのでprepare
                    // バインド処理
                    $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                    $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                    $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                    $stmt->bindParam(':place', $this->place, PDO::PARAM_STR);
                    $stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
                    $stmt->bindParam(':time', $this->time, PDO::PARAM_STR);
                    $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                    $stmt->bindParam(':participants', $this->participants, PDO::PARAM_INT);
                    $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                    $stmt->execute();
                    self::close_connection($pdo, $stmp);
                    
                    return $pdo->lastInsertId();
                } else { //更新処理
                    $stmt = $pdo->prepare('UPDATE events SET name=:name, content=:content, place=:place, day=:day, time=:time, image=:image, participants=:participants,type=:type WHERE id=:id'); //変数値を保持しているのでprepare
                    // バインド処理
                    $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                    $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                    $stmt->bindParam(':place', $this->place, PDO::PARAM_STR);
                    $stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
                    $stmt->bindParam(':time', $this->time, PDO::PARAM_STR);
                    $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                    $stmt->bindParam(':participants', $this->participants, PDO::PARAM_INT);
                    $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                    // 実行
                    $stmt->execute();
                    self::close_connection($pdo, $stmp);
                    
                    return 'イベント情報を更新しました';
                }
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //入力チェック メソッド
        public function validate()
        {
            $errors = array();
            if (!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]+|[ 　]+$/', $this->name)) {
                $errors[] = 'イベント名はひらがな、カタカナ、漢字、アルファベットで入力してください';
            }
            if ($this->content === "") {
                $errors[] = 'イベント内容を入力してください';
            }
            if (!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]+|[ 　]+$/', $this->place)) {
                $errors[] = '開催場所はひらがな、カタカナ、漢字、アルファベットで入力してください';
            }
            if ($this->image === '') {
                $errors[] = '画像を選択してください';
            }
            if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $this->day)) {
                $errors[] = '日にちはxxxx-xx-xxの形式で入力してください';
            } elseif (!((time_for_validate()) <= $this->day)) {
                $errors[] = '日にちは未来の日にちを入力してください';
            }
            if (!preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/', $this->time)) {
                $errors[] = '時刻はxx:xxの形式で入力してください';
            }
            if (!preg_match('/^[1-9][0-9]*$/', $this->participants)) {
                $errors[] = '参加者人数は0以上の数字で入力してください';
            }
            if ($this->type !== 'オンライン' && $this->type !== '対面') {
                $errors[] = 'イベントタイプを選択してください';
            }
            
            return $errors;
        }
        
        //全イベント情報　取得メソッド
        public static function all()
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->query('SELECT * FROM events order by created_at desc');
                // フェッチの結果を、Postクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Event');
                $event = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                
                return $event;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //idから対象のEventオブジェクトを取得するメソッド
        public static function find($id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('select * from events where id=:id'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Event');
                // Userクラスのインスタンスを返す
                $event = $stmt->fetch(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                
                return $event;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        //idから対象のEventオブジェクトを取得するメソッド
        public static function find_host_event($user_id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('select * from events where user_id=:user_id order by created_at desc'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Eventクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Event');
                // Userクラスのインスタンスを返す
                $events = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                
                return $events;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        //idから対象のEvent,ホスト情報を取得するメソッド
        public static function find_host($id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('select profiles.image,events.id,events.user_id,users.name from events join users on events.user_id = users.id join profiles on events.user_id = profiles.user_id where events.id=:id'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Event');
                // Userクラスのインスタンスを返す
                $event = $stmt->fetch(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                
                return $event;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //注目する投稿に紐付いたいいね一覧を取得するメソッド
        public function is_favorite($user_id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM favorites WHERE user_id=:user_id AND event_id=:event_id'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_STR);
                // 実行
                $stmt->execute();
                
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Favorite');
                // Favoriteクラスのインスタンスを抜き出す
                $favorite = $stmt->fetch(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                if ($favorite !== false) {
                    return true;
                } else {
                    return false;
                }
                
                return $favorite;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //注目する投稿に紐付いたいいね一覧を取得するメソッド
        public function favorites()
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT favorites.user_id,users.name FROM favorites JOIN users ON favorites.user_id=users.id WHERE favorites.event_id=:event_id');
                // バインド処理
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                
                // フェッチの結果を、Favoriteクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Favorite');
                //クラスのインスタンス配列を返す
                $favorites = $stmt->fetchAll(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                
                return $favorites;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //このイベントに紐付いたカテゴリー一覧を取得
        public function categories()
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT categories.type FROM categories JOIN event_category_relations ON categories.id = event_category_relations.category_id WHERE event_category_relations.event_id = :event_id');
                // バインド処理
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
                
                // フェッチの結果を、Categoryクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');
                $categories = $stmt->fetchAll();
                self::close_connection($pdo, $stmp);
                
                return $categories;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //このイベントに紐付いたコメント一覧を取得
        public function comments()
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT comments.id,comments.user_id,comments.event_id,users.name,comments.content,comments.created_at FROM comments JOIN users ON comments.user_id=users.id where comments.event_id=:event_id order by created_at desc;'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、Commentクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');
                // Commentクラスのインスタンス配列を返す
                $comments = $stmt->fetchAll(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                
                return $comments;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //注目する投稿に紐付いたイベント参加一覧を取得するメソッド
        public function is_participant($user_id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM participants WHERE user_id=:user_id AND event_id=:event_id'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_STR);
                // 実行
                $stmt->execute();
                
                // フェッチの結果を、Participantクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Participant');
                // Favoriteクラスのインスタンスを抜き出す
                $participant = $stmt->fetch(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                if ($participant !== false) {
                    return true;
                } else {
                    return false;
                }
                
                return $participant;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //注目する投稿に紐付いたイベント参加者一覧を取得するメソッド
        public function participants()
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('SELECT participants.user_id,users.name,profiles.image FROM participants JOIN users ON participants.user_id=users.id JOIN profiles ON participants.user_id = profiles.user_id WHERE participants.event_id=:event_id');
                // バインド処理
                $stmt->bindParam(':event_id', $this->id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                
                // フェッチの結果を、Participantクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Participant');
                //クラスのインスタンス配列を返す
                $participants = $stmt->fetchAll(); //ひとり抜き出し
                self::close_connection($pdo, $stmp);
                
                return $participants;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        //user_id,event_idを指定してイベント削除するメソッド
        public static function destroy($user_id, $event_id)
        {
            try {
                $pdo  = self::get_connection();
                $stmt = $pdo->prepare('DELETE FROM events WHERE user_id=:user_id AND id=:event_id'); //変数値を保持しているのでprepare
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
                $stmt->execute();
                self::close_connection($pdo, $stmp);
                
                return 'イベントを削除しました';
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
    }
