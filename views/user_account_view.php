<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>プロフィールページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/account.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
               <img src="images/icon.jpg">
           </div>
       </div>
      </nav>           
  </header>
       <main>
           <div class="main-item">
               <h2>アカウント</h2>
               <ul>
                   <li><?=$login_user->name?></li>
                   <li><a href="profile_show.php">プロフィールへ</a></li>
               </ul>
           </div>
           <div class="grid">
               <div class="grid-item">
                   <ul>
                       <li><i class="fas fa-user-cog fa-2x"></i></li>
                       <li>個人情報&nbsp;<span>&gt;</span></li>
                       <li>個人情報を参照する</li>
                   </ul>
               </div>
               <div class="grid-item"></div>
               <div class="grid-item"></div>
               <div class="grid-item"></div>
               <div class="grid-item"></div>
               <div class="grid-item"></div>
           </div>
       </main>
       <footer></footer>
   </body>
</html>