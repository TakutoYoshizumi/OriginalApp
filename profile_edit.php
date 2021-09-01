<?php
  require_once "filters/LoginFilter.php";
  require_once "models/Profile.php";
  require_once "models/User.php";
  session_start();
  
  // var_dump($_GET);
  $id = $_GET["id"];
  
  //対象のユーザーをDBから引き出す
  $profiles = Profile::find($id);
  // var_dump($profiles);

 include_once "views/profile_edit_view.php";
  
  