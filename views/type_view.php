<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>イベントタイプ登録ページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/index/profile.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
   </head>
   <body>
      <div class="wrapper">
         <div class="content">
            
           <form action="type_store.php" method="POST" enctype="multipart/form-data">
               イベントタイプ名: <input type="type" name="type"><br>
               <button type="submit">投稿</button>
           </form>
            <ul>
               <li><a href="event_top.php">イベントページ一覧へ&#8599;</a></li>
               <li><a href="logout.php">ログアウト&#8599;</a></li>
            </ul>           
         </div>
      </div>
   </body>
</html>