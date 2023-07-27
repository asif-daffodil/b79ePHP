<link rel="stylesheet" href="./style.css">
<script src="https://cdn.tailwindcss.com"></script>
<?php
include_once("./header.php");

if (isset($_SESSION['user'])) {
 header("location: ./");
}

if (isset($_POST['sp123'])) {
          
      
       $email = safuda($_POST['email']);
       $pass = safuda($_POST['pass']);


if (empty($email)) {
  $errEmail ="<div class='text-red-500 mt-[-18px]  text-right '>Please write Your email </div>";
}elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
 $errEmail ="<div class='text-red-500 mt-[-18px]  text-right '>Invalid email</div>";
}else{
  $crrEmail =$conn->real_escape_string($email);
  }


if (empty($pass)) {
  $errPass ="<div class='text-red-500 mt-[-18px]  text-right '>Please write Your pass </div>";
}elseif(strlen($pass) < 6){
 $errPass ="<div class='text-red-500 mt-[-18px]  text-right '>Please write a strong pass</div>";
}else{
  $crrPass =$conn->real_escape_string(md5($pass));
}

}

if (isset($crrEmail) && isset($crrPass)) {
  $checkQuery ="SELECT * FROM `user` WHERE `email` = '$email' AND `pass` ='$crrPass'";
     $check = $conn-> query($checkQuery);
     if ($check->num_rows == 0) {
      $loginmessage = "<div style='color:red;font-size:30px;'>Please Go to Sign-up</div>";
     } elseif($check->num_rows == 1){
      $loginmessage ="<div style='width:600px;color:green;font-size:25px;'> Registration Complited successfully.<BR><p style='color:green;font-size:25px;margin-left:120px;'>Login Successfully</p></div>";
      $userData =$check->fetch_object();
      $_SESSION['user']=['id'=>$userData->id,'name' => $userData-> name,'email' => $userData-> email,'img' => $userData-> img,'gender' => $userData-> gender,'city' => $userData-> city,'country' => $userData-> country,'role' => $userData-> role];

      echo"
          <script>
          setTimeout(()=>{
            location.href='./index'
          },1500);
          </script>
          ";
     }
}





?>

<div class=" md:w-96 bg-white flex flex-col md:mx-auto w-96 md:py-8 mt-8 md:mt-0 mx-auto mb-24">
       <p class="text-black text-4xl text-center title-font mb-1 font-bold">Sign-in</p>
    <?= $loginmessage ?? null ?>

    <form action="" method="post">

   
     <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="text" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" >
      </div>
       <?=$errEmail ?? null  ?>

        <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Password</label>
        <input type="password" id="password" name="pass" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
        <div class='text-center flex item-center gap-3'><input type='checkbox'onclick="myf()" /><p class='font-bold'>show pass</p></div>
        <?=$errPass ?? null  ?>
      </div>
       

     <button class="text-white mx-auto bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="sp123">Sign-in</button>
       </form>
      <p class="text-xs text-gray-500 mt-3">Dont have an account?<a class="text-xs text-gray-900 font-bold" href="./Sign-up">Sign-up Now</a></p> 
    </div>
  </div>
<script>


 function myf(){
    var show = document.getElementById('password');
    if(show.type=='password'){
        show.type='text';
    }else{
        show.type='password';
    }
  }

</script>
<?php
include_once("./footer.php");
?>