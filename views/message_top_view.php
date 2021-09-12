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
   <style>
      main{
         height:100%;
      }
      #message-wrapper{
         padding: 80px 0;
      }
      .flex{
         display:flex;
         flex-direction:column;
      }
      ul{
         padding: 20px 0;
         flex-direction: column;
      }
      .my{
         align-items: flex-end;
      }
      .other{
             align-items: flex-start;
      }
      img{
         width: 30px;
    height: 30px;
    border-radius: 50%;
      }
   </style>
   <header>
  <!-- ナビゲーションバー -->
      <nav class="navbar navbar-light fixed-top">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
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
            </ul>
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
           <div class="main-item h-100">
               <h2>アカウント</h2>
               
               <div class="d-flex h-100 w-100 justify-content-between">
                  <div class="w-25 h-100 border">
                     <div>
                     <?php foreach($messages as $message): ?>
                     <ul>
                     <li><a href="message_show.php?id=<?= $message->user_id ?>"><?= $message->name ?></a></li>
                     <li><img src="upload/<?=$message->image?>"></li>
                     <li><?= $message->message_content?></li>
                     <li><?= $message->created_at?></li>
                     </ul>
                     <?php endforeach; ?>
                        
                     </div>
                  </div>
                  </div>
                  <div class="w-50 h-100 border">
                     <div id="message-wrapper">
                     </div>
                     <p><a href="top.php">トップページ</a></p>
                  </div>
               </div>
           </div>
           </div>
       </main>
       <footer></footer>
   </body>
</html>