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
              <h6 class="m-0 font-weight-bold text-primary">Requisition - Order</h6>
            </div>
            <div class="card-body">

              <form action="<?= base_url('Requisition/tambah_aksi'); ?>" method="post" name="my_form">

                <!-- ticket -->
                <div class="form-group">
                  <label for="ticket">Ticket</label>
                  <input type="text" class="form-control" id="ticket" name="ticket" maxlength="15" required>
                </div>

                <!-- item -->
                <div class="form-group">
                  <label for="item">Item</label>
                  <input type="hidden" name="quantity" id="y" value="0">

                  <div class="card mb-4 py-3 border-left-success">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th scope="col">Type</th>
                              <th scope="col">Serial Number</th>
                              <th scope="col">Asset Number</th>
                              <th scope="col">Value Price</th>
                              <th scope="col">Select</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            foreach ($item as $a) {
                              # code...
                            ?>

                              <tr>
                                <td scope="col"><?= $a->jenis . ' | ' . $a->merek ?></td>
                                <td scope="col"><?= $a->serial_number ?></td>
                                <td scope="col"><?= $a->asset_number ?></td>
                                <td scope="col"><?= "Rp " . number_format($a->value_price, 2, ',', '.'); ?></td>
                                <td scope="col">
                                  <input type="checkbox" name="item[]" value="<?= $a->id ?>" onclick="updateCount()">
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- requestor -->
                <div class="form-group">
                  <label for="requestor">Requestor</label>
                  <input type="text" class="form-control" name="requestor" id="requestor" required>
                </div>


                <!--date-->
                <div class="form-group">
                  <label for="date">Date</label><br />
                  <input type="date" name="date" id="actualDate">
                  <span class="text-warning"></span>
                </div>

                <!-- description -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <!-- button submit-->
                <div class="form-group">
                  <button type="submit" value="input" class="btn btn-primary"> Save </button>
                  <button type="reset" value="input" class="btn btn-warning"> Clear </button>
                  <a href="<?= base_url('Requisition/index') ?>" role="button">
                    <button type="button" value="" class="btn btn-danger">Cancel</button>
                  </a>
                </div>

              </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('partial/script'); ?>
      <?php $this->load->view('partial/footer'); ?>

      <script type="text/javascript">
        window.updateCount = function() {
          var x = $(".z:checked").length;
          document.getElementById("y").value = x;
        };
        //
        // $( "selector" ).datepicker({
        //     dateFormat: "yyyy-mm-dd"
        // })
      </script>

    </div>
  </div>


</body>

</html>