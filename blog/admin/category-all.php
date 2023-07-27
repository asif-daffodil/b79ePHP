<?php
include_once("./header.php");
function selectFunc()
{
    $GLOBALS['select'] = $GLOBALS['conn']->query("SELECT * FROM `categories`");
}
selectFunc();

if (isset($_POST['delModal'])) {
    $delid = safuda($_POST["delid"]);
    $detele = $conn->query("DELETE FROM `categories` WHERE `id` = $delid");
    if ($detele) {
        echo "<script>toastr.warning('Category deleted')</script>";
        selectFunc();
    }
}

?>
<div class="container-fluid">
    <div class="mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="myTable" class="display table" data-page-length='5'>
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
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
                                                <td><?= $data->name ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning editCat" data-name="<?= $data->name ?>" data-id="<?= $data->id ?>"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger delCatBtn" data-id="<?= $data->id ?>"><i class="far fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                    <?php $sn++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="editCatM">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="upCatForm">
                    <input type="hidden" name="id" id="catId">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Category Name" name="catName" id="catName">
                        <div class="invalid-feedback"></div>
                        <div class="valid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="delCatM">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="d-inline">
                    <input type="hidden" name="delid" id="delcatId">
                    Do you realy want to delete the Category?
                    <button type="submit" class="btn btn-danger" name="delModal">Yes</button>
                </form>
                <button href="" class="btn btn-success d-inline" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $(document).on("click", ".editCat", function() {
            const dn = $(this).attr("data-name");
            const di = $(this).attr("data-id");
            $("#catName").val(dn);
            $("#catId").val(di);
            $("#editCatM").modal("show");
        })
        $(document).on("submit", "#upCatForm", function(e) {
            e.preventDefault();
            if (!$("#catName").val()) {
                $("#catName").addClass("is-invalid");
                $("#catName").next().text("Please write a categoty name");
            } else {
                $.post("./category-update", {
                    catName: $("#catName").val(),
                    catId: $("#catId").val()
                }, function(data) {
                    if (JSON.parse(data).catName) {
                        $("#catName").addClass("is-valid");
                        $("#catName").next().next().text("Category updated successfully");
                        setTimeout(() => location.reload(), 2000);
                    }
                })
            }
        })

        $(document).on("click", ".delCatBtn", function() {
            const di = $(this).attr("data-id");
            $("#delcatId").val(di);
            $("#delCatM").modal("show");
        })
    })
</script>
<?php
include_once("./footer.php")
?>