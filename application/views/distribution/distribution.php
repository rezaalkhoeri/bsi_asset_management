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

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Procurement</h1> -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-people-carry"></i> Distribution </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <a href="<?= base_url('Distribution/index_input')?>" role="button">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><i class="fas fa-plus"></i> Create Request Order</button>
                  </a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              		<thead>
                    <tr>
                      <th scope="col">Requisition Number</th>
                      <th scope="col">Recipient</th>
                      <th scope="col">Giver</th>
                      <th scope="col">Location</th>
                      <th scope="col">Date</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="posTable" >
                  <?php
                  foreach ($get as $a) {
                  ?>
                    <tr>
                    <td scope="col"><?= $a->no_tiket?></td>
                    <td scope="col"><?= $a->recipient?></td>
                    <td scope="col"><?= $a->giver?></td>
                    <td scope="col"><?= $a->nama_lokasi?></td>
                    <td scope="col"><?= $a->date?></td>
                    <td scope="col"><?= $a->deskripsi?></td>
                    <td scope="col">
                      <?php
                        if ($a->status == 0){
                          echo "<label class='badge badge-warning'>Hold</label>";
                        } elseif ($a->status == 1) {
                          echo "<label class='badge badge-info'>Handover</label>";
                        } elseif ($a->status == 2) {
                          echo "<label class='badge badge-secondary'>Distributed</label>";
                        } elseif ($a->status == 3) {
                          echo "<label class='badge badge-danger'>Canceled</label>";
                        }
                      ?>
                    </td>
                    <td scope="col">
                      <div class="text-center">
                        <a href="detail/<?php echo $a->id ?>" class="badge badge-primary btn-xs"><span class="fa fa-eye"></span></a>

                        <?php
                        if ($a->status == 0){
                          echo "<a href='handover/".$a->id."' class='badge badge-success btn-xs'><span class='fa fa-handshake'></span></a>";
                        } elseif ($a->status == 1) {
                          echo "<a href='distribute/".$a->id."' class='badge badge-success btn-xs'><span class='fas fa-truck'></span></a>";
                        }

                        ?>

                        <a href="canceled/<?php echo $a->id ?>" class="badge badge-danger btn-xs"><span class="fa fa-times"></span></a>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

      <?php $this->load->view('partial/script'); ?>
      <?php $this->load->view('partial/footer'); ?>

</body>
</html>
