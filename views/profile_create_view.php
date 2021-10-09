<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>プロフィール作成ページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/profile_create.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
   </head>
   <body>
      <div id="wrapper" class="d-grid">
         <section class="content">
            <h1>Awesome&nbsp;<span>Meetup</span></h1>
            <div class="section_info">
               <p>こんにちは、<?= $login_user->name ?>さん</p>
               <p>プロフィールを完成させよう！！</p>
            </div>
            <!--入力エラー表示-->
            <?php if ($errors !== null):?>
            <ul class="flash_message">
               <?php foreach ($errors as $error): ?>
               <li class="my-2"><?= $error?></li>
               <?php endforeach;?>
            </ul>
            <?php endif; ?>
         </section>
         <section class="forms position-relative">
            <form action="profile_store.php" method="POST" enctype="multipart/form-data">
               <div class="form form1 current">
                  <select class="form-select form-select-lg mb-3" id="age"name="age" id="age"  aria-label=".form-select-lg example">
                     <?php if(!isset($input[age])):?>
                    <option selected id="php_age" value="<?=$input[age]?>">年齢</option> 
                    <?php else :?>
                    <option selected id="php_age" value="<?=$input[age]?>"><?=$input[age]?>歳</option> 
                    <?php endif; ?>
                  </select>                
                  <div class="form-floating mb-5">
                    <input id="country" type="text"name="country" class="form-control my-3" id="floatingInput" value="<?=$input[country]?>" placeholder="滞在国">
                    <label for="floatingInput">滞在国</label>
               </div>
                  <div id="gender"class="gender my-5">
                     <label>
                  性別: <input type="radio" name="gender" value="男性" checked>男性
               　　      　<input type="radio" name="gender" value="女性">女性
                  </label><br>
                  </div>
               </div>
               <div class="form form2">
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
               <div class="form form3">
                  <div class="form-floating mb-4">
                       <input type="text"name="job" class="form-control" id="floatingInput" value="<?=$input[job]?>" placeholder="仕事">
                       <label for="floatingInput">仕事</label>
                  </div>
                  <div class="form-floating mb-4">
                  <div class="form-floating mb-4">
                    <textarea id="floatingInput" class="form-control" name='introduction'　value="<?=$input[introduction]?>" 　placeholder="自己紹介" id="floatingTextarea2"  style="height: 150px"></textarea>
                     <?php if(!isset($input[introduction])):?>
                    <label for="floatingTextarea2">自己紹介</label>
                    <?php else :?>
                    <label for="floatingTextarea2"><?=$input[introduction]?></label>
                    <?php endif; ?>                    
                    
                  </div>                     
                  </div>
                  <button id="btn" type="submit" class="btn btn-outline-dark">保存</button>
               </div>
           </form>
               <ul class="d-flex btn_wrapper">
                  <li><a class="back btn btn-dark" href="#">戻る</a></li>
                  <li><a class="next btn btn-dark" href="#">次へ</a></li>
               </ul>
          </section> 
         </div>
      </div>
      <script src="js/form.js"></script>
      <script src="js/file.js"></script>
   </body>
</html>   