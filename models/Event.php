<?php
 //(M)
 //ユーザーのプロフィール設計図
 require_once 'models/Model.php'; 
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
                        $stmt = $pdo -> prepare("UPDATE profiles SET age=:age,gender=:gender,job=:job,country=:country,introduction=:introduction,image=:image WHERE id=:id");//変数値を保持しているのでprepare
                        
                        $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
                        $stmt->bindParam(':gender', $this->gender, PDO::PARAM_STR);
                        $stmt->bindParam(':job', $this->job, PDO::PARAM_STR);
                        $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
                        $stmt->bindParam(':introduction', $this->introduction, PDO::PARAM_STR);
                        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT); 
                        // $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
                        // 実行
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "プロフィールを更新しました";
                        
                    }
                    
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                }
            }
     //入力チェック メソッド
     public function validate(){
         $errors = array();
         if(!preg_match('/^[0-9\s]*$/',$this->age)){
             $errors[]="数字で入力してください";
         }
         if(!preg_match('/^[ぁ-んァ-ヶー一-龠\s]*$/',$this->job)){
             $errors[]="ひらがな、カタカナ、漢字で入力してください";
         }
         if(!preg_match('/^[ぁ-んァ-ヶーa-zA-Z一-龠\s]*$/', $this->country)){
            $errors[] = '数字、記号は入力できません';
         }
         return $errors;
     }
     //全プロフィール情報　取得メソッド
     public static function all(){
         try {
            $pdo = self::get_connection();
                    $stmt = $pdo->query('SELECT age, gender,job,country,introduction,image FROM profile');
             // フェッチの結果を、Profileクラスのインスタンスにマッピングする
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Profile');
            $profiles = $stmt->fetchAll();
            self::close_connection($pdo, $stmp);
            // Pfofileクラスのインスタンスの配列を返す
            return $profiles;
         } catch (PDOException $e) {
            return 'PDO exception: ' . $e->getMessage();
         }
         
     }
     
     //idから対象のProfileオブジェクトを取得するメソッド
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
