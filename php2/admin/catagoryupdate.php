<?php
$conn = mysqli_connect("localhost", "root", "", "b29e");
$dataarr = [];

if (isset($_POST['catname']) && isset($_POST['catid'])) {
   $dataarr['catname'] = $_POST['catname'];
   $dataarr['catid'] = $_POST['catid'];
   $query = "UPDATE `catagories` SET `name` = '" . $dataarr["catname"] . "'  WHERE  `id` = " . $dataarr["catid"];

   $update = $conn->query($query);
   if ($update) {
      echo json_encode($dataarr);
   } else {
      echo "ho jhoh";
   }
}
