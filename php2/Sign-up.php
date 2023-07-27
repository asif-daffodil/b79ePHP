<link rel="stylesheet" href="./style.css">

<script src="https://cdn.tailwindcss.com"></script>
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
  $errName ="<div class='text-red-500 mt-[-18px]  text-right '>Please write Your Name </div>";
}elseif(! preg_match('/^[a-zA-Z\s]+$/', $name)){
 $errName ="<div class='text-red-500 mt-[-18px]  text-right '>Invalid Name</div>";
}else{
  $crrName =$conn->real_escape_string($name);
}

if (empty($email)) {
  $errEmail ="<div class='text-red-500 mt-[-18px]  text-right '>Please write Your email </div>";
}elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
 $errEmail ="<div class='text-red-500 mt-[-18px]  text-right '>Invalid email</div>";
}else{
  $chkemail = $conn->query("SELECT * FROM `user` WHERE `email`='$email'");
  if ($chkemail->num_rows > 0 ) {
    $errEmail ="<div class='text-green-500 mt-[-18px]  text-right '>Already have an account?Go to sign in</div>";
  }else{

    $crrEmail =$conn->real_escape_string($email);
  }
}

if (empty($pass)) {
  $errPass ="<div class='text-red-500 mt-[-18px]  text-right '>Please write Your pass </div>";
}elseif(strlen($pass) < 6){
 $errPass ="<div class='text-red-500 mt-[-18px]  text-right '>Please write a strong pass</div>";
}else{
  $crrPass =$conn->real_escape_string($pass);
}


if (isset($crrName) && isset($crrEmail) && isset($crrPass)) {
  $crrPass = md5($crrPass);
  $insertQuery ="INSERT INTO `user` (`name` , `email` , `pass`) VALUES('$crrName' ,'$crrEmail ', '$crrPass')";
     $insert = $conn-> query($insertQuery);
     if (! $insert) {
      $isInsert = "<div style='color:red;font-size:30px;'>Your Data isnot Submitted</div>";
     }else{
      $isInsert ="<div style='width:600px;color:green;font-size:25px;'> Registration Complited successfully.<BR><p style='color:green;font-size:25px;margin-left:120px;'>Login now</p></div>";

      echo"
          <script>
          setTimeout(()=>{
            location.href='./Sign-in'
          },1500);
          </script>
          ";
     }
}



}

?>


 <div class=" md:w-96 bg-white flex flex-col md:mx-auto w-96 md:py-8 mt-8 md:mt-0 mx-auto">
      <p class="text-black text-4xl text-center title-font mb-1 font-bold">Sign-up</p>

      <?= $isInsert ?? null ?>
      <form action="" method="post">

   <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <?=$errName ?? null  ?>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="text" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
       <?=$errEmail ?? null  ?>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Password</label>
        <input type="password" id="password" name="pass" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
       <?=$errPass ?? null  ?>
      <button class="text-white mx-auto bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="sp123">SIGN-UP</button>
      </form>
   
      <p class="text-xs text-gray-500 mt-3">already have a account?<a class="text-xs text-gray-900 font-bold" href="./Sign-in">Signin Here</a></p> 
    </div>
  </div>

<?php
include_once("./footer.php");
?>