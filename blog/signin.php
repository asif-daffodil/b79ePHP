<?php
include_once("./header.php");
if (isset($_SESSION['user'])) {
    header("location: ./");
}

if (isset($_POST['sp123'])) {
    $email = safuda($_POST['email']);
    $pass = safuda($_POST['pass']);

    if (empty($email)) {
        $errEmail = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write your email.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Invalid email</div>";
    } else {
        $crrEmail = $conn->real_escape_string($email);
    }

    if (empty($pass)) {
        $errPass = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write your password.</div>";
    } elseif (strlen($pass) < 6) {
        $errPass = "<div class='text-red-600 text-sm  mx-auto  md:w-72 lg:w-[340px] text-right mb-[-20px]'>Please write an strong password</div>";
    } else {
        $crrPass = md5($pass);
        $crrPass = $conn->real_escape_string($crrPass);
    }

    if (isset($crrEmail) && isset($crrPass)) {
        $checkQuery = "SELECT * FROM `users` WHERE `email` = '$crrEmail' AND `pass` = '$crrPass'";
        $check = $conn->query($checkQuery);
        if ($check->num_rows == 0) {
            $loginMsg = "<div class='alert alert-error md:w-72 lg:w-[340px] mx-auto'>Username and password problem</div>";
        } elseif ($check->num_rows == 1) {
            $loginMsg = "<div class='alert alert-success md:w-72 lg:w-[340px] mx-auto mb-3'>login successfull!</div>";
            $email = $pass = $crrEmail = $crrPass = null;
            $userData = $check->fetch_object();
            $_SESSION['user'] = ['name' => $userData->name, 'email' => $userData->email, 'img' => $userData->img, 'gender' => $userData->gender, 'city' => $userData->city, 'country' => $userData->country, 'phone' => $userData->phone, 'role' => $userData->role];
            echo "
            <script>
                setTimeout(()=>{
                    location.href = './';
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
            <h1 class="font-semibold text-3xl text-gray-700 m-2">Sign In</h1>
        </div>
        <?= $loginMsg ?? null ?>
        <form action="" method="post">
            <div class="flex flex-col justify-center items-center mt-10 md:mt-4 space-y-6 md:space-y-8">
                <div class="">
                    <input type="text" placeholder="Email" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]" name="email" value="<?= $email ?? null ?>">
                    <?= $errEmail ?? null ?>
                </div>
                <div class="">
                    <input type="password" placeholder="Password" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]" name="pass" value="<?= $pass ?? null ?>">
                    <?= $errPass ?? null ?>
                </div>
                <div class=" text-center mt-7">
                    <button class="uppercase px-24 md:px-[118px] lg:px-[140px] py-2 rounded-md text-white bg-violet-500 hover:bg-violet-600  font-medium " name="sp123">Sign In</button>
                </div>
            </div>
        </form>
        <div class="text-center my-6 flex flex-col">
            <a href="./forgetPass" class="text-sm font-medium text-gray-400 hover:text-violet-500 m-1">Forgot
                Password ?</a>
            <a href="./signup" class="text-sm font-bold text-gray-400 hover:text-violet-500 m-1">
                Not a User? Create New Account</a>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>