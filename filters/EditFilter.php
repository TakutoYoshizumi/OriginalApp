<?php
    
    // ログインしているユーザーだけアクセスできるようにするfilter
    
    // セッション開始
    session_start();
    $login_user = $_SESSION['login_user'];
    
    //parse_url関数でURLを要素に分解
    $urlElement = parse_url($_SERVER["REQUEST_URI"]);
    //parse_url関数でクエリ文字列を分析
    //取得したURLのパラメーターの値がログインユーザーIDと異なる場合
    if($urlElement[query] != ("id=".$login_user->id)){
        
        $_SESSION['flash_message'] = '不正アクセスです';
        // 画面遷移
        header('Location: index.php');
        exit;

    }
