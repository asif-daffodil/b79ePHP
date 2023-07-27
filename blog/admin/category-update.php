<?php
$conn = mysqli_connect("localhost", "root", "", "blog79");
$dataArr = [];
if (isset($_POST['catName']) && isset($_POST['catId'])) {
    $dataArr["catName"] =  $_POST['catName'];
    $dataArr["catId"] =  $_POST['catId'];
    $query = "UPDATE `categories` SET `name` = '" . $dataArr["catName"] . "' WHERE `id` = '" . $dataArr["catId"] . "'";
    $update = $conn->query($query);
    if ($update) {
        echo json_encode($dataArr);
    }
}
