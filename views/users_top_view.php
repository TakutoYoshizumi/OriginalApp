<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザ一覧ページ</title>
        <link rel="stylesheet" href="css/users_top.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/reset.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
    </head>
    <body>
    <header>
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
        <div class="scroll_wrapper">
            <div class="mb-5">
                <h1><span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                </svg></span>全てのユーザー</h1>
                    <div id="buttons" class="mb-3">
                        <button value="男性">男性</button>
                        <button value="女性">女性</button>
                        <button value="all">All</button>
                    </div>
                    <div class="search-area">
                        <form>
                            <input type="text" id="search-text" name="country" placeholder="国名を入力してください">
                            <label>
                            <svg xmlns="http://www.w3.org/2000/svg" class="m-2" width="25" height="25" style="cursor: pointer;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            <input id="search_btn" type="button" style="display:none" display value="検索">
                            </label>
                        </form>
                    </div>
                </div>
            <h3>ユーザーと繋がろう</h3>
            <div class="content d-grid">
                <?php foreach ($users as $user):?>
                <div class="grid_wrapper <?=$user->gender?> <?=$user->country?>">
                    <div class="grid_img"><a href="profile_all_show.php?id=<?=$user->id?>"><img src="upload/<?=$user->image?>">
                        </a></li>
                        </div>
                    <div class="grid_items">
                        <div class="d-grid">
                            <h2><?=$user->name?><span class="small">さん</span></h2>
                        </div>
                        <ul class="d-grid grid_item">
                            <li><?=$user->country?></li>
                        </ul>                    
                        <ul id="none" class="d-grid grid_item">
                            <li><?=$user->gender?></li>
                        </ul>
                        <ul class="d-grid grid_item">
                            <li><?=$user->age?>才</li>
                        </ul>   
                        <ul class="d-grid grid_item">
                            <li><?=$user->job?></li>
                        </ul>                      
                        </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="js/nav.js"></script>
     <script src="js/filter.js"></script>
    </body>
</html>