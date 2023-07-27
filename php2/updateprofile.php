<?php

include_once("./header.php");

if (isset($_POST['btn'])) {
   $name   = safuda  ($_POST['name']);
   $email  = safuda  ($_POST['email']);
   $gender = safuda  ($_POST['gender'] ?? null);
   $city   =  safuda ($_POST['city']);
   $country=  safuda ($_POST['country']);
   $phone  =  safuda ($_POST['phone']);



if (empty($name)) {
 $errname ="please write your name";
}elseif(!preg_match('/^[a-zA-Z\s]+$/', $name)){
$errname ="invalid name";
}else{
  $crrname=$conn->real_escape_string($name);
}



if (empty($email)) {
 $erremail ="please write your email";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$erremail ="invalid email";
}else{
  if ($email != $_SESSION['user']['email']) {
   $checkemail = $conn->query("SELECT * FROM `user` WHERE `email` ='$email'");
   if ($checkemail->num_rows > 0) {
   $erremail ="email exicts";
   }else{
    $crremail=$conn->real_escape_string($email);
   }
  }else{
    $crremail=$conn->real_escape_string($email);
  }
}


if (empty($city)) {
 $errcity ="please write yourcity";
}else{
  $crrcity=$conn->real_escape_string($city);
}

if (empty($country)) {
 $errcountry ="please write your country";
}else{
  $crrcountry=$conn->real_escape_string($country);
}




  if (empty($phone)) {
    $errphone = "please write your phone";
  } elseif (!preg_match('/^\+?\d{7,15}$/', $phone)) {
    $errphone = "invalid phone number";
  } else {
    $crrphone = $conn->real_escape_string($phone);
    if (isset($_SESSION['user']['phone']) && $phone != $_SESSION['user']['phone']) {
      $checkphone = $conn->query("SELECT * FROM `user` WHERE `phone` = '$crrphone'");
      if ($checkphone->num_rows > 0) {
        $errphone = "phone umber already exict";
      } else {
        $crrphone = $conn->real_escape_string($phone);
      }
    } else {
      $crrphone = $conn->real_escape_string($phone);
    }
  }


if (empty($gender)) {
 $errgender ="please select your gender";
}elseif(! in_array($gender,["Male","Female"])){
 $errgender ="invalid gender";
}else{
  $crrgender=$conn->real_escape_string($gender);
}


if (isset($crrname) && isset($crremail) && isset($crrgender) && isset($crrcity) && isset($crrcountry) && isset($crrphone))  {
  $_SESSION['user']['name']=$crrname;
  $_SESSION['user']['email']=$crremail;
  $_SESSION['user']['gender']=$crrgender;
  $_SESSION['user']['city']=$crrcity;
  $_SESSION['user']['country']=$crrcountry;
  $_SESSION['user']['phone']=$crrphone;
  $id =  $_SESSION['user']['id'];
  $update = $conn->query("UPDATE `user` SET `name`='$crrname',`email`='$crremail',`gender`='$crrgender',`city`='$crrcity',`country`='$crrcountry',`phone`='$crrphone' WHERE `id` = '$id'");
  if (!$update) {
   $errupdate ="Dtabase problem";
}else{
   $errupdate = "user data update successfull";
   echo "
         <script>
          setTimeout(()=>{
            location.href='./updateprofile';
          },1000);
          </script>
        ";
}


}

}

?>

