<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>イベント一覧ページ</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <style>
        table, tr, th, td{
    border:solid 1px black;
}
 
table img{
    width:100px;
}
 
ul img{
    width:100px;
 
 
}
    </style>
    <body>
        <!--ビュー(V)-->
        <h1>イベント</h1>
 
        <?php if ($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
 
        <h2>イベント一覧</h2>
        <table>
            <tr>
                <th>イベント名</th>
                <th>カテゴリー</th>
                <th>内容</th>
                <th>開催日</th>
                <th>開始時間</th>
                <th>開催場所</th>
                <th>参加人数</th>
                <th>イベントタイプ</th>
                <th>画像</th>
                <th>投稿日時</th>
            </tr>
            <?php foreach ($event as $event):?>
            <tr>
                <td><a href="event_show.php?id=<?=$event->id?>"><?=$event->name?></a></td>
                <td>
                    <ul>
                    <?php foreach ($event->categories() as $category):?>
                    <li><?=$category->type ?></li>
                    <?php endforeach; ?>
                    </ul>
                </td>
                <td><?=$event->content?></td>
                <td><?=$event->day?></td>
                <td><?=$event->time?></td>
                <td><?=$event->place?></td>
                <td><?=$event->participants?>人</td>
                <td><?=$event->type?></td>
                <td><img src="upload/<?=$event->image?>"></td>
                <td><?=$event->created_at?></td>
            </tr>
            <?php endforeach;?>
 
        </table>
        <p><a href="event_create.php">イベント作成</a></p>
        <p><a href="top.php">トップページ</a></p>
    </body>
</html>