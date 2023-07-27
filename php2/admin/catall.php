<?php
include_once("./header.php");
function sf()
{

  $GLOBALS['select'] = $GLOBALS['conn']->query("SELECT  * FROM `catagories`");
}
sf();
if (isset($_POST['delmodal'])) {
  $delid = safuda($_POST['delid']);
  $detele = $conn->query("DELETE FROM `catagories` WHERE `id` = $delid");
  if ($detele) {
    echo "<script>toastr.warning('catagory deleted successfull')</script>";
  }
}



?>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<body id="page-top">

  <div id="wrapper">

    <?php include_once("./sidebar.php");  ?>


    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <?php include_once("./navbar.php");  ?>



        <div class="container-fluid">


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) ?></h1>

          </div>
        </div>


        <div id="content-wrapper" class="d-flex flex-column">


          <div id="content">




            <div class="container-fluid">


              <div class="card shadow mb-4">

                <div class="card-body">
                  <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">





                      <table id="myTable" class="display table" data-page-length='5'>
                        <thead>
                          <tr>
                            <th>Sn</th>
                            <th>Name</th>
                            <th>action</th>
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
                                  <button class='btn btn-sm btn-warning editcat' data-name="<?= $data->name ?>" data-id="<?= $data->id ?>"><i class="fas fa-edit"></i></button>

                                  <button class='btn btn-sm btn-danger dalcatbtn' data-id="<?= $data->id ?>"><i class="fas fa-trash"></i></button>
                                </td>
                              </tr>
                          <?php $sn++;
                            }
                          }
                          ?>


                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="modal" tabindex="-1" id='editcatm'>
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-dark">
                    <h5 class="modal-title  text-light">Edit Catagories</h5>
                    <button type="button" class="close text-light text-lg font-weight-bold" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action='' method='post' id='upcatform'>

                      <input type='hidden' name='id' id='catid' />

                      <div class='form-group'>
                        <input type="text" class='form-control ' placeholder="Edit Catagories Name" name='catname' id='catname' />
                        <div class="invalid-feedback"></div>
                        <div class="valid-feedback"></div>
                      </div>

                      <button type='submit' class="bg-dark border-0 rounded-sm px-3 py-2 text-light font-weight-bolder ">Update</button>

                    </form>
                  </div>

                </div>
              </div>
            </div>




            <div class="modal" tabindex="-1" id='delcatm'>
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h5 class="modal-title  text-light">Delete Catagories</h5>
                    <button type="button" class="close text-light text-lg font-weight-bold" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <form action='' method='post' class="d-inline">
                      <input type='hidden' name='delid' id='delcatid' />

                      do you really want to delete the cetagory



                      <button name='delmodal' type='submit' class="bg-dark border-0 rounded-sm px-3 py-2 text-light font-weight-bolder ">Yes</button>
                    </form>
                    <a href='./catall' class="btn btn-success d-inline">no</a>
                  </div>

                </div>
              </div>
            </div>













            <script>
              $(document).ready(function() {


                $(document).on("click", ".editcat", function() {
                  const dn = $(this).attr("data-name");
                  const di = $(this).attr("data-id");
                  $("#catname").val(dn);
                  $("#catid").val(di);
                  $("#editcatm").modal("show");
                })

                $(document).on("submit", "#upcatform", function(e) {
                  e.preventDefault();
                  if (!$("#catname").val()) {
                    $("#catname").addClass("is-invalid");
                    $("#catname").next().text("please write a category name");
                  } else {
                    $.post("./catagoryupdate", {
                      catname: $("#catname").val(),
                      catid: $("#catid").val()
                    }, function(data) {
                      if (JSON.parse(data).catname) {
                        $("#catname").addClass("is-valid");
                        $("#catname").next().next().text("catagory uploaded successfully");
                        setTimeout(() => {
                          location.reload()
                        }, 1000)

                      }
                    })
                  }
                })
                $(document).on("click", ".dalcatbtn", function() {
                  const di = $(this).attr("data-id");
                  $("#delcatid").val(di);
                  $("#delcatm").modal("show");
                })
              })
            </script>





            <?php
            include_once("./footer.php");
            ?>