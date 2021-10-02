<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>個人情報ページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/user.css">
      <link rel="stylesheet" href="css/nav.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
   </head>
   <body>
      <header>
         <!-- ナビゲーションバー -->
         <nav class="navbar navbar-light fixed-top">
            <div class="nav_title"><a href="top.php"><h1 class="d-flex">Awesome&nbsp;<span>Meetup</span></h1></a></div>
            <div class="d-flex position-relative">
                  <div class="user-icon">
                     <a href="user_account.php?id=<?=$login_user->id?>"><img src="upload/<?=$user_icon?>"></a>
                  </div>
               <div id="nav_menu">
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
            <div class="slider-menu">
                    <ul class="menu">
                        <li><a href="user_account.php?id<?=$login_user->id?>">アカウント</a></li>
                        <li><a href="profile_show.php?id=<?=$login_user->id?>">プロフィールへ</a></li>
                        <li><a href="message_top.php?id=<?=$login_user->id?>">メッセージ</a></li>
                        <li><a href ="favorite_show.php?id=<?=$login_user->id?>">お気に入り</a></li>
                        <li><a href="logout.php">ログアウト</a></li>
                    </ul>
             </div>               
            </div>   
         </nav>
      </header>
      <main>
         <h1 class="page-title">個人情報</h1>
         <div class="grid">
            <div class="grid-item-left">
               <img src="upload/<?=$user_icon?>" class="icon">
               <input type="hidden" name="id" value="<?=$profile->id?>">
                <ul class="my-4">
                   <li class="mb-3"><?=$user->name?>さん</li>
                   <li><?=set_time($user->created_at)?>から<br>サービスを利用してます</li>
                </ul>
            </div>
            <div class="grid-item-right">
               <div class="items">
              <!--入力エラー表示-->
               <?php if($errors !== null):?>
               <ul>
                  <?php foreach($errors as $error): ?>
                  <li><?= $error?></li>
                  <?php endforeach;?>
               </ul>
               <?php endif; ?>                  
               <?php if ($flash_message !== null):?>
               <ul>
                  <li class="flash_message"><?= $flash_message?></li>
               </ul>
               <?php endif; ?>                   
               </div>
               <div class="profile">
                  <section>
                     <ul class="d-flex justify-content-between">
                        <li>ユーザー名</li>
                        <li><a href="#" id="edit">編集</a></li>
                     </ul>
                     <form action ="user_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
                     <div class="show">
                        <P><?=$user->name?></P>
                     </div>
                     <div class="mask hide">
                          <div class="col-md-8 mb-4">
                              <label class="form-label mb-3">ユーザー名</label>
                              <input type="text" name="name" value="<?=$user->name?>" class="form-control" id="inputAddress" placeholder=<?=$user->name?>>
                           </div>
                           <input type="hidden" name="id" value="<?=$user->id?>">
                          <div class="col-6">
                              <input class="btn btn-primary mb-2" type="submit" value="保存">
                         </div>                           
                     </div> 
                     </form>
                  </section>
                  <section class="section_userid">
                     <ul class="d-flex justify-content-between">
                        <li>ユーザーID</li>
                     </ul>
                     <P><?=$user->account?></P>
                     <P id="p"class="mt-3 hide">※ユーザーIDは編集できません</P>
                  </section>
                  <section>
                  <form action ="user_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
                     <ul class="d-flex justify-content-between">
                        <li>パスワード</li>
                     </ul>
                     <div class="show">
                        <P><?=$user->password?></P>
                     </div>
                     <div class="mask hide">
                          <div class="col-md-8 mb-4">
                           <form action ="user_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
                              <label class="form-label mb-3">パスワード</label>
                              <input type="text" name="password" value="<?=$user->password?>" class="form-control" id="inputAddress" placeholder=<?=$user->password?>>
                           </div>
                          <input type="hidden" name="id" value="<?=$user->id?>">
                          <div class="col-6">
                              <input class="btn btn-primary mb-2" type="submit" value="保存">
                         </div>
                        </form>
                     </div>                        
                  </section>                  
                  
               </div>
                     <div class="mt-5">
                  <ul class="link">
                     <li><a href="top.php">トップページへ&#8599;</a></li>
                  </ul>
                  <ul class="link">
                     <li><a href="user_account.php?id=<?=$login_user->id?>">アカウントページへ&#8599;</a></li>
                  </ul>  
               </div>
                    </form>
                  </section>
               </div>   
            </div>
         </div>
      </main>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAihpdE_KRvc_OoRa4uvsGYSip3fgTFDQQ"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/tab.js"></script>
      <script src="js/nav.js"></script>      
   </body>
</html>
