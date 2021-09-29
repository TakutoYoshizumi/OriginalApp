<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>メッセージボックス</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/account.css">
      <link rel="stylesheet" href="css/nav.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   </head>
   <body>
      <div id="wrapper">
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
            </div>
            </div>
         </nav>
      </header>
      <main>
         <!--入力エラー表示-->
         <div class="flesh_message my-2">
               <?php if ($errors !== null):?>
               <ul class="errors">
               <?php foreach ($errors as $error): ?>
                  <li><?= $error?></li>
               <?php endforeach;?>
               </ul>
               <?php endif; ?> 
            <!--フラッシュメッセージ表示-->
               <?php if ($flash_message !== null):?>
               <ul>
                  <li class="flash_message"><?= $flash_message?></li>
               </ul>
            <?php endif; ?>
            </div>                     
         <div class="main-item h-100">
            <div class="d-grid">
               <div id="account_list"class="border">
                  <ul class="border user_mess_icons d-flex">
                        <li><img src="upload/<?=$user_icon?>"></li>
                        <li><?=$login_user->name?></li>
                     </ul>                  
                  <div class="user_icons">
                     <?php foreach ($messages as $message): ?>
                     <ul>
                        <div class="d-flex justify-content-center">
                           <li class="px-2"><a href="message_show.php?id=<?= $message->user_id ?>"><img class="account_icon" src="upload/<?=$message->image?>"></a></li>
                           <div class="d-flex flex-column justify-content-center">
                              <li class="name"><a href="message_show.php?id=<?= $message->user_id ?>"><?= $message->name ?></a></li>
                               <div class="d-flex mt-2 flex-column messages">
                                 <li><?= $message->message_content?></li>
                                 <li><?= $message->created_at?></li>
                              </div>
                           </div>
                        </div>
                     </ul>
                     <?php endforeach; ?>
                  </div>
                  <ul>
                     <?php foreach ($users as $user):?>
                        <li><a href="message_show.php?id=<=$user->id?>"><?=$user->name?></a></li>
                     <?php endforeach;?>
                  </ul>
               </div>
               <div id="message_list" class="border others">
                  <ul class="border user_mess_icons d-flex">
                        <li class="px-2"><a href="message_show.php?id=<?= $profile->user_id ?>"><img class="account_icon" src="upload/<?=$profile->image?>"></a></li>
                        <li><?=$profile->name?></li>
                     </ul>
                  <div class="mess_scroll position-relative">
                  <div id="message-wrapper" class="py-4">
                        <?php foreach ($all as $message):?>
                        <!--<!-ーメッセージ表示-->
                        <!--自分が送信するメッセージ-->
                        <?php if ($message->send_user_id === $login_user->id):?>
                        <div class="flex">
                           <ul class="my_mess">
                              <li><?=$message->message_content?></li>
                              <li><?=$message->created_at?></li>
                           </ul>
                        </div>
                        <!--<!-他のユーザーからのメッセージ--->
                        <?php else:?>
                           <div class="other_icons"><img src="upload/<?=$message->image?>"></div>
                           <div class="flex">
                              <ul class="other">
                                 <li><?=$message->message_content?></li>
                                 <li><?=$message->created_at?></li>
                              </ul>
                        </div>
                        <?php endif;?>
                        <?php endforeach ?>
                  </div>
               </div>
               <form action="message_store.php" method="POST">
                 <input class="form" type="text" name="message_content" placeholder="メッセージを入力してください">
                 <input type="hidden" name="receive_user_id" value="<?=$receive_user_id?>">
                 <button class="position-absolute"type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-cursor" viewBox="0 0 16 16">
                    <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103zM2.25 8.184l3.897 1.67a.5.5 0 0 1 .262.263l1.67 3.897L12.743 3.52 2.25 8.184z"/>
                  </svg>
                 </button>
                 </div>
               </form>
               </div>   
               </div>
            </div>
         </div>
         </div>
      </main>
      </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="js/nav.js"></script>         
   </body>
</html>