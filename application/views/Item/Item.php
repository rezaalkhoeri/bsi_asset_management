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
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-box"></i> List Item</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><i class="fa fa-plus"></i> Add Item</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Stock</th>
                      <!-- <th scope="col">Status</th> -->
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="posTable">
                    <?php
                    foreach ($get as $a) { ?>
                      <tr>
                        <td scope="col"><?= $a->jenis ?></td>
                        <td scope="col"><?= $a->merek ?></td>
                        <td scope="col"><?= $a->stok ?> Unit </td>
                        <!-- <td scope="col">
                          <?php
                          if ($a->status == 0) {
                            echo "<label class='badge badge-danger'>Empty Stock</label>";
                          } elseif ($a->status == 1) {
                            echo "<label class='badge badge-success'>Already Item</label>";
                          } elseif ($a->status == 2) {
                            echo "<label class='badge badge-warning'>On Procurement</label>";
                          }
                          ?>
                        </td> -->
                        <td scope="col">
                          <div class="text-center">
                            <a href="#" data-toggle="modal" data-target="#edit<?php echo $a->id ?>"><span class="badge badge-primary">
                                <i class="far fa-edit"></i> Edit</span></a>
                          </div>

                          <!-- <a href="hapus/<?php echo $a->id ?>"><span class="badge badge-danger">Delete</span></a> -->
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('partial/script'); ?>
      <?php $this->load->view('partial/footer'); ?>

      <!-- Save Modal -->
      <div id="largeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Item Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="<?= base_url('Item/tambah_aksi'); ?>" method="post" name="my_form">
              <div class="modal-body">
                <!-- Page Heading -->
                <!-- input -->
                <!-- type -->
                <div id="ticket_feedback" class="form-group">
                  <label for="type">Type</label>
                  <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <!-- brand -->
                <div class="form-group">
                  <label for="brand">Brand</label>
                  <input type="text" class="form-control" id="brand" name="brand" required>
                </div>

                <!-- stock -->
                <!-- <div id="ticket_feedback" class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" required>
                  </div> -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- button add-->
                <button type="add" value="input" class="btn btn-primary"> Save </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Edit Modal-->
      <?php
      foreach ($get as $d) { ?>
        <div class="modal fade" id="edit<?php echo $d->id ?>">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Item Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="<?= base_url('Item/update/' . $d->id); ?>" method="post" name="my_form">
                <div class="modal-body">
                  <!-- type -->
                  <div id="ticket_feedback" class="form-group">
                    <label for="type">Type</label>
                    <input value=<?php echo $d->jenis; ?> type="text" class="form-control" id="type" name="type" required>
                  </div>
                  <!-- brand -->
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input value=<?php echo $d->merek; ?> type="text" class="form-control" id="brand" name="brand" required>
                  </div>

                  <!-- stock -->
                  <!-- <div id="ticket_feedback" class="form-group">
                  <label for="stock">Stock</label>
                  <input value=<?php echo $d->stok; ?> type="text" class="form-control" id="stock" name="stock" required>
                </div> -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <!-- button add-->
                  <button type="add" value="input" class="btn btn-primary"> Save </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- End The Modal -->

    </div>

  </div>

</body>

</html>