<?php
  //(C)
  require_once 'models/User.php';
  session_start();

  $errors = $_SESSION['errors'];
  // var_dump($errors);
  $_SESSION['errors'] = null;

  //ログアウトメッセージをflash_messageから引き出す
  $flash_message = $_SESSION['flash_message'];
  $_SESSION['flash_message'] = null;


  include_once 'views/index_view.php';