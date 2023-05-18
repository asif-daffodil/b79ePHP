<?php
session_start();

if (isset($_GET["a"]) && $_GET["a"] == "logout") {
    session_unset();
    header("location: ./l17-session.php");
}

$user = ["abul" => "123456", "babul" => "123456", "kabul" => "123456", "bulbul" => "123456"];

if (isset($_POST['log123'])) {
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    if (isset($user[$uname]) && $user[$uname] == $upass) {
        $_SESSION['user'] = $uname;
    } else {
        echo "login failed";
    }
}

?>

<?php if (!isset($_SESSION['user'])) { ?>
    <h2>Login Form</h2>
    <form action="" method="post">
        <input type="text" placeholder="username" name="uname" required>
        <input type="password" placeholder="Your Password" name="upass" required minlength="6">
        <input type="submit" value="Login" name="log123">
    </form>
<?php } else { ?>
    <div style="text-align: center; font-size: 24px;">
        Welcome
        <br>
        <?= ucfirst($_SESSION['user']) ?>
        <br>
        <a href="./l17-session.php?a=logout">
            <button>Logout</button>
        </a>
    </div>
<?php } ?>