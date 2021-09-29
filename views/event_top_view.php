<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>イベント一覧ページ</title>
        <link rel="stylesheet" href="css/event.css">
        <link rel="stylesheet" href="css/reset.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
    </head>
    <body>
        <!--ビュー(V)-->
        <div class="scroll_wrapper">
        <div class="mb-5">
        <h1>イベント</h1>
        <?php foreach ($categories as $category):?>
        <button value="<?=$category->type?>"><?=$category->type?></button>
        <?php endforeach; ?>
        <button value="all">all</button>
        <?php if ($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
        </div>
            <?php foreach ($event as $event):?>
                <div class="grid_wrapper <?php foreach ($event->categories() as $category):?><?=$category->type?> <?php endforeach; ?> ">
                <div class="grid_img"><a href="event_show.php?id=<?=$event->id?>"><img src="upload/<?=$event->image?>">
                </a></li>
                </div>
                <div class="grid_items">
                    <div class="d-grid">
                        <h2><?=$event->name?></h2>
                    </div>
                    <ul class="d-grid grid_item">
                        <li>イベントカテゴリー</li>
                        <ul class="d-flex flex_categories p-0">
                            <?php foreach ($event->categories() as $category):?>
                            <li class="<?=$category->type?>"><?=$category->type ?><li>
                            <?php endforeach; ?>
                        </ul>
                    </ul>                    
                    <ul class="d-grid grid_item">
                        <li>内容</li>
                        <li><?=$event->content?></li>
                    </ul>                    
                    <ul id="none" class="d-grid grid_item">
                        <li>開催日</li>
                        <li><?=$event->day?></li>
                    </ul>
                    <ul class="d-grid grid_item">
                        <li>開催場所</li>
                        <li><?=$event->place?></li>
                    </ul>   
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <p><a href="event_create.php">イベント作成</a></p>
        <p><a href="top.php">トップページ</a></p>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/filter.js"></script>
    </body>
</html>