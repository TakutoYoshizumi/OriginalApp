<?php
 //(C)
 require_once "filters/LoginFilter.php";
 require_once "models/Profile.php";
 require_once "models/User.php";
 
 session_start();
 
 // var_dump($_POST);
 $id=$_POST["id"];
 $introduction=$_POST["introduction"];
 $country=$_POST["country"];
 $age=$_POST["age"];
 $job=$_POST["job"];
 $gender=$_POST["gender"];
 $image = $_FILES["image"]["name"];
 
  
 //idから対象のプロフィール情報を取得
 $profiles = Profile::find($id);
 var_dump($profiles);
 
 //情報を更新する
 $profiles->introduction=$introduction;
 $profiles->country=$country;
 $profiles->age=$age;
 $profiles->job=$job;
 $profiles->gender=$gender;
 $profiles->image=$image;
 
 
 $flash_message = $profiles->save();
 $_SESSION["flash_message"]=$flash_message;
 
 header("Location:profile_show.php?id=".$id);
 exit;