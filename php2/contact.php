<link rel="stylesheet" href="./style.css">
<script src="https://cdn.tailwindcss.com"></script>


<?php
include_once("./header.php");

if (!isset($_SESSION['user'])) {
 header("location: ./Sign-in");
}

if (isset($_POST['button'])) {
          
       $name = $_SESSION ['user']['name'] ;
       $email = safuda($_POST['email']);
       $message = safuda($_POST['message']);

if (empty($name)) {
  $errName ="<div class='text-red-500 ml-52 md:ml-80 '>Please write Your Name </div>";
}elseif(! preg_match('/^[a-zA-Z\s]+$/', $name)){
 $errName ="<div class='text-red-500 ml-52 md:ml-80   text-right '>Invalid Name</div>";
}else{
  $crrName =$conn->real_escape_string($name);
}

if (empty($email)) {
  $errEmail ="<div class='text-red-500 ml-52 md:ml-80    '>Please write Your email </div>";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 $errEmail ="<div class='text-red-500 ml-52 md:ml-80 '>Invalid email</div>";
}else{
  $crrEmail =$conn->real_escape_string($email);
  }
  if (empty($message)) {
  $errmessage ="<div class='text-red-500 ml-60 md:ml-80 '>Please write Your message </div>";
}else{
  $crrmessage =$conn->real_escape_string($message);
}



if (isset($crrName) && isset($crrEmail) && isset($crrmessage)) {
  $insertQuery ="INSERT INTO `contact` (`name` , `email` , `message`) VALUES('$crrName' ,'$crrEmail ', '$crrmessage')";
     $insert = $conn-> query($insertQuery);
     if (! $insert) {
      $isInsert = "<div style='color:red;font-size:30px;'>Your Data isnot Submitted</div>";
     }else{
    $isInsert ="<div class='text-green-500 ml-24 text-3xl text-bold md:ml-96'>Thanks For Your Feedback</div>";
    
      echo"
          <script>
          setTimeout(()=>{
            location.href='./contact'
          },1000);
          </script>
          ";
     }
}



}








?>



<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
    </div>
     <?=$isInsert ?? null  ?>
    <form action="" method="post">
    <div class="md:w-[600px]  mx-auto w-full ">
      <div class="flex flex-wrap -m-2">

        <div class="p-2 w-[500px] px-10">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" require value="<?= $_SESSION ['user']['name']    ?>">
         
          </div>
        </div>
         <?=$errName ?? null  ?>
        <div class="p-2 w-[500px] px-10">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="text" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" require >
          </div>
        </div>
        <?=$errEmail ?? null  ?>
        <div class="p-2 w-[500px] px-10">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
          <?= $errmessage ?? null ?>
        </div>
        
        
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="button">Button</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>






<?php
include_once("./footer.php");
?>