<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>イベントページ</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link rel="stylesheet" href="css/event_show.css">
      <link rel="stylesheet" href="css/nav.css">
      <link rel="stylesheet" href="css/reset.css">
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
            </div>
            </div>
         </nav>
      </header>
      <main>
         <div class="grid">
            <div class="nav host_menu">
            <?php if ($event->user_id == $login_user->id):?>
               <P>ホストメニュー</P>
               <div class="nav_btn"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
               <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
               </svg></a></div>
               <!--編集、削除ボタン（ホストユーザー）-->
               <ul class="d-flex hide toggle host_option">
                  <li><a class="btn btn-outline-dark" href="event_destroy.php?id=<?=$event->id?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></a></li>
                  <li class="mt-2"><a class="btn btn-outline-dark" href="event_edit.php?id=<?=$event->id?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a></li>                                 
               </ul>
               <?php endif;?>               
            </div>
            <div class="flash_message">
               <!--入力エラー表示-->
               <?php if ($errors !== null):?>
               <ul>
                  <?php foreach ($errors as $error): ?>
                  <li><?= $error?></li>
                  <?php endforeach;?>
               </ul>
               <?php endif; ?>
               <!--フラッシュメッセージ表示-->
               <?php if ($flash_message !== null):?>
               <ul>
                  <li><?= $flash_message?></li>
               </ul>
            <?php endif; ?>                  
            </div>
            <div class="grid-top">
               <div class="event_info">
                  <P><?=$event->type?></P>
                  <h2><?=$event->name?></h2>
               </div>
               <div class="likes_wrapper d-flex">
                  <div class="likes">
               <?php if (! $event->is_favorite($login_user->id)): ?>
              <form action="favorite_store.php" method="POST">
                  <input type="hidden" name="event_id" value="<?=$event->id?>">
                  <label class="like_label">
                  <svg class="add_like"xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                  </svg>
                     <input type="submit"style="display:none">
                  </label>                  
              </form>  
               <?php else :?>
              <form action="favorite_destroy.php" method="POST">
                  <input type="hidden" name="event_id" value="<?=$event->id?>">
                  <label class="like_label">
                  <svg class="delete_like" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg>
                     <input type="submit"style="display:none">
                  </label>                  
              </form>  
              <?php endif;?>                  
               </div>
               <div class="likes_info mb-4">
               <?php if( count($favorites) !== 0) :?>
               <p class="my-1"><?= count($favorites)?>人がいいね!しました</p>
               <?php endif;?>
                 <ul class="d-flex">
                <?php for ($i=0; $i<5; $i++) { ?>
                       <li class="mx-2"><a href="profile_show.php?id=<?=$favorites[$i]->user_id?>"><?= $favorites[$i]->name ?></a></li>
                <?php } ?>
                 </ul>
              </div>                 
                        
              </div>
              <div class="event_img">
                     <img src="upload/<?=$event->image?>" class="icon">
                    <input type="hidden" name="id" value="<?=$event->id?>">
               </div>
            </div>
            <div class="grid-bottom">
               <div class="user">
                  <div class="mx-1"><svg xmlns="http://www.w3.org/2000/svg"width="18" height="18" style="color:#ffc516;" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></div>
                  <h2 class="user_name"><a href="profile_all_show.php?id=<?=$event_host->user_id?>"><?=$event_host->name?></a>さんがホストするイベント</h2>
                 <div class="user_img"><a href="profile_all_show.php?id=<?=$event_host->user_id?>"><img src="upload/<?=$event_host->image?>"></a></div>
               </div>
               <ul class="created">
                  <li><?=set_time($event->created_at)?>に投稿されました</li>
                </ul>
               <div class="event_content">
                  <section>
                     <h2>イベント内容</h2>
                     <P><?=$event->content?></P>
                  </section>
                  <section>
                     <h2>カテゴリー</h2>
                     <div class="d-flex">
                     <?php foreach ($categories as $category):?>
                     <p class="me-5"><?=$category->type ?><p>
                     <?php endforeach; ?> 
                     </div>
                  </section>                  
                  <section class="flex">
                     <div class="section-item">
                        <h2>イベント開催日</h2>
                        <P><?=set_time($event->day)?></P>
                     </div>
                     <div class="section-item">
                        <h2>イベント開始時間</h2>
                        <P><?=$event->time?></P>
                     </div>
                  </section>
                  <section class="flex">
                     <div class="section-item">
                        <div>
                        <h2>募集員数</h2>
                        <P><?=$event->participants?>人</P>
                        </div>
                        <div class="event_number">
                            <p>参加予定人数:<?= count($participants)?>人</p>
                            <?php if(($event->participants) == (count($participants))):?>
                            <p>募集人数:満員</p>
                            <?php else:?>
                            <p>募集人数:残り<?=($event->participants) - (count($participants))?>人</p>
                            <?php endif;?>
                      　   </div>
                        <div class="event_join">
                        <h2>イベントに参加する</h2>
                        <!--開催日が過ぎていない場合-->
                        <?php if((current_time()) <= (set_time($event->day))):?>
                        <?php if (! $event->is_participant($login_user->id)): ?>
                        <?php if(($event->participants) != (count($participants))):?>
                     　 <form action="participant_store.php" method="POST">
                           <input type="hidden" name="event_id" value="<?=$event->id?>">
                           <label>
                           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="color: #e91e63" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                             <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                             <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                           </svg>                              
                           <button type="subbmit" style="display:none">イベントに参加</button>
                           </label>
                           <p class="mt-2">参加する</p>
                        </form>
                        <?php else :?>
                        <p>募集人数に達しました</p>
                        <?php endif;?>
                        <?php else :?>
                       <form action="participant_destroy.php" method="POST">
                           <input type="hidden" name="event_id" value="<?=$event->id?>">
                           <label>
                           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="color: #e91e63" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                             <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                             <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                           </svg> 
                           <button type="submit" style="display:none">イベント参加をやめる</button>
                           </label>
                           <p class="mt-2">参加をキャンセルする</p>
                       </form>
                       <?php endif;?>
                       <?php else :?>
                       <!--開催日が過ぎている場合-->
                       <p style="color: #da4175;">終了したイベントです</p>
                       <?php endif;?>
                    </div>
                    
                     </div>
                     <div class="section-item">
                        <div>
                           <h2>開催場所</h2>
                           <P id="place"><?=$event->place?></P>
                        </div>
                         <div id="map"></div>
                     </div>
                  </section>
                  <section class="grid my-5 py-4 border-top h-auto">
                     <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2" width="30" height="30"  style="color:#ffc516;" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                       <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                       <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                       <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                     </svg>
   
                       <h3>参加者数:(<?= 1 + count($participants)?>)</h3>
                     </div>  
                     <ul class="d-flex flex-wrap">
                        <div class="addHover d-flex align-items-center mx-2 member_icons">
                           <li class="mb-2"><a href="profile_all_show.php?id=<?=$event_host->user_id?>"><img style="width:50px;height:50px;" src="upload/<?=$event_host->image?>" class="member_icons_img"></a></li>
                           <li><?= $event_host->name ?></li>
                           <li class="mt-2">ホストユーザー</li>
                        </div>   
                        <?php foreach ($participants as $participant): ?>
                       <div class="addHover d-flex align-items-center mx-2 member_icons">
                           <li class="mb-2"><a href="profile_all_show.php?id=<?=$participant->user_id?>"><img style="width:50px;height:50px;" src="upload/<?=$participant->image?>" class="member_icons_img"></a></li>
                           <li><?= $participant->name ?></li>
                        </div>
                        <?php endforeach; ?>
                     </ul>      
                  </section>
                  <section class="grid my-5 py-4 border-bottom border-top h-auto">
                     <div class="d-flex">
                        <svg class="mx-2"xmlns="http://www.w3.org/2000/svg" width="30" height="30" style="color:#ffc516;" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                          <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                        </svg>                        
                        <h3>コメント</h3>
                     </div>
                     <?php if (count($comments) !==0):?>
                     <ul class="comments_wrapper">
                        <?php foreach ($comments as $comment): ?>
                        <div class="d-flex flex-column mb-5 comments">
                           <ul class="mb-3 fs-4"><li><?=$comment->content?></li></ul>
                           <ul class ="d-grid comment_users">
                              <li class="me-3 mb-3 fs-6"><?=$comment->name?>さん</li>
                              <li><?= convert_to_fuzzy_time($comment->created_at)?></li>
                              <?php if($login_user->id === $comment->user_id):?>
                                 <div class="d-flex flex-column nav">
                                     <div class="nav_btn"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                      <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg></a></div>
                                    <div id="hide" class="hide toggle d-flex">
                                     <div class="me-2"><a href="comment_destroy.php?id=<?=$comment->id?> & event_id=<?=$comment->event_id?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></a></div>
                                    <form action="comment_update.php" method="POST">
                                       <label style="cursor: pointer;">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" style="color: #186db1"class="bi bi-pencil-square"viewBox="0 0 16 16">
                                         <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                         <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                       </svg>                              
                                          <input type="hidden" name="id" value="<?=$comment->id?>">
                                          <button type="submit" style="display:none;"></button>
                                       </label>
                                          <input type="text" name="content" placeholder="<?=$comment->content?>"><br>
                                    </form>
                                    </div>
                                 </div>
                              <?php endif;?>
                           </ul>
                        </div>
                        <?php endforeach ;?>
                     </ul>
                     <?php else:?>
                     <P>まだコメントはありません</P>
                     <?php endif;?>
                     <form class="d-flex" action="comment_store.php" method="POST">
                        <label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" class="me-3" style=" color: #408ecc; cursor:pointer" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                          <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>                        
                        <input type="hidden" name="event_id" value="<?=$event->id?>">
                        <button type="submit" style="display:none;"></button>
                        </label>
                        <input type="text" name="content" placeholder="コメントする"><br>
                     </form> 
                  </section>
               </div>                  
            </div>
         </div>
      </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAihpdE_KRvc_OoRa4uvsGYSip3fgTFDQQ"></script>
   <script src="js/geocoder.js"></script>
   <script src="js/hover.js"></script>   
   <script src="js/nav.js"></script>
   </body>
</html>
 
