<?php
  //(C)
  require_once 'models/User.php';
  session_start();
  
  //セッションからエラーを受け取る
  $errors = $_SESSION['errors'];
  $_SESSION['errors'] = null;

  //ログアウトメッセージをflash_messageから引き出す
  $flash_message = $_SESSION['flash_message'];
  $_SESSION['flash_message'] = null;


  include_once 'views/index_view.php';