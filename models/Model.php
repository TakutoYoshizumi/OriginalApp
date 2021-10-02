<?php
    //(M)
    class Model
    {
        protected static function get_connection()
        {
            try {
                // オプション設定
                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // 失敗したら例外を投げる
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS, //デフォルトのフェッチモードはクラス
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' //MySQL サーバーへの接続時に実行するコマンド
                );
                $pdo     = new PDO('mysql:host=localhost;dbname=originalApp', 'root', '', $options);
                // $pdo = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=yoshizumi_portfolio', 'yoshizumi_pf', 'taku1710', $options);
                return $pdo;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        // データベースとの切断を行うメソッド
        protected static function close_connection($pdo, $stmp)
        {
            try {
                $pdo  = null;
                $stmp = null;
            }
            catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
    }
    
    //時間表示変換メソッド
    function convert_to_fuzzy_time($time_db)
    {
        date_default_timezone_set('Asia/Tokyo'); //デフォルトタイムゾーン設定
        
        $unix     = strtotime($time_db); //created_atの時間
        $now      = time(); //現在の時間
        $diff_sec = $now - $unix;
        
        if ($diff_sec < 60) {
            $time = $diff_sec;
            $unit = "秒前";
        } elseif ($diff_sec < 3600) {
            $time = $diff_sec / 60;
            $unit = "分前";
        } elseif ($diff_sec < 86400) {
            $time = $diff_sec / 3600;
            $unit = "時間前";
        } elseif ($diff_sec < 2764800) {
            $time = $diff_sec / 86400;
            $unit = "日前";
        } else {
            if (date("Y") != date("Y", $unix)) {
                $time = date("Y年n月j日", $unix);
            } else {
                $time = date("n月j日", $unix);
            }
            return $time;
        }
        
        return (int) $time . $unit;
    }
    
    //created_at表示変更メソッド
    function set_time($time_db) //引数->created_at
    {
        date_default_timezone_set('Asia/Tokyo'); //デフォルトタイムゾーン設定
        $dateTime = new DateTime($time_db); //引数の値をもとにインスタンスを作成
        return $time_db = $dateTime->format("Y年m月d日"); //フォーマットで表示形式指定　(xx年xx月xx日)
    }
    //現在の日にちを取得する表示変更メソッド
    function current_time()
    {
        date_default_timezone_set('Asia/Tokyo');
        $dateTime = new DateTime();
        return $time_db = $dateTime->format("Y年m月d日");
    }
    
    //現在の日にちを取得する表示変更メソッド(バリデーション用） 表示形式　開催日の入力形式と同じ
    function time_for_validate()
    {
        date_default_timezone_set('Asia/Tokyo');
        $dateTime = new DateTime();
        return $dateTime->format("Y-m-d");
    }
