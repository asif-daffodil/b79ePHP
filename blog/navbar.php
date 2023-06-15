<header class="text-gray-600 body-font bg-slate-100 shadow">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img class="w-12" src="./images/logo.jpg" alt="">
            <span class="ml-3 text-xl">Healthy Life</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <?php if (!isset($_SESSION['user'])) { ?>
                <a class="mr-5 hover:text-gray-900" href="signin">Sign In</a>
                <a class="mr-5 hover:text-gray-900" href="signup">Sign Up</a>
            <?php } else { ?>
                <a class="mr-5 hover:text-gray-900" href="./">Home</a>
                <a class="mr-5 hover:text-gray-900" href="./about">About</a>
                <a class="mr-5 hover:text-gray-900" href="./contact">Contact</a>
                <a class="mr-5 hover:text-gray-900" href="blog">Blog</a>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="mr-5 cursor-pointer">
                        <img class="w-6 inline-block" src="./images/users/<?= !empty($_SESSION['user']['img']) ? $_SESSION['user']['img'] : 'default.jpg' ?>" alt="">
                        <?= $_SESSION['user']['name'] ?>
                        <i class="fa-solid fa-caret-down"></i>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="./updateprofile">Update Profile</a></li>
                        <li><a href="./changepass">Change Pasword</a></li>
                        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') { ?>
                            <li><a href="./admin/dashboard">Admin Pannel</a></li>
                        <?php } ?>
                        <li><a class="hover:text-gray-900" href="signout">Sign Out</a></li>
                    </ul>
                </div>
            <?php } ?>

        </nav>
        <a class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" href="#">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" href="#">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
</header>