<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>イベント作成ページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/index/profile.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
   </head>
   <body>
      <div class="wrapper">
         <div class="content">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <p><?= $login_user->name ?>さんようこそ</p>
            <!--入力エラー表示-->
            <?php if($errors !== null):?>
            <ul>
               <?php foreach($errors as $error): ?>
               <li><?= $error?></li>
               <?php endforeach;?>
            </ul>
            <?php endif; ?>
            
           <form action="event_store.php" method="POST" enctype="multipart/form-data">
               イベント名: <input type="text" name="name"><br>
               イベント内容: <input type="textarea" name="content"><br>
                              写真: <input type="file" name="image"><br>
               開催地: <input type="text" name="place"><br>
               開催日: <input type="date" name="day"><br>
               開催時間: <input type="time" name="time"><br>
               参加人数: <input type="number" name="participants"><br>
               <button type="submit">投稿</button>
           </form>
            <ul>
               <li><a href="event_show.php?id=<?$event->id?>">イベントページへ&#8599;</a></li>
               <li><a href="logout.php">ログアウト&#8599;</a></li>
            </ul>           
         </div>
      </div>
   </body>
</html>