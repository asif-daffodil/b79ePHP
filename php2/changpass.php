<script src="https://cdn.tailwindcss.com"></script>
<?php
include_once("./header.php");

if (isset($_POST['cngps'])) {
$opass=  safuda($_POST['opass']);
$npass= safuda($_POST['npass']);
$cpass= safuda($_POST['cpass']);
$id = $_SESSION['user']['id'];

if (empty($opass)) {
  $erropass ="please write your old pass";
}else{
   $copass = md5($opass);
   $opasquery =$conn->query("SELECT `pass` FROM `user` WHERE `id` = $id");
   $realopass = $opasquery->fetch_object();
   if($realopass->pass != $copass){
  $erropass ="invalid old pass";
   }else{
    $crropass = $copass;
   }
}


if (empty($npass)) {
  $errnpass ="please write your new pass";
}elseif(strlen($npass)< 6){
  $errnpass ="please write strong password";
}else{
  $crrnpass = $npass;
}

if (empty($cpass)) {
  $errcpass ="please confirm pass";
}elseif($npass != $cpass){
 $errcpass =" confirm pass didnot match";
}else{
  $crrcpass = $cpass;
}


if(isset($crropass) && isset($crrnpass) && isset($crrcpass)){
  $newpass =$conn->real_escape_string(md5($crrcpass));
  $uppas = $conn->query("UPDATE `user` SET `pass` ='$newpass' WHERE `id` = $id");

   if (!$uppas) {
   $errupdate ="Dtabase problem";
}else{
   $errupdate = "user passupdate update successfull";
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

<section class="text-gray-600 body-font flex relative">
  
    <div class="container px-5 py-24 mx-auto ">
    <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">update password</h2>
      <form action='' method='post'>
        <?= $errupdate ?? null ?>
      <div class="relative mb-4">
        <label for="opass" class="leading-7 text-sm text-gray-600">old password</label>
        <input type="password"  name="opass" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        
        <p class='text-red-500'><?= $erropass ??  null ?></p>
      </div>
      <div class="relative mb-4">
        <label for="npass" class="leading-7 text-sm text-gray-600">new password</label>
        <input type="password"  name="npass" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <p class='text-red-500 '> <?= $errnpass ??  null ?></p>
      </div>
      <div class="relative mb-4">
        <label for="cpass" class="leading-7 text-sm text-gray-600">confirm password</label>
        <input type="password" id='cpass' name="cpass" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out " ><input class="absolute mt-5 ml-[-20]" type="checkbox" onclick="myfunction()"/>
        
        
       
        <p class="text-red-500 mb-5"> <?= $errcpass ??  null ?></p>
      
      <button class="text-black mx-auto w-[200px] border-0 py-2 px-6 focus:outline-none rounded text-lg"  name="cngps" style='background:gray;'>Button</button>
      
    </div>
  </div>
  </form>
</section>



 <script>

  function myfunction(){
    var show = document.getElementById('cpass');
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