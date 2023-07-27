<?php
include_once("./header.php");
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?= pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); ?>
        </h1>
    </div>

</div>

<?php
include_once("./footer.php")
?>