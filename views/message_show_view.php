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
   </style>
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
           <div class="main-item h-100">
               <h2>アカウント</h2>
               
               <div class="d-flex h-100 w-100 justify-content-between">
                  <div class="w-25 h-100 border"></div>
                  <div class="w-50 h-100 border">
                     <div id="message-wrapper">
                     <div class="flex">
                     <?php foreach($messages as $message):?>
                     <!--自分が送信するメッセージ-->
                     <?php if($message->send_user_id === $login_user->id) :?>
                     <ul class="my">
                        <li><?=$message->message_content?></li>
                        <li><?=$message->created_at?></li>
                        <li>自分</li>
                     </ul>
                     <!-他のユーザーからのメッセージ--->
                     <?php else:?>
                     <ul class="other">
                        <li><?=$message->message_content?></li>
                        <li><?=$message->created_at?></li>
                        <li>From<?=$message->name?>さん</li>
                     </ul>
                     <?php endif;?>
                     <?php endforeach ?>
                     </div>
                     
                        
                     </div>
                     <form action="message_store.php" method="POST">
                        <input type="text" name="message_content"><br>
                        <input type="hidden" name="receive_user_id"value="<?=$receive_user_id?>">
                        <button type="submit">投稿</button>
                     </form>
                     <p><a href="top.php">トップページ</a></p>
                  </div>
               </div>
           </div>

           </div>
       </main>
       <footer></footer>
   </body>
</html>

       