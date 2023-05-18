<?php
// $yname = null;
if (isset($_POST["sub123"])) {
    $yname = $_POST["yname"];
    $ymail = $_POST["ymail"];

    if (empty($yname)) {
        $errName = "<span style='color: red'>Please write your name</span>";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $yname)) {
        $errName = "<span style='color: red'>Invaild name format</span>";
    } else {
        $crrName = $yname;
    }

    if (empty($ymail)) {
        $errEmail = "<span style='color: red'>Please write your email</span>";
    } elseif (!filter_var($ymail, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "<span style='color: red'>Invalid email address</span>";
    } else {
        $crrEmail = $ymail;
    }

    if (isset($crrName) && isset($crrEmail)) {
        $crrMsg = "
        <div style='color: green'>
            Your Name : $crrName
            <br>
            Your Email: $crrEmail
        </div>
        ";
        $yname = $ymail = null;
    }
}

?>

<form action="" method="post">
    <input type="text" placeholder="Your name" name="yname" value="<?= $yname ?? null ?>">
    <?= $errName ?? null ?>
    <br><br>
    <input type="text" placeholder="Your email" name="ymail" value="<?= $ymail ?? null ?>">
    <?= $errEmail ?? null ?>
    <br><br>
    <input type="submit" name="sub123">
</form>

<?= $crrMsg ?? null ?>