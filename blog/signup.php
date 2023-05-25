<?php
include_once("./header.php");
?>
<div class="flex justify-center">
    <div class="h-[90%] w-full md:w-3/4 m-4">
        <div class="text-xl cursor-pointer flex flex-col justify-center items-center mt-5 md:mt-0">
            <h1 class="font-semibold text-3xl text-gray-700 m-2">Sign Up</h1>
        </div>
        <div class="flex flex-col justify-center items-center mt-10 md:mt-4 space-y-6 md:space-y-8">
            <div class="">
                <input type="text" placeholder="Name" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]">
            </div>
            <div class="">
                <input type="text" placeholder="Email" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]">
            </div>
            <div class="">
                <input type="password" placeholder="Password" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-violet-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px]">
            </div>
        </div>
        <div class="text-center mt-7">
            <button class="uppercase px-24 md:px-[118px] lg:px-[140px] py-2 rounded-md text-white bg-violet-500 hover:bg-violet-600  font-medium ">Sign Up</button>
        </div>
        <div class="text-center my-6 flex flex-col">
            <a href="./signin" class="text-sm font-bold text-gray-400 hover:text-violet-500 m-1">
                Already have account? Sign In Here</a>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>