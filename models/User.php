<?php
 //(M)
 //User設計図
 require_once 'models/Model.php'; 
 class User extends Model{
     public $id;
     public $name;
     public $account;
     public $password;
     public $created_at;
     public function __construct($name = '', $account = '', $password = '')
     {
         $this->name = $name;
         $this->account = $account;
         $this->password = $password;
     }
     
     //ユーザー登録メソッド
     public function save(){
         try {
             $pdo = self::get_connection();
             {
                 $stmt = $pdo->prepare('INSERT INTO users (name, account,password) VALUES (:name, :account,:password)');
                 $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                 $stmt->bindParam(':account', $this->account, PDO::PARAM_STR);
                 $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
                 $stmt->execute();
                 self::close_connection($pdo, $stmp);

                 return $this->name.'さんの登録が成功しました。';
             }
         } catch (PDOException $e) {
             return 'PDO exception: '.$e->getMessage();
         }
     }      
     //ログインチェック　メソッド
     public static function login($account,$password){
         try{
                $pdo = self::get_connection();
                $stmt = $pdo -> prepare("SELECT * FROM users WHERE account=:account AND password=:password");
                $stmt->bindParam(':account', $account, PDO::PARAM_STR);
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
     
     //入力チェックバリデーション
      public function validation($account){
         try{
                $errors = array();
                $pdo = self::get_connection();
                //入力値がと同じ値を取得
                $stmt = $pdo -> prepare("SELECT account FROM users WHERE account=:account");
                $stmt->bindParam(':account', $account, PDO::PARAM_STR);
                $stmt->execute();
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // Userクラスのインスタンスを返す
                $user = $stmt->fetch();  
                if($user !==false){
                    $errors[] = '入力されたユーザーIDは存在します';
                }
                 if ($this->name === '') {
                     $errors[] = '名前を入力してください';
                 }
                 if ($this->account === '') {
                     $errors[] = 'ユーザーIDを入力してください';
                 }
                 if($this->password ===""){
                    $errors[] ="パスワードを入力してください";
                 }elseif(!preg_match('/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}+\z/', $this->password)){
                    $errors[] = '半角英小文字大文字数字をそれぞれ1種類以上含む8文字以上のパスワードを入力してください';
                 }                
                self::close_connection($pdo, $stmp);
                return $errors;                
         }catch(PDOException $e){
                return 'PDO exception: ' . $e->getMessage();
         }
     }
     
     //ユーザー削除メソッド
     public static function destroy($id){
             try {
                    $pdo = self::get_connection();

                        $stmt = $pdo -> prepare("DELETE FROM users WHERE id=:id");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "ユーザーを削除しました";
                  } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                 }               
                    
                }
     
     
  }
