<?php
 //(M)
 //いいね設計図
 require_once 'models/Model.php'; 
 require_once "models/Favorite.php";
 class Favorite extends Model{
     public $id;
     public $user_id;
     public $event_id;
     public $created_at;
     public function __construct($user_id = '', $event_id = '')
     {
         $this->user_id = $user_id;
         $this->event_id = $event_id;
     }
     
     //ユーザー登録メソッド
  public function save(){
                try {
                    $pdo = self::get_connection();
                    
                    //新規登録の時
                    if($this->id === null){
                        $stmt = $pdo -> prepare("INSERT INTO favorites (user_id, event_id) VALUES (:user_id, :event_id)");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "いいねが成功しました";
                    }else{ //更新処理
                        $stmt = $pdo -> prepare("UPDATE posts SET title=:title, content=:content,image=:image WHERE id=:id");//変数値を保持しているのでprepare
                        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
                        $stmt->bindParam(':content', $this->content, PDO::PARAM_STR); 
                        $stmt->bindParam(':image', $this->image, PDO::PARAM_STR); 
                        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT); 
                        // 実行
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return $this->id."番目の投稿情報を更新しました";
                        
                    }
                    
                } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
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
     
            //user_idとpost_idを指定してDBから削除するメソッド
                public static function destroy($user_id,$event_id){
             try {
                    $pdo = self::get_connection();

                        $stmt = $pdo -> prepare("DELETE FROM favorites WHERE user_id=:user_id AND event_id=:event_id");//変数値を保持しているのでprepare
                        // バインド処理
                        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
                        $stmt->execute();
                        self::close_connection($pdo, $stmp);
                        return "いいねを削除しました";
                  } catch (PDOException $e) {
                    return 'PDO exception: ' . $e->getMessage();
                 }               
                    
                }
     
     
  }
