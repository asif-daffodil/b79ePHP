<?php
include_once("../db.php");
session_start();
$id = $_SESSION['user']['id'];
$msg = [];
$alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcsefghijklmnopqrstuvwxyz";
if (isset($_FILES['image'])) {
    $tmpName = $_FILES['image']['tmp_name'];
    $realName = $_FILES['image']['name'];
    $targetDir = '../images/users/';
    $uniqueName = substr(str_shuffle($alpha), 0, 6) . uniqid() . rand(100000, 999999) . date("HisFdYla") . "." . pathinfo($realName, PATHINFO_EXTENSION);
    $dir_with_fileName = $targetDir . $uniqueName;

    if (!getimagesize($_FILES['image']['tmp_name'])) {
        $msg["err"] = "Invalid image file";
    } else {
        $move = move_uploaded_file($tmpName, $dir_with_fileName);
        if (!$move) {
            $msg["err"] = "Image uploaded failed";
        } else {
            if (isset($_SESSION['user']['img'])) {
                $preImg = "../images/users/" . $_SESSION['user']['img'];
            }
            unlink($preImg);
            $update = $conn->query("UPDATE `users` SET `img` = '$uniqueName' WHERE `id` = $id");
            if (!$update) {
                $msg["err"] = "Database problem";
            } else {
                $_SESSION['user']['img'] = $uniqueName;
                $msg["success"] = "Image uploaded successfully";
            }
        }
    }
}

echo json_encode($msg);
