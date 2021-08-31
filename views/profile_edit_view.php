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
                  <img src="images/icon.jpg">
               </div>
            </div>
         </nav>
      </header>
      <main>
         <form action = "profile_update.php" method="POST" enctype="multipart/form-data" class="row g-3 form">
            <div class="grid">
               <div class="grid-item-left">
                  <img src="upload/<?=$profiles->image?>" class="icon">
                  <input type="file" name="image"><br>
               </div>
               <div class="grid-item-right">
                  <div class="items">
                     <h2>Hello&nbsp;<?=$login_user->name?>さん</h2>
                     <ul>
                        <li><?=$login_user->created_at?>からユーザーサービスを利用してます</li>
                     </ul>
                  </div>
                  
                     <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label mb-3">自己紹介</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="introduction" value="<?=$profile->introduction?>"><?=$profiles->introduction?>
                        </textarea>
                     </div>
                     <div class="col-md-8 mb-4">
                        <label class="form-label mb-3">滞在国</label>
                        <input type="text" name="country" value="<?=$profiles->country?>" class="form-control" id="inputAddress" placeholder=<?=$profiles->country?>>
                     </div>
                     <div class="col-md-8 mb-4">
                        <!--値がセットされていたらchecked-->
                        <label class="form-label mb-3">性別</label>
                        　　　　　　　　　　
                        <div class="form-check form-check-inline ml-3">
                           <div class="form-check form-check-inline ml-3">
                              <input type="radio" name="gender" value="男性"
                                 <?php if($profiles->gender === "男性"):?>
                                 checked
                                 <?php endif;?>>
                              <label class="form-check-label " for="inlineRadio1">男性</label>
                              <input type="radio" name="gender" value="女性" 
                                 <?php if($profiles->gender === "女性"):?>
                                 checked
                                 <?php endif;?>>
                              <label class="form-check-label " for="inlineRadio2">女性</label>                          
                           </div>
                        </div>
                        <div class="col-md-6">
                           <label for="inputPassword4" class="form-label mb-3">年齢</label>
                           <input type="number" name="age" value="<?=$profiles->age?>" class="form-control" id="inputPassword4" placeholder=<?=$profiles->age?>歳>
                        </div>
                        <div class="col-md-8">
                           <label class="form-label mb-3" >仕事</label>
                           <input type="text" name="job" value="<?=$profiles->job?>" class="form-control" id="inputAddress2" placeholder=<?=$profiles->job?>>
                        </div>
                        <input type="hidden" name="id" value="<?=$profiles->id?>">
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
      <footer></footer>
   </body>
</html>
