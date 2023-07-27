<?php
include_once("./db.php");
session_start();
$id = $_SESSION['user']['id'];
$msg =[];
$alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
if (isset($_FILES['image'])) {
    $tmpName = $_FILES['image']['tmp_name'];
    $realName = $_FILES['image']['name'];
    $targetDir = './img/';
    $uniqueName =substr(str_shuffle($alpha),0,6).uniqid().rand(100000,999999).date("HisFdyla"). "." . pathinfo($realName, PATHINFO_EXTENSION);
     $dir_with_fileName = $targetDir . $uniqueName;
    if (!getimagesize($_FILES['image']['tmp_name'])) {
       $msg["err"] = "Invalid image file";
    }else{
      $move =  move_uploaded_file($tmpName ,$dir_with_fileName);
      if(!$move){
        $msg["err"] = "Image Upload failed";
      }else{
        $preimg ="./img/" . $_SESSION['user']['img'];
        unlink($preimg);
   $update = $conn->query("UPDATE `user` SET `img` = '$uniqueName' WHERE `id` = $id");
   if (!$update) {
    $msg["err"] = "data base problem";
   }else{
    $_SESSION['user']['img'] = $uniqueName;
    $msg["success"] = "img upload successfull";
    
   }
      }
    }
  }
  echo json_encode($msg);

?>