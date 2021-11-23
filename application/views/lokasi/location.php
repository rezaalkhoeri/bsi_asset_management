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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-map-marker-alt"></i> Location</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div class="form-group">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#smallModal"><i class="fa fa-plus"></i> Add Location</button>
                  </div>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th scope="col">Location</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                    <tbody id="posTable" >
                    <?php
                    foreach ($get as $a) {
                      # code...
                      ?>

                      <tr>
                      <td scope="col"><?= $a->nama_lokasi?></td>
                      <td scope="col"><?= $a->deskripsi?></td>
                      <td scope="col">
                          <div class="text-center">
                          <a href="#" data-toggle="modal" data-target="#edit<?php echo $a->id ?>"><span class="badge badge-primary"><i class="fa fa-edit"></i> Edit</span>
                          </a>
                          </div>
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

      <!-- Footer -->
      <?php
            $this->load->view('partial/footer');
        ?>
      <!-- End of Footer -->

      <!-- Footer -->
        <?php
          $this->load->view('partial/script');
        ?>
      <!-- End of Footer -->

      <!-- Footer -->

      <!-- End of Footer -->
      <div id="smallModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add Location</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <form action="<?= base_url('Location/tambah_aksi');?>" method="post" name="my_form">
                  <div class="modal-body">
                      <!-- location -->
                        <div id="ticket_feedback" class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" maxlength="15" required>
                        </div>

                        <!-- description -->
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <!-- button add-->
                      <button type="add" value="input" class="btn btn-primary"> Add </button>
                  </div>
                </form>
              </div>
          </div>
      </div>

    <?php
    foreach ($get as $d) { ?>
    <div class="modal fade" id="edit<?php echo $d->id ?>">
      <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Location</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="<?= base_url('Location/update/'.$d->id);?>" method="post" name="my_form">
            <!-- Modal body -->
            <div class="modal-body">
                <!-- location -->
                <div id="ticket_feedback" class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" maxlength="15" value="<?php echo $d->nama_lokasi ?>" required>
                </div>

                <!-- description -->
                <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo $d->deskripsi ?></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="add" value="input" class="btn btn-primary"> Update</button>
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