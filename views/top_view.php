<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>トップページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/top.css">
      <link rel="stylesheet" href="css/loader.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/nav.css">
      <link rel="stylesheet" href="css/swiper.css">
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
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
      <div id="global-container">
      <div id="content">
            <div class="hero">
                <div class="swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero_title">Welcome To Awesome MeetUp</div><img src="images/slider_top1.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <div class="hero_title">Once in a Lifetime Meeting</div><img src="images/slider_top2.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <div class="hero_title">Enjoy Excellent  Experience </div><img src="images/slider_top3.jpg" alt="">
                    </div>
                  </div>
                  <div class="hero_footer">
                      <img class="hero_downarrow" src="images/arrow.svg">
                      <span class="hero_scrolltext">scroll</span>
                 </div>
                </div>    
            </div>
        </div>
      <div id="main">
         <div class="section-wrapper d-grid">
             <div class="section">
                <h2 class="section-title">ユーザーを探す</h2>
                <a href="users_top.php"><img src="images/top1.jpg"></a>
             </div>
             <div class="section">
                <h2 class="section-title">イベントを探す</h2>
                <a href="event_top.php"><img src="images/top2.jpg"></a>
             </div> 
         </div>
         <div class="section-event-wrapper">
             <h2 class="section-main-title">好みのイベントを探す</h2>
             <div class="section-events d-grid">
                <div class="section">
                    <h2 class="section-title">オフラインのイベント</h2>
                    <a href="event_top_offline.php"><img src="images/top3.jpg"></a>
                 </div>
                <div class="section">
                    <h2 class="section-title">オンラインのイベント</h2>
                    <a href="event_top_online.php"><img src="images/top4.jpg"></a>
                </div> 
                <div class="section">
                    <h2 class="section-title">アウトドアのイベント</h2>
                    <a href="event_top_outdoor.php"><img src="images/top5.jpg"></a>
                </div> 
                <div class="section">
                    <h2 class="section-title">インドアのイベント</h2>
                    <a href="event_top_indoor.php"><img src="images/top6.jpg"></a>
             </div>
             </div>
         </div>
         <div class="section-evnt-create">
             <div class="section-create position-relative">
                <h2 class="section-title position-absolute">イベントを作成しよう</h2>
                <a href="event_create.php"><img src="images/top7.jpg"></a>
             </div>             
         </div>
      </div>
      </div>
      <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="js/swiper.js"></script>
      <script src="js/nav.js"></script>
      <script src="js/pace.js"></script>
   </body>
</html>