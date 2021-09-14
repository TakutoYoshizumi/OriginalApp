<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー一覧ページ</title>
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
        <h1>ユーザー一覧</h1>
 
        <?php if ($flash_message !== null): ?>
        <p><?= $flash_message ?></p>
        <?php endif; ?>
 
        <h2>ユーザー一覧</h2>
        <table>
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>性別</th>
                <th>仕事</th>
                <th>滞在国</th>
                <th>自己紹介</th>
                <th>アイコン</th>
            </tr>
            <?php foreach ($all_profiles as $profile):?>
            <tr>
                <td><a href="profile_show.php?id=<?=$profile->user_id?>"><?=$profile->name?></a></td>
                <td><?=$profile->age?></a></td>
                <td><?=$profile->gender?></a></td>
                <td><?=$profile->job?></a></td>
                <td><?=$profile->country?></a></td>
                <td><?=$profile->introduction?></td>
                <td><img src="upload/<?=$profile->image?>"></td>
            </tr>
            <?php endforeach;?>
 
        </table>
        <p><a href="top.php">トップページ</a></p>
    </body>
</html>