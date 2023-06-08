<?php
include_once("./header.php");

if (isset($_POST['upPro'])) {
    $name = safuda($_POST['name']);
    $email = safuda($_POST['email']);
    $city = safuda($_POST['city']);
    $country = safuda($_POST['country']);
    $phone = safuda($_POST['phone']);
    $gender = safuda($_POST['gender'] ?? null);

    if (empty($name)) {
        $errName = "Please write your name";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errName = "Invalid name";
    } else {
        $crrName = $conn->real_escape_string($name);
    }

    if (empty($email)) {
        $errEmail = "Please write your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email address";
    } else {
        if ($email != $_SESSION['user']['email']) {
            $checkEmail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
            if ($checkEmail->num_rows > 0) {
                $errEmail = "Email address already exicts";
            } else {
                $crrEmail = $conn->real_escape_string($email);
            }
        } else {
            $crrEmail = $conn->real_escape_string($email);
        }
    }

    if (empty($city)) {
        $errCity = "Please write your city name";
    } else {
        $crrCity = $conn->real_escape_string($city);
    }

    if (empty($country)) {
        $errCountry = "Please write your country name";
    } else {
        $crrCountry = $conn->real_escape_string($country);
    }

    if (empty($phone)) {
        $errPhone = "Please write your phone number";
    } elseif (!is_numeric($phone) || strlen("$phone") < 10) {
        $errPhone = "Invalid phone number";
    } else {
        $crrPhone = $conn->real_escape_string($phone);
        if ($phone != $_SESSION['user']['phone']) {
            $checkPhone = $conn->query("SELECT * FROM `users` WHERE `phone` = '$phone'");
            if ($checkPhone->num_rows > 0) {
                $errPhone = "Phone number already exicts";
            } else {
                $crrPhone = $conn->real_escape_string($phone);
            }
        } else {
            $crrPhone = $conn->real_escape_string($phone);
        }
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } elseif (!in_array($gender, ["Male", "Female"])) {
        $errGender = "Invalid gender";
    } else {
        $crrGender = $conn->real_escape_string($gender);
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrGender) && isset($crrCity) && isset($crrCountry) && isset($crrPhone)) {
        $_SESSION['user']['name'] = $crrName;
        $_SESSION['user']['email'] = $crrEmail;
        $_SESSION['user']['gender'] = $crrGender;
        $_SESSION['user']['city'] = $crrCity;
        $_SESSION['user']['country'] = $crrCountry;
        $_SESSION['user']['phone'] = $crrPhone;
        $id = $_SESSION['user']['id'];
        $update = $conn->query("UPDATE `users` SET `name` = '$crrName', `email` = '$crrEmail', `gender` = '$crrGender', `city` = '$crrCity', `country` = '$crrCountry', `phone` = '$crrPhone' WHERE `id` = $id");
        if (!$update) {
            echo "<script>toastr.error('Database problem!', 'Something went wrong', {progressBar: true, timeOut: 2000});</script>";
        } else {
            echo "<script>toastr.success('User updated successfully', 'Success!', {progressBar: true, timeOut: 2000}); setTimeout(()=>location.href='./',2000)</script>";
        }
    }
}

?>
<div class="container mx-auto my-5 grid md:grid-cols-2 gap-4">
    <form action="" class="flex flex-col justify-start" method="post">
        <h2 class="text-3xl md:text-6xl mb-9"><?= $_SESSION['user']['name'] ?></h2>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div class="relative">
                <input type="text" placeholder="Your Name" class="input input-bordered w-72" value="<?= $name ?? $_SESSION['user']['name'] ?? null ?>" name="name" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"><?= $errName ?? null ?></div>
            </div>
            <div class="relative">
                <input type="text" placeholder="Your Email" class="input input-bordered w-72" value="<?= $email ?? $_SESSION['user']['email'] ?? null ?>" name="email" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errEmail ?? null ?>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4  mb-6">
            <div class="flex items-center relative">
                <label for="" class="mr-3 ml-4">Gender : </label>
                <label for="" class="flex mr-3">
                    <input type="radio" name="gender" class="radio radio-primary mr-2" value="Male" name="gender" <?= isset($gender) && $gender == "Male" ? "checked" : null ?> <?= !isset($gender) && $_SESSION['user']['gender'] == "Male" ? "checked" : null ?> />Male
                </label>
                <label for="" class="flex">
                    <input type="radio" name="gender" class="radio radio-primary mr-2" value="Female" name="gender" <?= isset($gender) && $gender == "Female" ? "checked" : null ?> <?= !isset($gender) && $_SESSION['user']['gender'] == "Female" ? "checked" : null ?> />Female
                </label>
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs"><?= $errGender ?? null ?></div>
            </div>
            <div class="relative">
                <input type="text" placeholder="City" class="input input-bordered w-72" value="<?= $city ?? $_SESSION['user']['city'] ?? null ?>" name="city" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errCity ?? null ?>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div class="relative">
                <input type="text" placeholder="Your Country" class="input input-bordered w-72" value="<?= $country ?? $_SESSION['user']['country'] ?? null ?>" name="country" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errCountry ?? null ?>
                </div>
            </div>
            <div class="relative">
                <input type="text" placeholder="Phone Number" class="input input-bordered w-72" name="phone" value="<?= $phone ?? $_SESSION['user']['phone'] ?? null ?>" />
                <div class="text-red-600 absolute bottom-[-14px] left-[16px] w-max text-xs">
                    <?= $errPhone ?? null ?>
                </div>
            </div>
        </div>
        <button class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg max-w-[150px]" type="submit" name="upPro">Submit</button>
    </form>
    <div class="flex justify-center items-center flex-col">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="pp">
                <img src="./images/users/<?= !empty($_SESSION['user']['img']) ? $_SESSION['user']['img'] : 'default.jpg' ?>" alt="" class="max-w-lg" id="preview">
            </label>
            <input type="file" class="hidden" name="pp" id="pp" accept="image/*">
        </form>
        <span class="text-sm <?= empty($_SESSION['user']['img']) ? "mt-3" : null ?>"><?= empty($_SESSION['user']['img']) ? "Click to change the image" : null ?></span>
    </div>
</div>

<script>
    const pp = document.getElementById("pp");
    pp.addEventListener("change", (f) => {
        const preview = document.getElementById("preview");
        const file = f.target.files[0];
        const formData = new FormData();
        formData.append('image', file);
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        const reader = new FileReader();
        if (file) {
            reader.readAsDataURL(file);
            if (allowedTypes.includes(file.type)) {
                reader.addEventListener("loadend", (r) => {
                    preview.src = r.target.result;
                })
            }
        }
        fetch('./components/imgupload', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.err) {
                    toastr.error(result.err, {
                        progressBar: true,
                        timeOut: 2000
                    });
                } else {
                    toastr.success(result.success, {
                        progressBar: true,
                        timeOut: 2000
                    });
                }
            })
    })
</script>
<?php
include_once("./footer.php");
?>