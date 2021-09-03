<?php
  //(C)
  session_start();
  
  //入力エラーを受け取る
  $errors = $_SESSION["errors"];
  $_SESSION["errors"] = null;
  
  include_once "views/user_create_view.php";