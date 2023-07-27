<?php
include_once("./header.php");
if (isset($_POST['addCat'])) {
    $catName = safuda($_POST['catName']);
    if (empty($catName)) {
        $errCatname = "Please write the category name";
    } else {
        $catName = $conn->real_escape_string(ucfirst($catName));
        $insert = $conn->query("INSERT INTO `categories` (`name`) VALUES ('$catName')");
        if (!$insert) {
            $errMessage = '<div class="alert alert-danger fade show mb-3" role="alert">Database Problem</div>';
        } else {
            $sucMessage = '<div class="alert alert-success fade show mb-3" role="alert">Category ' . $catName . ' added</div>';
        }
    }
}
?>
<div class="container-fluid">
    <div class="d-sm-flex flex-column align-items-start justify-content-start mb-4">
        <h1 class="h3 mb-0 text-gray-800 mb-4">Add New Category</h1>
        <form action="" method="post" class="mb-3">
            <div class="mb-3">
                <input type="text" class="form-control form-control-user <?= isset($errCatname) ? "is-invalid" : null ?>" name="catName" placeholder="Category Name">
                <div class="invalid-feedback"><?= $errCatname ?? null ?></div>
            </div>
            <button type="submit" class="btn btn-facebook" name="addCat">Add new Category</button>
        </form>
        <?= $errMessage ?? $sucMessage ?? null ?>
    </div>

</div>

<script>
    setTimeout(() => {
        Array.from(document.querySelectorAll(".alert")).map(e => e.remove())
    }, 2000)
</script>

<?php
include_once("./footer.php")
?>