<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">      
      <title>ログインページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
   </head>
   <body>
      <div id="global-container" class="wrapper">
         <div class="content">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <p>Welcome</p>
            <!--入力エラー表示-->
            <?php if($errors !== null):?>
            <ul>
               <?php foreach($errors as $error): ?>
               <li><?= $error?></li>
               <?php endforeach;?>
            </ul>
            <?php endif; ?>
            <?php if($flash_message !== null):?>
            <ul>
               <li><?= $flash_message?></li>
            </ul>
            <?php endif; ?>            
            <form action="login_check.php" class="my-5 w-50" method="POST">
               <div class="form-floating mb-4">
                  <input type="text"class="form-control col-6"id="floatingInput" name="account" placeholder="ユーザーID">
                  <label for="floatingInput">ユーザーID</label>
               </div>
               <div class="form-floating mb-5">
                  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="パスワード">
                  <label for="floatingPassword"><span>パスワード<br>半角英小文字大文字数字を全て含む8文字以上</span></label>
               </div>
               <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-outline-primary w-50 py-2 ">ログイン</button>
               </div>
            </form>
            <ul>
               <li>UserIDをお持ちでないですか？</li>
               <li><a href="user_create.php">新規登録はこちら&#8599;</a></li>
            </ul>
         </div>
      </div>
   </div>
   </body>
</html>