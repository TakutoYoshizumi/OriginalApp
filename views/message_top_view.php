<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>メッセージボックス</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/account.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   </head>
   <body>
      <div id="wrapper">
      <header>
         <!-- ナビゲーションバー -->
         <nav class="navbar navbar-light fixed-top justify-content-end">
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
      <div id="nav_menu">
                  <ul class="nav d-flex">
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user_account.php?id=<?=$login_user->id?>">アカウント</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="message_top.php?id=<?=$login_user->id?>">メッセージ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout">ログアウト</a>
                     </li>
                     <li>
                        <a href="top.php">トップページ</a>
                     </li>
                  </ul>
            </div>
      </header>
      <main>
         <!--入力エラー表示-->
         <?php if ($errors !== null):?>
            <ul>
               <?php foreach ($errors as $error): ?>
               <li><?= $error?></li>
               <?php endforeach;?>
            </ul>
         <?php endif; ?>
         <?php if ($flash_message !== null):?>
            <ul>
               <li><?= $flash_message?></li>
            </ul>
         <?php endif; ?>                  
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
               <div id="section" class="border d-flex align-items-center justify-content-center bg-white">
                  <div class="section-wrapper text-center">
                     <div class="section_img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                        </svg>
                     </div>
                     <h2 class="section-title">メッセージ</h2>
                     <P>友達やグループに非公開で写真やメッセージを送信できます。</P>
                  </div>
               </div>   
               
               </div>
            </div>
         </div>
         </div>
      </main>
      </div>
   </body>
</html>