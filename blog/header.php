<?php
$conn = mysqli_connect("localhost", "root", "", "blog79");

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./node_modules/daisyui/dist/full.css">
    <link rel="stylesheet" href="./dist/output.css">

</head>

<body>
    <?php include_once("./navbar.php") ?>