 <div class="text-center text-3xl md:text-6xl my-3 md:my-6">
     Latest Blog Post
 </div>
 <?php
    $blogs = $conn->query("SELECT * FROM `blogs` ORDER BY id DESC LIMIT 3");
    $x = 1;
    while ($data = $blogs->fetch_object()) {
        if ($x % 2 != 0) {
    ?>
         <div class="container mx-auto flex justify-center">
             <div class="flex flex-col justify-center">
                 <div class="flex flex-col md:flex-row max-w-7xl justify-center items-center ">
                     <div class="overflow-hidden w-full m-4 shadow-sm flex flex-col md:flex-row justify-center">
                         <div class="flex flex-col md:flex-row items-center">
                             <div class=" w-full overflow-hidden">
                                 <img src="./images/blog/<?= $data->image ?>" alt="" class="w-full h-96 object-cover" />
                             </div>
                             <div class="md:w-2/3 m-4 ">
                                 <div class="flex text-gray-500 text-sm m-2">
                                     <div class="m-1 font-bold">Vlog,</div>
                                     <div class="m-1">
                                         <?= date("d F, Y", strtotime($data->created_at)) ?>
                                     </div>
                                 </div>
                                 <div class="font-bold text-xl m-2">
                                     <a href=""><?= $data->title ?></a>
                                 </div>
                                 <div class="text-sm text-gray-500 mt-4 m-2">
                                     <?= htmlspecialchars_decode($data->post)  ?>
                                 </div>
                                 <div class="flex cursor-pointer">
                                     <?php
                                        $uid = $data->user_id;
                                        $getUserData = $conn->query("SELECT * FROM users WHERE id = $uid");
                                        $getUser = $getUserData->fetch_object();
                                        ?>
                                     <div class="m-2"> <img src="./images/users/<?= $getUser->img ?>" alt="" class="rounded-full w-12" /> </div>
                                     <div class="grid m-1">
                                         <div class="font-bold text-sm hover:text-gray-600 mt-2"><?= $getUser->name ?></div>
                                         <div class=" text-sm hover:text-gray-600"><?= $getUser->city . " " . $getUser->country ?></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <?php } else { ?>
         <div class="container mx-auto flex justify-center">
             <div class="flex flex-col justify-center">
                 <div class="flex flex-col md:flex-row max-w-7xl justify-center items-center ">
                     <div class="overflow-hidden w-full m-4 shadow-sm flex flex-col md:flex-row justify-center">
                         <div class="flex flex-col md:flex-row items-center">
                             <div class="md:w-2/3 m-4 ">
                                 <div class="flex text-gray-500 text-sm m-2">
                                     <div class="m-1 font-bold">Vlog,</div>
                                     <div class="m-1">
                                         <?= date("d F, Y", strtotime($data->created_at)) ?>
                                     </div>
                                 </div>
                                 <div class="font-bold text-xl m-2">
                                     <a href=""><?= $data->title ?></a>
                                 </div>
                                 <div class="text-sm text-gray-500 mt-4 m-2">
                                     <?= htmlspecialchars_decode($data->post)  ?>
                                 </div>
                                 <div class="flex cursor-pointer">
                                     <?php
                                        $uid = $data->user_id;
                                        $getUserData = $conn->query("SELECT * FROM users WHERE id = $uid");
                                        $getUser = $getUserData->fetch_object();
                                        ?>
                                     <div class="m-2"> <img src="./images/users/<?= $getUser->img ?>" alt="" class="rounded-full w-12" /> </div>
                                     <div class="grid m-1">
                                         <div class="font-bold text-sm hover:text-gray-600 mt-2"><?= $getUser->name ?></div>
                                         <div class=" text-sm hover:text-gray-600"><?= $getUser->city . " " . $getUser->country ?></div>
                                     </div>
                                 </div>
                             </div>
                             <div class=" w-full overflow-hidden">
                                 <img src="./images/blog/<?= $data->image ?>" alt="" class="w-full h-96 object-cover" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

 <?php }
        $x++;
    } ?>