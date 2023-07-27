<link rel="stylesheet" href="./style.css">
<script src="https://cdn.tailwindcss.com"></script>
<?php
include_once("./header.php");
session_start();
session_unset();
header("location: ./Sign-in")
?>


<?php
include_once("./footer.php");
?>