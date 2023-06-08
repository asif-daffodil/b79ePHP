<?php
include_once("./header.php");
if (isset($_POST['changePass'])) {
    $opass = safuda($_POST['opass']);
    $npass = safuda($_POST['npass']);
    $cnpass = safuda($_POST['cnpass']);
    $id = $_SESSION['user']['id'];

    if (empty($opass)) {
        $errOpass = "Please provide the old password";
    } else {
        $copass = md5($opass);
        $opasQuery = $conn->query("SELECT `pass` FROM `users` WHERE `id` = $id");
        $realOpass = $opasQuery->fetch_object();
        if ($realOpass->pass != $copass) {
            $errOpass = "Invalid old password";
        } else {
            $crrOpass = $copass;
        }
    }

    if (empty($npass)) {
        $errNpass = "Please provide the new password";
    } elseif (strlen($npass) < 6) {
        $errNpass = "Please provide an strong password";
    } else {
        $crrNpass = $npass;
    }

    if (empty($cnpass)) {
        $errCnpass = "Please provide the confirm password";
    } elseif ($npass != $cnpass) {
        $errCnpass = "Confirm password did not matched";
    } else {
        $crrCnpass = $cnpass;
    }

    if (isset($crrOpass) && isset($crrNpass) && isset($crrCnpass)) {
        $newPass = $conn->real_escape_string(md5($crrCnpass));
        $uppas = $conn->query("UPDATE `users` SET `pass` = '$newPass' WHERE `id` = $id");
        if (!$uppas) {
            echo "<script>toastr.error('Database problem!', 'Something went wrong', {progressBar: true, timeOut: 2000});</script>";
        } else {
            echo "<script>toastr.success('Password updated successfully', 'Success!', {progressBar: true, timeOut: 2000}); setTimeout(()=>location.href='./',2000)</script>";
        }
    }
}
?>
<div class="container mx-auto my-5">
    <form action="" class="flex flex-col w-max mx-auto" method="post">
        <h2 class="text-3xl md:text-6xl mb-9"><?= $_SESSION['user']['name'] ?></h2>
        <div class="mx-auto grid gap-4 mb-6">
            <div class="relative">
                <input type="password" placeholder="Old password" class="input input-bordered w-72" name="opass" value="<?= $opass ?? null ?>" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"><?= $errOpass ?? null ?></div>
            </div>
            <div class="relative">
                <input type="password" placeholder="New password" class="input input-bordered w-72" name="npass" value="<?= $npass ?? null ?>" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errNpass ?? null ?>
                </div>
            </div>
            <div class="relative">
                <input type="password" placeholder="Confirm new password" class="input input-bordered w-72" name="cnpass" value="<?= $cnpass ?? null ?>" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errCnpass ?? null ?>
                </div>
            </div>
            <label class="cursor-pointer flex items-center">
                <input type="checkbox" class="checkbox checkbox-xs mr-3" id="spbtn" />
                <span class="label-text">Show Password</span>
            </label>
        </div>
        <button class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg max-w-[150px]" type="submit" name="changePass">Submit</button>
    </form>
</div>
<script>
    document.querySelector("#spbtn").addEventListener("click", (e) => {
        if (e.target.checked) {
            Array.from(document.querySelectorAll("input[type='password']")).map(i => {
                i.setAttribute("type", "text");
            })
        } else {
            Array.from(document.querySelectorAll("input[type='text']")).map(i => {
                i.setAttribute("type", "password");
            })
        }

    })
</script>
<?php
include_once("./footer.php");
?>