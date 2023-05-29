<?php
include_once("./header.php");
if (!isset($_SESSION['user'])) {
    header("location: ./signin");
}

include_once("./components/Home/hero.php");
include_once("./components/Home/blog.php")
?>

<?php
include_once("./footer.php");
?>