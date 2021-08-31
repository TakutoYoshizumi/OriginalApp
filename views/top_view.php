<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>トップページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/account.css">
      <link rel="stylesheet" href="css/loader.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <script src="js/pace.js"></script>
   </head>
   <style>
      #global-container{
         height:100%;
         width:100;
      }
      .wrapper{
      height:700px;
      background-image:url(images/sample.jpg);
      background-position:bottom;
      background-size:cover;
      }
   </style>
   <body
      <header>
      <div id="global-container">
         <!-- ナビゲーションバー -->
         <nav class="navbar navbar-light fixed-top">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <ul class="nav">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="user_account.php?id=<?=$login_user->id?>">アカウント</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">メッセージ</a>
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
                  <img src="images/icon.jpg">
               </div>
            </div>
         </nav>
      </header>
      <div class="wrapper">
      </div>
      </div>
   </body>
</html>