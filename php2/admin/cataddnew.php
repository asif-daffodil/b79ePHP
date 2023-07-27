<?php 
include_once("./header.php");

if (isset($_POST['addcat'])) {
 $catname = safuda($_POST['catname']);
 if(empty($catname)){
    $errcatname = "please write the catagory";
 }else{
    $catname =$conn->real_escape_string(ucfirst
    ($catname));
   $insert= $conn->query("INSERT INTO `catagories` (`name`) VALUES ('$catname')");
   if (! $insert) {
   $errmessage ="<div class='text-danger'>Database probmelm</div>";
   }else{
    $sucmessage ="<div class='text-success text-xl'>Database uploaded successfull</div>";
    echo "<script>
         setTimeout(()=>{
            location.href ='./cataddnew'},1000);
         </script>";
      ;
   }
 }
}



?>

<body id="page-top">

    <div id="wrapper">

 <?php include_once("./sidebar.php");  ?>

       
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

<?php include_once("./navbar.php");  ?>
          

                
                <div class="container-fluid">

                
                    <div class="d-sm-flex flex-column align-items-start justify-content-start mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME)?></h1>
                        <form action='' method='post'>
                        <input type="text" class="mt-2 mb-3 <?= isset($errcatname) ? "is-invalid" : null  ?>" name='catname' placeholder='Catagory Name'/><br>
                   <p class='text-danger mt-0 invalid-feedback'> <?= $errcatname ?? null ?></p> 
                        <button class='facebook px-3 bg-primary border-0' name='addcat'>Add New Catagory</button>

                        </form>
                        <?= $errmessage ?? $sucmessage ?? null ?>
                    </div>   
                </div>
               
                
                
</div>
          
<?php include_once("./footer.php");  ?>