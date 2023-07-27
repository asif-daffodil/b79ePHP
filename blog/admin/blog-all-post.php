<?php
include_once("./header.php");
isset($_GET["editId"]) && $editId = $_GET["editId"];
if (isset($_GET["delId"])) {
    $delId = $_GET["delId"];
    $del = $conn->query("DELETE FROM `blogs` WHERE `id` = $delId");
    if ($del) {
        echo "<script>toastr.error('Blog deleted successfully');setTimeout(()=>location.href='./blog-all-post', 2000)</script>";
    }
}
$select = $conn->query("SELECT * FROM `blogs`");
if (isset($_POST['addPost'])) {
    $title = safuda($_POST['title']);
    $catid = safuda($_POST['catid']);
    $post = safuda($_POST['post']);
    $fname = $_FILES["img"]["name"];
    $tmpname = $_FILES["img"]["tmp_name"];

    if (!empty($tmpname)) {
        if (getimagesize($tmpname)) {
            $newFileName = uniqid() . "." . pathinfo($fname, PATHINFO_EXTENSION);
            $move = move_uploaded_file($tmpname, "../images/blog/$newFileName");
            if ($move) {
                $update = $conn->query("UPDATE `blogs` SET `title` = '$title', `image` = '$newFileName', `cat_id` = $catid, `post` = '$post' WHERE `id` = $editId");
                if ($update) {
                    echo "<script>toastr.success('Blog updated successfully');setTimeout(()=>location.href='./blog-all-post', 2000)</script>";
                }
            }
        }
    } else {
        $update = $conn->query("UPDATE `blogs` SET `title` = '$title', `cat_id` = $catid, `post` = '$post' WHERE `id` = $editId");
        if ($update) {
            echo "<script>toastr.success('Blog updated successfully');setTimeout(()=>location.href='./blog-all-post', 2000)</script>";
        }
    }
}
?>
<link rel="stylesheet" href="./plugins/Trumbowyg-main/dist/ui/trumbowyg.min.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <h1 class="h3 mb-0 text-gray-800 mb-3">
                    <?= isset($editId) ? "Edit Post" : "All Post" ?>
                </h1>
                <?php if (!isset($editId)) { ?>
                    <table id="myTable" class="display table" data-page-length='5'>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Tile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($select->num_rows > 0) {
                                $sn = 1;
                                while ($data = $select->fetch_object()) {
                            ?>
                                    <tr>
                                        <td><?= $sn; ?></td>
                                        <td><img src="../images/blog/<?= $data->image ?>" alt="" class="img-fluid" style="height: 50px"></td>
                                        <td><?= $data->title ?></td>
                                        <td>
                                            <a href="./blog-all-post?editId=<?= $data->id ?>" class="btn btn-sm btn-warning editCat"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger delCatBtn" href="./blog-all-post?delId=<?= $data->id ?>" data-id="<?= $data->id ?>" onclick="if (!confirm('Do you really want to delete the data?')) return false;"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                            <?php $sn++;
                                }
                            } ?>
                        </tbody>
                    </table>
                <?php } else {
                    $getEditData = $conn->query("SELECT * FROM `blogs` WHERE `id` = $editId");
                    $editData = $getEditData->fetch_object();
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" placeholder="Post Title" name="title" class="form-control" value="<?= $editData->title ?>" required>
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" required name="catid">
                                        <option selected>Select a Category</option>
                                        <?php
                                        $cats = $conn->query("SELECT * FROM Categories");
                                        while ($cat = $cats->fetch_object()) {
                                        ?>
                                            <option value="<?= $cat->id ?>" <?= $cat->id == $editData->cat_id ? "selected" : null ?>><?= $cat->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <textarea name="post" id="te" cols="30" rows="10" required>
                        <?= htmlspecialchars_decode($editData->post) ?>
                    </textarea>
                                </div>
                                <input type="file" class="custom-file-input d-none" id="customFile" name="img" accept="image/*">
                                <input type="submit" value="Update Post" class="btn btn-primary" name="addPost">
                            </form>
                        </div>
                        <div class="col-md-6 text-muted">
                            <p class="position-absolute p-2">
                                Click to change the image
                            </p>
                            <label for="customFile">
                                <img src="../images/blog/<?= $editData->image ?>" alt="" class="img-fluid">
                            </label>
                        </div>
                    </div>
                <?php } ?>
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