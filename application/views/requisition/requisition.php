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
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-signature"></i> Requisition </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <a href="<?= base_url('Requisition/index_input') ?>" role="button">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><i class="fa fa-plus"></i> Create Request Order</button>
                  </a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">Ticket</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Date</th>
                      <th scope="col">Requestor</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      <th scope="col" width="100px;">Action</th>

                    </tr>
                  </thead>
                  <tbody id="posTable">
                    <?php
                    foreach ($get as $a) {
                    ?>
                      <tr>
                        <td scope="col"><?= $a->no_tiket ?></td>
                        <td scope="col"><?= $a->quantity ?></td>
                        <td scope="col"><?= $a->date ?></td>
                        <td scope="col"><?= $a->requestor ?></td>
                        <td scope="col"><?= $a->deskripsi ?></td>
                        <td scope="col">
                          <?php
                          if ($a->status == 0) {
                            echo "<label class='badge badge-warning'>Pending</label>";
                          } elseif ($a->status == 1) {
                            echo "<label class='badge badge-success'>Accept</label>";
                          } elseif ($a->status == 2) {
                            echo "<label class='badge badge-danger'>Decline</label>";
                          } elseif ($a->status == 3) {
                            echo "<label class='badge badge-info'>Handover</label>";
                          } elseif ($a->status == 4) {
                            echo "<label class='badge badge-secondary'>Distributed</label>";
                          } elseif ($a->status == 5) {
                            echo "<label class='badge badge-danger'>Canceled</label>";
                          }
                          ?>
                        </td>
                        <td scope="col">
                          <div class="text-center">
                            <!-- <a href="edit/<?php echo $a->id ?>" class="badge badge-primary btn-xs"><span class="fa fa-edit"></span></a> -->
                            <a href="detail/<?php echo $a->id ?>" class="badge badge-primary btn-xs"><span class="fa fa-eye"></span></a>
                            <a href="approve/<?php echo $a->id ?>" class="badge badge-success btn-xs"><span class="fa fa-check"></span></a>
                            <a href="decline/<?php echo $a->id ?>" class="badge badge-danger btn-xs"><span class="fa fa-times"></span></a>
                          </div>
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
    </div>
  </div>

</body>

</html>