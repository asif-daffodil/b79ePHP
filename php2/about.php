
<link rel="stylesheet" href="./style.css">
<script src="https://cdn.tailwindcss.com"></script>

<?php
include_once("./header.php");
if (!isset($_SESSION['user'])) {
 header("location: ./Sign-in");
}
?>


<?php
include_once("./footer.php");
?>