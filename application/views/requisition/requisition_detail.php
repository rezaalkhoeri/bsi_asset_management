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
              <h6 class="m-0 font-weight-bold text-primary">Detail Request</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                <table style="margin-top:20px; float:left;" width="60%" border="0" cellpadding="2" cellspacing="0" align="center">
                  <?php foreach ($get as $a){ ?>
                  <tr>
                    <td style="text-align: left;">No. Ticket</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->no_tiket ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;">Transaction Code</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->transactionCode ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;">Cost Center</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->cost_center ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;">Requestor</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->requestor ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;">Date</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->date ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;">Quantity</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"><?= $a->quantity ?></td>
                  </tr>

                  <?php } ?>

                </table>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">

                <table class="table table-bordered table-hover tablesorter">
                  <thead>
                    <tr>
                      <th class="header">No. <i class="fa fa-sort"></i></th>
                      <th class="header">Type <i class="fa fa-sort"></i></th>
                      <th class="header">Brand <i class="fa fa-sort"></i></th>
                      <th class="header">Serial Number <i class="fa fa-sort"></i></th>
                      <th class="header">Asset Number <i class="fa fa-sort"></i></th>
                      <th class="header">Value Price <i class="fa fa-sort"></i></th>
                      <th class="header">Condition <i class="fa fa-sort"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($item_detail as $a){
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $a->jenis ?></td>
                      <td><?= $a->merek ?></td>
                      <td><?= $a->serial_number ?></td>
                      <td><?= $a->asset_number ?></td>
                      <td><?= "Rp ".number_format($a->value_price,2,',','.'); ?></td>
                      <td><?= $a->condition ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <?php foreach ($get as $a){ ?>
                  <a class="btn btn-warning" href="<?= base_url('Requisition/pdf/'.$a->id)?>" target="_blank"> <i class="fa fa-print"></i> Print </a>
                <?php } ?>
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
