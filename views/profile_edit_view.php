<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>プロフィールページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/profile_edit.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
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
                  <img src="upload/<?=$profile->image?>">
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
         <form action = "profile_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
            <div class="grid">
               <div class="grid-item-left">
                  <img src="upload/<?=$profile->image?>" class="icon" id="result">
                  <div class="label">
                  <label class="file_label">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                     </svg>
                     <input id="file" type="file" name="image" style="display:none">
                  </label>
                  <p id="file_desc">写真をアップロード</p>
                  </div>
               </div>
               <div class="grid-item-right">
                  <div class="items">
                     <h2>Hello&nbsp;<?=$login_user->name?>さん</h2>
                     <ul class="user_info">
                        <li><?=$login_user->created_at?>からユーザーサービスを利用してます</li>
                        <li><a href="profile_show.php?id=<?=$login_user->id?>">プロフィールへ戻る&#8599;</a></li>
                     </ul>
                  </div>
                  <div class="mb-4">
                     <label for="exampleFormControlTextarea1" class="form-label mb-3">自己紹介</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="introduction" value="<?=$profile->introduction?>"><?=$profile->introduction?>
                     </textarea>
                  </div>
                  <div class="col-lg-6 mb-4">
                     <label class="form-label mb-3">滞在国</label>
                     <input type="text" name="country" value="<?=$profile->country?>" class="form-control" id="inputAddress" placeholder=<?=$profile->country?>>
                  </div>
                  <div class="col-md-8 mb-4">
                     <!--値がセットされていたらchecked-->
                     <label class="form-label mb-3">性別</label>
                     　　　　　　　　　　
                     <div class="form-check ml-3 mb-3">
                        <div class="form-check form-check-inline ml-3">
                           <input type="radio" name="gender" value="男性"
                              <?php if($profile->gender === "男性"):?>
                              checked
                              <?php endif;?>>
                           <label class="form-check-label " for="inlineRadio1">男性</label>
                           <input type="radio" name="gender" value="女性" 
                              <?php if($profile->gender === "女性"):?>
                              checked
                              <?php endif;?>>
                           <label class="form-check-label " for="inlineRadio2">女性</label>                          
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label for="inputPassword4" class="form-label mb-3">年齢</label>
                        <input type="number" name="age" value="<?=$profile->age?>" class="form-control" id="inputPassword4" placeholder=<?=$profile->age?>歳>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label class="form-label mb-3" >仕事</label>
                        <input type="text" name="job" value="<?=$profile->job?>" class="form-control" id="inputAddress2" placeholder=<?=$profile->job?>>
                     </div>
                     <input type="hidden" name="id" value="<?=$profile->user_id?>">
                     <div class="col-6">
                        <input class="btn btn-primary my-4" type="submit" value="Submit">
                     </div>
                     <ul>
                        <li>トップページへ戻りますか？</li>
                        <li><a href="top.php">トップページはこちら&#8599;</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </form>
      </main>
      <script src="js/file.js"></script>      
   </body>
</html>
