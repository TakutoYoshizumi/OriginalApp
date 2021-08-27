<?php
 //(M)
 //User設計図
 require_once 'models/Model.php'; 
 class User extends Model{
     public $id;
     public $name;
     public $userID;
     public $password;
     public $created_at;
     public function __construct($name = '', $userID = '', $password = '')
     {
         $this->name = $name;
         $this->userID = $userID;
         $this->password = $password;
     }
     
     //ユーザー登録メソッド
     public function save(){
         try {
             $pdo = self::get_connection();
             {
                 $stmt = $pdo->prepare('INSERT INTO users (name, userID,password) VALUES (:name, :userID,:password)');
                 $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                 $stmt->bindParam(':userID', $this->userID, PDO::PARAM_STR);
                 $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
                 $stmt->execute();
                 self::close_connection($pdo, $stmp);

                 return $this->name.'さんの登録が成功しました。';
             }
         } catch (PDOException $e) {
             return 'PDO exception: '.$e->getMessage();
         }
     }      
     //入力チェック メソッド
     public function validate(){
         $errors = array();
         if ($this->name === '') {
             $errors[] = '名前を入力してください';
         }
         if ($this->userID === '') {
             $errors[] = 'ユーザーIDを入力してください';
         }
         if($this->password ===""){
            $errors[] ="パスワードを入力してください";
         }elseif(!preg_match('/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}+\z/', $this->password)){
            $errors[] = '半角英小文字大文字数字をそれぞれ1種類以上含む8文字以上のパスワードを入力してください';
         }
         return $errors;
     }
     
     //ログインチェック　メソッド
     public static function login($userID,$password){
         try{
                $pdo = self::get_connection();
                $stmt = $pdo -> prepare("SELECT * FROM users WHERE userID=:userID AND password=:password");
                $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // Userクラスのインスタンスを返す
                $user = $stmt->fetch();  
                self::close_connection($pdo, $stmp);
                return $user;                
         }catch(PDOException $e){
                return 'PDO exception: ' . $e->getMessage();
         }
     }
  }
