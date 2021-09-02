<?php
 //(M)
 //ユーザーのプロフィール設計図
 require_once 'models/Model.php';
 require_once 'models/User.php';
 class Event extends Model{
     
     public $id;
     public $user_id;
     public $name;
     public $content;
     public $place;
     public $day;
     public $time;
     public $participants;
     public $image;
     public $created_at;
     
     public function __construct($user_id='',$name= '', $content = '', $place= '',$day='',$time= '',$image = '',$participants=""){
         
         $this->user_id = $user_id;
         $this->name = $name;
         $this->content = $content;
         $this->place = $place;
         $this->day = $day;
         $this->time= $time;
         $this->image = $image;
         $this->participants= $participants;
         
     }
     
     //ユーザー登録メソッド
     public function save(){
                try {
                    $pdo = self::get_connection();
                    
                    //新規登録の時
                    if($this->id === null){
                        $stmt = $pdo -> prepare("INSERT INTO events (user_id,name,content,place,day,time,image,participants) VALUES (:user_id,:name,:content,:place,:day,:time,:image,:participants)");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                        $stmt->bindParam(':place', $this->place, PDO::PARAM_STR);
                        $stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
                        $stmt->bindParam(':time', $this->time, PDO::PARAM_STR);
                        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                        $stmt->bindParam(':participants', $this->participants, PDO::PARAM_INT);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "イベントの作成が成功しました";
                    }else{ //更新処理
                        $stmt = $pdo -> prepare("INSERT INTO events (name,content,place,day,time,image,participants) VALUES (:name,:content,:place,:day,:time,:image,:participants)");//変数値を保持しているのでprepare
                        
                        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR);
                        $stmt->bindParam(':place', $this->place, PDO::PARAM_STR);
                        $stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
                        $stmt->bindParam(':time', $this->time, PDO::PARAM_STR);
                        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                        $stmt->bindParam(':participants', $this->participants, PDO::PARAM_INT);
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
         if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]*$/', $this->name)){
            $errors[] = '数字、記号は入力できません';
         }
         if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]*$/', $this->place)){
            $errors[] = '数字、記号は入力できません';
         }         
         if(!preg_match('/^[0-9\s]*$/',$this->day)){
             $errors[]="数字で入力してください";
         }         
         if(!preg_match('/^[0-9\s]*$/',$this->time)){
             $errors[]="数字で入力してください";
         }
         if(!preg_match('/^[0-9\s]*$/',$this->participants)){
             $errors[]="数字で入力してください";
         }         
         return $errors;
     }
     //全プロフィール情報　取得メソッド
     public static function all(){
                try {
                    $pdo = self::get_connection();
                    $stmt = $pdo->query('SELECT id,name, content,place,day,time,participants,image,created_at FROM events');
                    // フェッチの結果を、Postクラスのインスタンスにマッピングする
                    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Event');
                    $events = $stmt->fetchAll();
                    self::close_connection($pdo, $stmp);
                    
                    return $events;
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
            $events = $stmt->fetch();  //ひとり抜き出し
            self::close_connection($pdo, $stmp);
            return $events;                    
        } catch (PDOException $e) {
            return 'PDO exception: ' . $e->getMessage();
                }
            }     
  }
