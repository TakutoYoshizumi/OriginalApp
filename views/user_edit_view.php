<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>アカウントページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/profile_edit.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
   </head>
   <body>
      <header>
         <!-- ナビゲーションバー -->
         <nav class="navbar navbar-light fixed-top">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <div id="nav">
               <div class="menu-btn">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
               <div class="user-icon">
                  <img src="upload/<?=$user_icon?>">
               </div>
            </div>
         </nav>
      </header>
      <main>
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
            <div class="grid">
               <div class="grid-item-left">
                  <img src="upload/<?=$user_icon?>" class="icon">
               </div>
               <div class="grid-item-right">
                  <div class="items">
                     <h2>アカウント編集ページ</h2>
                  </div>
                  <form action = "user_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
                     <div class="col-md-8 mb-4">
                        <label class="form-label mb-3">ユーザー名</label>
                        <input type="text" name="name" value="<?=$user->name?>" class="form-control" id="inputAddress" placeholder=<?=$user->name?>>
                     </div>
                     <div class="col-md-8 mb-4">
                        <label class="form-label mb-3">ユーザーID</label>
                        <P><?=$user->account?></P>
                        <P>※ユーザーIDは編集できません</P>
                     </div>
                     <div class="col-md-8 mb-4">
                        <label class="form-label mb-3">パスワード</label>
                        <input type="text" name="password" value="<?=$user->password?>" class="form-control" id="inputAddress" placeholder=<?=$user->password?>>
                        <p>※パスワードは半角英小文字大文字数字を全て含む8文字以上で入力してください</p>
                     </div>                  
                     <input type="hidden" name="id" value="<?=$user->id?>">
                     <div class="col-6">
                           <input class="btn btn-primary my-4" type="submit" value="Submit">
                        </div>
                  </form>
                  <ul>
                     <li>トップページへ戻りますか？</li>
                     <li><a href="top.php">トップページはこちら&#8599;</a></li>
                  </ul>
                  <ul>
                     <li>アカウントページへ戻りますか？</li>
                     <li><a href="user_account.php?id=<?=$login_user->id?>">アカウントページはこちら&#8599;</a></li>
                  </ul>                   
                  </div>
               </div>
      </main>
      <footer></footer>
   </body>
</html>
