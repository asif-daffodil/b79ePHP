<?php
include_once("./header.php");

if (isset($_POST['upPro'])) {
    $name = safuda($_POST['name']);
    $email = safuda($_POST['email']);
    $city = safuda($_POST['city']);
    $country = safuda($_POST['country']);
    $phone = safuda($_POST['phone']);

    if (empty($name)) {
        $errName = "Please write your name";
    }
}

?>
<div class="container mx-auto my-5">
    <form action="" class="flex flex-col w-max mx-auto" method="post">
        <h2 class="text-3xl md:text-6xl mb-9"><?= $_SESSION['user']['name'] ?></h2>
        <div class="mx-auto grid md:grid-cols-2 gap-4 mb-6">
            <div class="relative">
                <input type="text" placeholder="Your Name" class="input input-bordered w-72" value="<?= $name ?? $_SESSION['user']['name'] ?? null ?>" name="name" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"><?= $errName ?? null ?></div>
            </div>
            <div>
                <input type="text" placeholder="Your Email" class="input input-bordered w-72" value="<?= $email ?? $_SESSION['user']['email'] ?? null ?>" name="email" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"></div>
            </div>
        </div>
        <div class="mx-auto grid md:grid-cols-2 gap-4  mb-6">
            <div class="flex items-center">
                <label for="" class="mr-3 ml-4">Gender : </label>
                <label for="" class="flex mr-3">
                    <input type="radio" name="gender" class="radio radio-primary mr-2" value="Male" name="gender" />Male
                </label>
                <label for="" class="flex">
                    <input type="radio" name="gender" class="radio radio-primary mr-2" value="Female" name="gender" />Female
                </label>
            </div>
            <div class="relative">
                <input type="text" placeholder="City" class="input input-bordered w-72" value="<?= $city ?? $_SESSION['user']['city'] ?? null ?>" name="city" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"></div>
            </div>
        </div>
        <div class="mx-auto grid md:grid-cols-2 gap-4 mb-6">
            <div class="relative">
                <input type="text" placeholder="Your Country" class="input input-bordered w-72" value="<?= $country ?? $_SESSION['user']['country'] ?? null ?>" name="country" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"></div>
            </div>
            <div class="relative">
                <input type="number" placeholder="Phone Number" class="input input-bordered w-72" name="phone" value="<?= $phone ?? $_SESSION['user']['phone'] ?? null ?>" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"></div>
            </div>
        </div>
        <button class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg max-w-[150px]" type="submit" name="upPro">Submit</button>
    </form>
</div>
<?php
include_once("./footer.php");
?>