<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>イベント作成ページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/event_create.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
   </head>
   <style>
      
   </style>
   <body>
      <div id="wrapper" class="d-grid">
         <section class="content">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <div class="section_info">
               <p>こんにちは、<?= $login_user->name ?>さん</p>
               <p>イベントのホスティングに挑戦しよう！！</p>
            </div>
            <!--入力エラー表示-->
            <?php if ($errors !== null):?>
            <ul>
               <?php foreach ($errors as $error): ?>
               <li class="my-2"><?= $error?></li>
               <?php endforeach;?>
            </ul>
            <?php endif; ?>
         </section>
         <section class="forms position-relative">
            <form action="event_store.php" method="POST" enctype="multipart/form-data">
               <div class="form form1 current">
                  <div class="form-floating mb-3">
                    <input type="text"name="name" class="form-control" id="floatingInput" placeholder="イベント名">
                    <label for="floatingInput">イベント名</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="textarea" name="content" class="form-control" id="floatingInput" placeholder="イベント内容">
                    <label for="floatingInput">イベント内容</label>
                  </div>
                  <div class="label d-flex">
                  <label class="file_label">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                     </svg>
                     <input id="file" type="file" name="image" style="display:none">
                  </label>
                  <p id="file_desc">写真をアップロード</p>
                  </div>
                  <img src="" class="icon" id="result">
                  
               </div>
               <div class="form form2">
                  <h2>イベントカテゴリー</h2>
                  <?php foreach ($categories as $category): ?>
                  <div class="my-3">
                  <input type ="checkbox" name="category_id[ ]" value="<?=$category->id?>"><?=$category->type?>
                  </div>
                  <?php endforeach; ?>
               </p>          
               </div>
               <div class="form form3">
                  <div class="form-floating mb-4">
                       <input type="text"name="place" class="form-control" id="floatingInput" placeholder="開催地">
                       <label for="floatingInput">開催地</label>
                  </div>
                  <div class="form-floating mb-4">
                       <input type="date"name="day" class="form-control" id="floatingInput" placeholder="開催日">
                       <label for="floatingInput">開催日</label>
                  </div>
                  <div class="form-floating mb-4">
                       <input type="time"name="time" class="form-control" id="floatingInput" placeholder="開催時間">
                       <label for="floatingInput">開催時間</label>
                  </div>
                  <div class="form-floating mb-4">
                       <input type="number"name="participants" class="form-control" id="floatingInput" placeholder="参加人数">
                       <label for="floatingInput">参加人数</label>
                  </div>
                  <label class="mb-4 w-100">
                  イベントタイプ: <input type="radio" name="type" value="オンライン" checked>オンライン
                                 <input type="radio" name="type" value="対面">対面
                  </label>
                  <button id="btn" type="submit" class="btn btn-outline-dark">投稿</button>
               </div>
               <ul class="d-flex btn_wrapper">
                  <li><a class="back btn btn-dark" href="#">戻る</a></li>
                  <li><a class="btn btn-dark" href="top.php">トップへ&#8599;</a></li>
                  <li><a class="next btn btn-dark" href="#">次へ</a></li>
               </ul>
           </form>
          </section> 
         </div>
      </div>
      <script src="js/form.js"></script>
      <script src="js/file.js"></script>
   </body>
</html>