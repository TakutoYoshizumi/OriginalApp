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
   </head>
   <style>
      #global-container{
         height:100%;
         width:100%;
      }
      .example{
      height:700px;
      background-image:url(images/sample.jpg);
      background-position:bottom;
      background-size:cover;
      }
      .wrapper{
         width:100%;
         height:100%;
         text-align:center;
      }
   </style>
   <body>
      <div id="global-container">
      <header>
         <!-- ナビゲーションバー -->
         <nav class="navbar navbar-light fixed-top">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <ul class="nav">
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
      <div class="wrapper">
         <div class="example"></div>
         <ul class="nav d-flex flex-column">
               <li class="my-5">
                  <a href="event_create.php?id=<?=$login_user->id?>">イベント作成</a>
                  <a href="event_top.php">イベント一覧ページ</a>
               </li>
               <li class="my-5">
                  <a href="all_profile_top.php">ユーザー一覧ページ</a>
               </li> 
           <?php if ($flash_message !== null): ?>
           <p><?= $flash_message ?></p>
           <?php endif; ?>               
           <form action="event_find.php" method="POST">
              <select name ="category_id">
                 <?php foreach ($categories as $category): ?>
                 <option value="<?=$category->id?>"><?=$category->type?></option>
                 <?php endforeach;?>
              </select>
               <button type="submit">検索</button>
           </form>               
               <!--<li><a href="type.php">イベントタイプ登録（insert用）</a></li>-->
            </ul>   
      </div>
      </div>
      <script src="js/pace.js"></script>
   </body>
</html>