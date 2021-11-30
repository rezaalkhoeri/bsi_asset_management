<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('partial/head');
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    $this->load->view('partial/sidebar');
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        $this->load->view('partial/topbar');
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-boxes"></i> List Detail Item</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#extraLargeModal"><i class="fa fa-plus"></i> Add Detail Item </button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Serial Number</th>
                      <th scope="col">Asset Number</th>
                      <th scope="col">Value Price</th>
                      <th scope="col">Condition</th>
                      <th scope="col">Status Barang</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    foreach ($get as $a) {
                      # code...
                    ?>

                      <tr>
                        <td scope="col"><?= $a->jenis . ' | ' . $a->merek ?></td>
                        <td scope="col"><?= $a->serial_number ?></td>
                        <td scope="col"><?= $a->asset_number ?></td>
                        <td scope="col"><?= "Rp " . number_format($a->value_price, 2, ',', '.'); ?></td>
                        <td scope="col"><?= $a->condition ?></td>
                        <td scope="col">
                          <?php
                          if ($a->status == 0) {
                            echo "<label class='badge badge-dark'>On loan</label>";
                          } elseif ($a->status == 1) {
                            echo "<label class='badge badge-success'>Available</label>";
                          } elseif ($a->status == 2) {
                            echo "<label class='badge badge-info'>On Request Order</label>";
                          } elseif ($a->status == 3) {
                            echo "<label class='badge badge-warning'>Rent</label>";
                          } elseif ($a->status == 5) {
                            echo "<label class='badge badge-danger'>Declined</label>";
                          }
                          ?>
                        </td>
                        <td scope="col">
                          <div class="text-center">
                            <a href="#" data-toggle="modal" data-target="#edit<?= $a->id ?>"><span class="badge badge-primary"><i class="fa fa-edit"></i> Edit</span></a>
                          </div>
                          <!-- <span href="hapus/<?php echo $a->id ?>"><span class="badge badge-danger">Delete</span></a> -->
                        </td>
                      </tr>
                    <?php }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      $this->load->view('partial/footer');
      ?>

      <?php
      $this->load->view('partial/script');
      ?>

      <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Item Detail Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="<?= base_url('itemDetail/tambah_aksi'); ?>" method="post" name="my_form">
              <div class="modal-body">

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Add Data Item</h6> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="inputTable" width="100%" cellspacing="0">
                        <thead id="arrHead" class="thead-dark">
                          <tr>
                            <th scope="col" width="200px">Type</th>
                            <th scope="col" width="200px">Serial Number</th>
                            <th scope="col" width="200px">Asset Number</th>
                            <th scope="col" width="200px">Value Price</th>
                            <th scope="col" width="200px">Condition</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="inputTable" class="row-body">
                          <tr id='row'>
                            <td scope="col" width="200px">
                              <!-- type -->
                              <div class="form-group">
                                <select class="form-control" name="type[]" id="type">
                                  <?php foreach ($type as $t) { ?>
                                    <option value=<?= $t->id ?>><?= $t->jenis . ' | ' . $t->merek ?></option>
                                  <?php } ?>
                                </select>
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
                              </div>
                            </td>
                            <td scope="col">
                              <!-- serial number -->
                              <div class="form-group">
                                <input type="text" class="form-control" id="serialnumber" name="serialnumber[]" required>
                              </div>
                            </td>

                            <td scope="col">
                              <!-- asset number -->
                              <div id="ticket_feedback" class="form-group">
                                <input type="text" class="form-control" id="assetnumber" name="assetnumber[]" required>
                              </div>
                            </td>

                            <td scope="col">
                              <!-- value price -->
                              <div id="ticket_feedback" class="form-group">
                                <input type="text" class="form-control" id="valueprice" name="valueprice[]" required>
                              </div>
                            </td>

                            <td scope="col">
                              <!-- condition -->
                              <div class="form-group">
                                <textarea class="form-control" name="condition[]" id="condition" rows="3"></textarea>
                              </div>
                            </td>
                            <td scope="col">
                              <button onclick='removeRow(this.parentNode.parentNode.rowIndex)' type="button" class="btn-delete btn btn-danger">
                                <i class="fa fa-times"></i>
                              </button>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="form-group">
                      <button id="addRow" onclick="myFunction()" type="button" class="btn btn-info">Add Row</button>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="add" value="input" class="btn btn-primary"> Save </button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- The Modal -->
      <?php
      foreach ($get as $a) { ?>
        <div class="modal fade" id="edit<?php echo $a->id ?>">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Item Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="<?= base_url('itemDetail/update/' . $a->id); ?>" method="post" name="my_form">
                <!-- Modal body -->
                <div class="modal-body">
                  <!-- type -->
                  <div class="form-group">
                    <select class="form-control" name="type" id="type">
                      <?php foreach ($type as $t) { ?>
                        <option <?php if ($t->id == $a->id_item) {
                                  echo "selected";
                                } ?> value=<?= $t->id ?>>
                          <?= $t->jenis . ' | ' . $t->merek ?>
                        </option>

                      <?php } ?>
                    </select>
                    <i class="form-control-feedback"></i>
                    <span class="text-warning"></span>
                  </div>

                  <!-- serial number -->
                  <div class="form-group">
                    <input type="text" class="form-control" id="serialnumber" name="serialnumber" value="<?php echo $a->serial_number ?>" required>
                  </div>

                  <!-- asset number -->
                  <div id="ticket_feedback" class="form-group">
                    <input type="text" class="form-control" id="assetnumber" name="assetnumber" value="<?php echo $a->asset_number ?>" required>
                  </div>

                  <!-- value price -->
                  <div id="ticket_feedback" class="form-group">
                    <input type="text" class="form-control" id="valueprice" name="valueprice" value="<?php echo $a->value_price ?>" required>
                  </div>

                  <!-- condition -->
                  <div class="form-group">
                    <textarea class="form-control" name="condition" id="condition" rows="3"><?php echo $a->condition ?></textarea>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" value="input" class="btn btn-primary">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      <?php } ?>
      <!-- End The Modal -->

    </div>

  </div>


  <script>
    function myFunction() {

      var getData = [
        <?php foreach ($type as $t) { ?>["<?php echo '<option value=' . $t->id . '>' . $t->jenis . ' | ' . $t->merek . '</option>'; ?>"],
        <?php } ?>
      ];

      var tr_s = "<tr id='row'>";
      // var tr_btn_s = "<tr class='button-row'>";
      var tr_e = "</tr>";
      var type = "<td scope='col' width='200px'><div class='form-group'><select class='form-control' name='type[]' id='type'>" + getData + " </option></select></div></td>";
      var serialnumber = "<td scope='col'><div class='form-group'><input type='text' class='form-control' id='serialnumber' name='serialnumber[]' required></div></td>";
      var assetnumber = "<td scope='col'><div class='form-group'><input type='text' class='form-control' id='serialnumber' name='assetnumber[]' required></div></td>";
      var valueprice = "<td scope='col'><div class='form-group'><input type='text' class='form-control' id='serialnumber' name='valueprice[]' required></div></td>";
      var condition = "<td scope='col'><div class='form-group'><textarea class='form-control' name='condition[]' id='condition'></textarea></div></td>"
      var action = "<td scope='col'><button onclick='removeRow(this.parentNode.parentNode.rowIndex)' type='button'  class='btn-delete btn btn-danger'><i class='fa fa-times'></i></button></td>"

      $(".row-body").append(tr_s + type + serialnumber + assetnumber + valueprice + condition + action + tr_e);

    }

    function removeRow(i) {
      document.getElementById('inputTable').deleteRow(i)
    }
  </script>


</body>

</html>