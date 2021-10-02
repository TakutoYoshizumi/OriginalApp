<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>新規ユーザー登録</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/user_create.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="icon" type="image/png" href="images/favicon.png" sizes="48x48" />
    </head>
    <body>
        <div class="wrapper">
            <div class="content">
                <h1>新規ユーザー登録</h1>
                <p>Welcome</p>
                <!--入力エラー表示-->
                <div class="flesh_message my-2">
                    <?php if ($errors !== null):?>
                    <ul class="errors d-flex flex-column">
                        <?php foreach ($errors as $error): ?>
                        <li><?= $error?></li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif; ?> 
                    <!--フラッシュメッセージ表示-->
                    <?php if ($flash_message !== null):?>
                    <ul>
                        <li class="flash_message"><?= $flash_message?></li>
                    </ul>
                    <?php endif; ?>
                </div>
                <form action="singup.php" class="my-3 w-50" method="POST">
                    <div class="form-floating mb-4">
                        <input type="text"class="form-control col-6"id="floatingInput" name="name" placeholder="ユーザーネーム">
                        <label for="floatingInput">ユーザー名</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text"class="form-control col-6"id="floatingInput" name="account" placeholder="ユーザーID">
                        <label for="floatingInput">ユーザーID</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="パスワード">
                        <label for="floatingPassword"><span>パスワード<br>半角英小文字大文字数字を全て含む8文字以上</span></label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary w-50 py-2 ">登録</button>
                    </div>
                </form>
                <ul>
                    <li>ログインページへ戻りますか？</li>
                    <li><a href="index.php">ログインページへ&#8599;</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>