<section class="flex text-gray-600 body-font relative">
     
    <form action="" method="post" enctype="multipart/form-data">

      <p class="flex text-5xl text-green-400 font-bold text-center"><?= $err ?? null ?></p>
      <label for='pp'>
        <img id='preview' class='w-40 mx-auto cursor-pointer  rounded-[50%]'  src="<?=!empty($_SESSION['user']['img']) ? "./img/" . $_SESSION['user']['img'] : './images.png' ?>" alt="" />

      <!--  <div class='mt-16 text-center text-black cursor-pointer w-48 mx-auto' style='border-bottom:2px solid black;'><?= empty($_SESSION['user']['img'] ) ? 'Click to change the image' : null ?></div> -->
      
        <div class='mt-1 text-center text-black cursor-pointer w-48 mx-auto' style='border-bottom:2px solid black;'><?= 'Click to change the image' ?? null ?></div>
       
       <div class='mx-auto text-center w-40'><input type='file' class='hidden'  name='pp' id='pp' accept='image/*'/></div>
       
      </label>
       

   <h1 class="text-center text-4xl pt-[60px]"> <?= $_SESSION['user'] ['name']  ?></h1>
   <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <p class="text-green-500 text-center text-5xl w-full font-bold"><?=$errupdate ?? null ?></p>
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="<?= $name ?? $_SESSION['user'] ['name'] ?? null ?>">
          </div>
           <p class="text-red-500"><?= $errname ?? null  ?></p>
        </div>
       
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="<?= $email ?? $_SESSION['user'] ['email'] ?? null ?>">
          </div>
           <p class="text-red-500"><?= $erremail ?? null  ?></p>
        </div>
     
        <div class="p-2 w-1/2">
          <div class="relative flex mt-7 gap-3 justify-center">
            <label for="gender" class="leading-7 text-sm text-gray-600  ">Gender:</label>
            <input type="radio" id="gender" name="gender" value="Male" <?=isset($gender) && $gender == "Male" ? "checked" : null ?><?=!isset ($gender) && $_SESSION['user']['gender'] =="Male" ? "checked" : null ?>>Male

            <input type="radio" id="gender" name="gender" value="Female"
            <?=isset($gender) && $gender== "Female" ? "checked" :null ?><?=!isset ($gender) && $_SESSION['user']['gender'] =="Female" ? "checked" : null ?>>Female
          </div>
           <p class="text-red-500"><?= $errgender ?? null  ?></p>
        </div>
      
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="city" class="leading-7 text-sm text-gray-600">City</label>
            <input type="city" id="city" name="city" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="<?= $city ?? $_SESSION['user']['city'] ?? null?>">
          </div>
           <p class="text-red-500"><?= $errcity ?? null  ?></p>
        </div>
   
      <div class="p-2 w-1/2">
          <div class="relative">
            <label for="country" class="leading-7 text-sm text-gray-600">Country:</label>
            <input type="country" id="country" name="country" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="<?= $country ?? $_SESSION['user']['country'] ?? null?>">
          </div>
           <p class="text-red-500"><?= $errcountry?? null  ?></p>
        </div>
      
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="phone" class="leading-7 text-sm text-gray-600">Phone Number:</label>
            <input type="text" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="<?= $phone ?? $_SESSION['user']['phone'] ??null ?>">
          </div>
           <p class="text-red-500"><?= $errphone ?? null  ?></p>
        </div>  
     
        <div class="p-2 w-full">
          <button class="flex mx-auto text-black  bg-gray-400 border-0 py-2 px-8  rounded text-lg" name="btn">Submit</button>
        </div>
        
      </div>
    </div>
  </div>
</form>



 
</section>

<script>
const pp = document.getElementById("pp");
pp.addEventListener("change" , (f) => {
const preview = document.getElementById("preview");
const file=f.target.files[0];
const formData = new FormData();
formData.append('image', file);
const allowedTypes =['image/jpeg','image/png','image/gif','image/jpg'];
const reader = new FileReader();
if (file) {
  reader.readAsDataURL(file);
  if(allowedTypes.includes(file.type)){
 reader.addEventListener("loadend", (r)=>{
  preview.src = r.target.result;
 })}}
fetch('./imgupld' ,{
  method: 'POST',
   body: formData
})
  .then(response => response.json())
  .then(result =>{
    if (result.err) {
      $err ="<div style='color:red;'>database problem</div>"
    }else{
       $err ="<div style='color:green;'>Image Upload successfull</div>"
         setTimeout(()=>{
            location.href='./updateprofile'
          },400);  
    }
  })

 })


</script>
<?php
include_once("./footer.php");
?>