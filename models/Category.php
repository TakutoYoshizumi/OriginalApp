<?php
 //(M)
 //イベントカテゴリーの設計図
 require_once 'models/Model.php';
 require_once 'models/User.php';
 require_once "models/Favorite.php";
 
 class Category extends Model{
     
     public $id;
     public $type;
     public $created_at;
     
     public function __construct($type=""){
         
         $this->type = $type;

     }
     
     //イベント登録・更新メソッド
     public function save(){
                try {
                    $pdo = self::get_connection();
                    
                    //新規登録の時
                    if($this->id === null){
                        $stmt = $pdo -> prepare("INSERT INTO categories (type) VALUES (:type)");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "イベントタイプの登録に成功しました";
                    }else{ //更新処理
                        $stmt = $pdo -> prepare("UPDATE events SET name=:name, content=:content, place=:place, day=:day, time=:time, image=:image, participants=:participants WHERE id=:id");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                        $stmt->bindParam(':place', $this->place, PDO::PARAM_STR);
                        $stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
                        $stmt->bindParam(':time', $this->time, PDO::PARAM_STR);
                        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                        $stmt->bindParam(':participants', $this->participants, PDO::PARAM_INT);
                        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "イベント情報を更新しました";
                        
                    }
                    
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                }
            }
     //入力チェック メソッド
     public function validate(){
         $errors = array();
         if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]+|[ 　]+$/', $this->name)){
            $errors[] = 'イベント名は数字、記号は入力できません';
         }
          if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]+|[ 　]+$/', $this->content)){
            $errors[] = 'イベント内容は、数字、記号は入力できません';
         }         
         if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]+|[ 　]+$/', $this->place)){
             $errors[] = 'イベント開催場所は、数字、記号は入力できません';
         }         
         if($this->image === ''){
             $errors[] = '画像を選択してください';
         }
         if(!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/',$this->day)){
             $errors[]="日にちはxxxx-xx-xxの形式で入力してください";
         }   
         if(!preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/',$this->time)){
             $errors[]="時刻はxx:xxの形式で入力してください";
         }
         if(!preg_match('/^[1-9][0-9]*$/',$this->participants)){
             $errors[]="参加者人数は0以上の数字で入力してください";
         }
         return $errors;
     }
     //全カテゴリー情報　取得メソッド
     public static function all(){
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->query('SELECT * FROM categories');
                    // フェッチの結果を、Categoryクラスのインスタンスにマッピングする
                    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Category');
                    $categories = $stmt->fetchAll();
                    self::close_connection($pdo, $stmp);
                    
                    return $categories;
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                }
            }
     
     //idから対象のEventオブジェクトを取得するメソッド
     public static function find($id){
            
         try {
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("select * from events where id=:id");//変数値を保持しているのでprepare
            // バインド処理
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // フェッチの結果を、Userクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event');
            // Userクラスのインスタンスを返す
            $event = $stmt->fetch();  //ひとり抜き出し
            self::close_connection($pdo, $stmp);
            return $event;                    
        } catch (PDOException $e) {
            return 'PDO exception: ' . $e->getMessage();
                }
            }     
    //注目する投稿に紐付いたいいね一覧を取得するメソッド
    public function is_favorite($user_id){
            try {
                        $pdo = self::get_connection();
                        $stmt = $pdo -> prepare("SELECT * FROM favorites WHERE user_id=:user_id AND event_id=:event_id");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':user_id',$user_id, PDO::PARAM_STR);
                        $stmt->bindParam(':event_id', $this->id, PDO::PARAM_STR);
                        // 実行
                        $stmt->execute();
                        
                        // フェッチの結果を、Userクラスのインスタンスにマッピングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Favorite');
                        // Favoriteクラスのインスタンスを抜き出す
                        $favorite = $stmt->fetch();  //ひとり抜き出し
                        self::close_connection($pdo, $stmp);
                        if($favorite !==false){
                            return true;
                        }else{
                            return false;
                        }
                        return $favorite;                    
                        
          } catch (PDOException $e) {
                        return 'PDO exception: ' . $e->getMessage();
                    }                 
                 }

    //注目する投稿に紐付いたいいね一覧を取得するメソッド
    public function favorites(){
                    try {
                        $pdo = self::get_connection();
                        $stmt = $pdo -> prepare("SELECT favorites.user_id,users.name FROM favorites JOIN users ON favorites.user_id=users.id WHERE favorites.event_id=:event_id");
                        // バインド処理
                        $stmt->bindParam(':event_id', $this->id, PDO::PARAM_INT);
                        // 実行
                        $stmt->execute();
                        
                        // フェッチの結果を、Favoriteクラスのインスタンスにマッピングする
                        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Favorite');
                        //クラスのインスタンス配列を返す
                        $favorites = $stmt->fetchAll();  //ひとり抜き出し
                        self::close_connection($pdo, $stmp);
                        return $favorites;                    
                        
                    } catch (PDOException $e) {
                        return 'PDO exception: ' . $e->getMessage();
                    }                 
                     
                 }                   
  }
