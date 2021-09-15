<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>アカウントページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/profile.css">
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
         <div class="grid">
            <!--入力エラー表示-->
            <?php if ($errors !== null):?>
            <ul>
               <?php foreach ($errors as $error): ?>
               <li><?= $error?></li>
               <?php endforeach;?>
            </ul>
            <?php endif; ?>
 
            <div class="grid-item-left">
               <img src="upload/<?=$user_icon?>" class="icon">
               <input type="hidden" name="id" value="<?=$profile->id?>">
            </div>
            <div class="grid-item-right">
               <div class="items">
                  <ul>
                     <li><?=$user->created_at?>からユーザーサービスを利用してます</li>
                     <?php if ($user->id == $login_user->id):?>
                     <li><a href="user_edit.php?id=<?=$login_user->id?>">アカウント情報を編集</a></li>
                     <?php endif;?>
                  </ul>
 
               <?php if ($flash_message !== null):?>
               <ul>
                  <li class="flash_message"><?= $flash_message?></li>
               </ul>
               <?php endif; ?>                   
               </div>
               <div class="profile">
                  <section>
                     <h2>ユーザー名</h2>
                     <P><?=$user->name?></P>
                  </section>
                  <section>
                     <h2>ユーザーID</h2>
                     <P><?=$user->account?></P>
                  </section>
                  <section>
                     <h2>パスワード</h2>
                     <P><?=$user->password?></P>
                  </section>
               </div>
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