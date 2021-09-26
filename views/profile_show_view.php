<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>プロフィールページ</title>
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
         <div class="tab">
            <ul class="d-flex">
               <li><a href="user_account.php?id=<?=$login_user->id?>">アカウント</a></li>
               <li>&gt;</li>
               <li>プロフィール</li>
            </ul>
         </div>         
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
               <img src="upload/<?=$profile->image?>" class="icon">
               <input type="hidden" name="id" value="<?=$profile->id?>">
            </div>
            <div class="grid-item-right">
               <div class="items">
                  <ul class="user_name d-flex">
                     <li>ユーザー名:&nbsp;</li>
                     <li><?=$profile->name?>さん</li>
                  </ul>
                  <ul class="user_info">
                     <li><?=$profile->created_at?>からユーザーサービスを利用してます</li>
                     <?php if ($profile->user_id == $login_user->id):?>
                     <li><a href="profile_edit.php?id=<?=$login_user->id?>">プロフィールを編集</a></li>
                     <?php endif;?>
                     <?php if ($profile->user_id !== $login_user->id):?>
                     <li><a href="message_show.php?id=<?=$profile->user_id?>">メッセージ送信</a></li>
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
                     <h2>自己紹介</h2>
                     <P><?=$profile->introduction?></P>
                  </section>
                  <section>
                     <h2>滞在国</h2>
                     <P><?=$profile->country?></P>
                  </section>
                  <section class="flex">
                     <div class="section-item">
                        <h2>性別</h2>
                        <P><?=$profile->gender?></P>
                     </div>
                     <div class="section-item">
                        <h2>年齢</h2>
                        <P><?=$profile->age?>歳</P>
                     </div>
                  </section>
                  <section>
                     <h2>仕事</h2>
                     <P><?=$profile->job?></P>
                  </section>
               </div>
               <ul>
                  <li>トップページへ戻りますか？</li>
                  <li><a href="top.php">トップページはこちら&#8599;</a></li>
               </ul>
            </div>
         </div>
      </main>
   </body>
</html>