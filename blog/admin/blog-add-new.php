<?php
include_once("./header.php");
$cats = $conn->query("SELECT * FROM Categories");
if (isset($_POST['addPost'])) {
    $title = safuda($_POST['title']);
    $catid = safuda($_POST['catid']);
    $post = safuda($_POST['post']);
    $fname = $_FILES["img"]["name"];
    $tmpname = $_FILES["img"]["tmp_name"];

    if (getimagesize($tmpname)) {
        $newFileName = uniqid() . "." . pathinfo($fname, PATHINFO_EXTENSION);
        $move = move_uploaded_file($tmpname, "../images/blog/$newFileName");
        $id = $_SESSION['user']['id'];
        if ($move) {
            $insert = $conn->query("INSERT INTO `blogs` (`title`, `image`, `cat_id`, `post`, `user_id`) VALUES ('$title', '$newFileName', $catid, '$post', $id)");
            if ($insert) {
                echo "<script>toastr.success('Blog posted successfully')</script>";
            }
        }
    }
}
?>
<link rel="stylesheet" href="./plugins/Trumbowyg-main/dist/ui/trumbowyg.min.css">
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800 mb-3">Add New</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" placeholder="Post Title" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" required name="catid">
                            <option selected>Select a Category</option>
                            <?php
                            while ($cat = $cats->fetch_object()) {
                            ?>
                                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea name="post" id="te" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" required name="img" accept="image/*">
                        <label class="custom-file-label" for="customFile">Upload Image</label>
                    </div>
                    <input type="submit" value="Post Now" class="btn btn-primary" name="addPost">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./plugins/Trumbowyg-main/dist/trumbowyg.min.js"></script>
<script src="./plugins/Trumbowyg-main/dist/plugins/upload/trumbowyg.cleanpaste.min.js"></script>
<script src="./plugins/Trumbowyg-main/dist/plugins/upload/trumbowyg.pasteimage.min.js"></script>
<script>
    $(document).ready(function() {
        $('#te').trumbowyg();
    })
</script>
<?php
include_once("./footer.php")
?>