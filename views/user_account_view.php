<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>プロフィールページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/user_account_top.css">
      <link rel="stylesheet" href="css/nav.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
           <div class="main-item">
               <h2>アカウント</h2>
               <ul>
                   <li><?=$login_user->name?>さん</li>
                   <li><a href="profile_show.php?id=<?=$login_user->id?>">プロフィールへ</a></li>
               </ul>
           </div>
           <div class="grid">
               <div class="grid-item">
                   <ul>
                       <li><a href ="user_show.php?id=<?=$login_user->id?>"><i class="fas fa-user-cog fa-2x green"></i></a></li>
                       <li><a href ="user_show.php?id=<?=$login_user->id?>">個人情報&nbsp;<span>&gt;</span></a></li>
                       <li>個人情報を参照する</li>
                   </ul>
               </div>
               <div class="grid-item">
                   <ul>
                       <li><a href ="favorite_show.php?id=<?=$login_user->id?>"><i class="far fa-heart fa-2x pink"></i></a></li>
                       <li><a href ="favorite_show.php?id=<?=$login_user->id?>">お気に入り&nbsp;<span>&gt;</span></a></li>
                       <li>お気に入りのイベントを参照する</li>
                   </ul>
               </div>
               <div class="grid-item">
                   <ul>
                       <li><a href="message_top.php?id=<?=$loin_user->id?>"><i class="far fa-comments fa-2x yellow"></i></a></li>
                       <li><a href="message_top.php?id=<?=$login_user->id?>">メッセージ&nbsp;<span>&gt;</span></a></li>
                       <li>メッセージを参照する</li>
                   </ul>                  
               </div>
               <div class="grid-item">
                   <ul>
                       <li><a href ="event_participant_show.php?id=<?=$login_user->id?>"><i class="far fa-bookmark fa-2x yellow"></i></a></li>
                       <li><a href ="event_participant_show.php?id=<?=$login_user->id?>">参加予定&nbsp;<span>&gt;</span></a></li>
                       <li>参加予定イベントを参照する</li>
                   </ul>                     
               </div>
               <div class="grid-item">
                   <ul>
                       <li><a href ="host_event_show.php?id=<?=$login_user->id?>"><i class="far fa-calendar-alt fa-2x blue"></i></a></li>
                       <li><a href ="host_event_show.php?id=<?=$login_user->id?>">ホストイベント&nbsp;<span>&gt;</span></a></li>
                       <li>ホストしているイベントを参照する</li>
                   </ul>                        
               </div>
               <div class="grid-item">
                   <ul>
                       <li><a href ="logout.php"><i class="far fa-share-square fa-2x green"></i></a></li>
                       <li><a href ="logout.php">ログアウト&nbsp;<span>&gt;</span></a></li>
                       <li>ログアウトする</li>
                   </ul>                     
               </div>
           </div>
       </main>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/nav.js"></script>       
   </body>
</html>