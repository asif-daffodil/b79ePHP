<?php
include_once("./db.php");

session_start();


function safuda($data){

  $data=  htmlspecialchars($data);
   $data= trim($data);
   $data= stripcslashes($data);
   return $data ;
}
?>


<html data-theme="light"></html>
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.1.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
     <img class='w-16
     '  src="<?= !empty($_SESSION['user']['img']) ? "./img/".$_SESSION['user']['img'] : './images.png' ?>" alt="">
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      
      <?php if (!isset ($_SESSION['user'])) { ?>
     
      <a class="mr-5 hover:text-gray-900" href="./Sign-in">Sign-in
      </a>
      <a class="mr-5 hover:text-gray-900" href="./Sign-up">Sign-up
      </a>
      <?php } else { ?>
        <a class="mr-5 hover:text-gray-900" href="https://localhost/php2/index">Home</a>
      <a class="mr-5 hover:text-gray-900" href="./about">About</a>
      <a class="mr-5 hover:text-gray-900" href="./contact">Contact</a>
      <a class="mr-5 hover:text-gray-900" href="./Blog">Blog
      </a>
       <a class="mr-5 hover:text-blue-400 " href="https://facebook.com">Facebook
      </a>
      <a class="mr-5 hover:text-green-400 " href="https://whatsapp.com">whatsapp
      </a>
      <details class="dropdown mr-5 cursor-pointer">
       <summary class="border-2 bg-gray px-2 mr-24">
    <?= $_SESSION['user']['name'] ?>
  </summary>
  <ul class="p-2 border-b-2 shadow menu dropdown-content  rounded-box w-52 bg-gray-400" style='z-index:100;'>
    <li>
      <a class=" text-white mx-auto hover:text-gray-900"  href="./updateprofile">Update Profile</a>
    </li>
    <li>
      <a class="text-white mx-auto hover:text-gray-900" href="./changpass">Change Password</a>
    </li>
    <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "admin")  { ?> 
    <li><a class="text-white mx-auto hover:text-gray-900" href="./admin/dashboard">Admin</a>
    </li>
 <?php } ?> 
     <li> <a class="text-black mx-auto hover:text-gray-900 cursor-pointer" href="./Log-out">Log-out
      </a></li>
    
  </ul>
</details>
      
      <?php } ?>
    </nav>
    
  </div>
</header>


