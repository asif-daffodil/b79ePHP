<?php
include_once("./header.php");
if (isset($_SESSION['user'])) {
    header("location: ./");
}


if (isset($_POST['sp123'])) {
    $name = safuda($_POST['name']);
    $email = safuda($_POST['email']);
    $pass = safuda($_POST['pass']);

    if (empty($name)) {
        $errName = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write your name.</div>";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Invalid name</div>";
    } else {
        $crrName = $conn->real_escape_string($name);
    }

    if (empty($email)) {
        $errEmail = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write your email.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Invalid email</div>";
    } else {
        $checkEmail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($checkEmail->num_rows > 0) {
            $errEmail = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Email already exicts</div>";
        } else {
            $crrEmail = $conn->real_escape_string($email);
        }
    }

    if (empty($pass)) {
        $errPass = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write your password.</div>";
    } elseif (strlen($pass) < 6) {
        $errPass = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write an strong password</div>";
    } else {
        $crrPass = md5($pass);
        $crrPass = $conn->real_escape_string($crrPass);
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrPass)) {
        $insertQuery = "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$crrName', '$crrEmail', '$crrPass')";
        $insert = $conn->query($insertQuery);
        if (!$insert) {
            $isInsert = "<div class='alert alert-error md:w-72 lg:w-[340px] mx-auto'>Database problem</div>";
        } else {
            $isInsert = "<div class='alert alert-success md:w-72 lg:w-[340px] mx-auto mb-3'>Registration completed! Please login Now!</div>";
            $name = $email = $pass = $crrName = $crrEmail = $crrPass = null;
            echo "
            <script>
                setTimeout(()=>{
                    location.href = './signin';
                }, 2000)
            </script>
            ";
        }
    }
}
?>
<div class="flex justify-center">
    <div class="h-[90%] w-full md:w-3/4 m-4">
        <div class="text-xl cursor-pointer flex flex-col justify-center items-center mt-5 md:mt-0">
            <h1 class="font-semibold text-3xl text-gray-700 m-2">Sign Up</h1>
        </div>
        <?= $isInsert ?? null ?>
        <form action="" method="post">
            <div class="flex flex-col justify-center items-center mt-10 md:mt-4 space-y-6 md:space-y-8">
                <div class="">
                    <input type="text" placeholder="Name" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]" name="name" value="<?= $name ?? null ?>">
                    <?= $errName ?? null ?>
                </div>
                <div class="">
                    <input type="text" placeholder="Email" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]" name="email" value="<?= $email ?? null ?>">
                    <?= $errEmail ?? null ?>
                </div>
                <div class="">
                    <input type="password" placeholder="Password" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]" name="pass" value="<?= $pass ?? null ?>">
                    <?= $errPass ?? null ?>
                </div>
                <div class=" text-center mt-7">
                    <button class="uppercase px-24 md:px-[118px] lg:px-[140px] py-2 rounded-md text-white bg-violet-500 hover:bg-violet-600  font-medium " name="sp123">Sign Up</button>
                </div>
            </div>
        </form>
        <div class="text-center my-6 flex flex-col">
            <a href="./signin" class="text-sm font-bold text-gray-400 hover:text-violet-500 m-1">
                Already have account? Sign In Here</a>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>