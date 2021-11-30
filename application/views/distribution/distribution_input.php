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
              <h6 class="m-0 font-weight-bold text-primary">Distribution - Order</h6>
            </div>
            <div class="card-body">

                <form action="<?= base_url('Distribution/tambah_aksi');?>" method="post" name="my_form">

                <!-- receipt number -->
                <div class="form-group">
                  <label for="receiptnumber">Receipt number</label>
                  <input type="text" value="<?php echo $kode; ?>" class="form-control" id="receiptnumber" name="receiptnumber" readonly>
                </div>

                <!-- ticket -->
                <div class="form-group">
                  <label for="ticket">Ticket</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="button-addon1" data-toggle="modal" data-target="#extraLargeModal">Select</button>
                    </div>
                  <input id="noTicket" name="ticket" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                </div>
                </div>

              <!-- recipient -->
                <div class="form-group">
                <label for="recipient">Recipient</label>
                <input type="text" class="form-control" name="recipient" id="recipient" required>
                </div>

              <!-- giver -->
                <div class="form-group">
                <label for="giver">Giver</label>
                <input type="text" class="form-control" name="giver" id="giver" required>
                </div>

              <!-- location -->
                <div class="form-group">
                <label for="location">Location</label>
                <select class="form-control" name="location">
                  <?php foreach ($location as $a) { ?>
                    <option value="<?php echo $a->id; ?>"> <?php echo $a->nama_lokasi." | ".$a->deskripsi; ?> </option>
                  <?php } ?>
                </select>
                </div>

               <!--date-->
        			 <div class="form-group">
        			 <label for="date">Date</label><br/>
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
               <a href="<?= base_url('Requisition/index')?>" role="button">
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

        $( "selector" ).datepicker({
            dateFormat: "yyyy-mm-dd"
        })

      </script>

    </div>
  </div>

  <!-- the modals -->
  <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">List Item Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?= base_url('itemDetail/tambah_aksi');?>" method="post" name="my_form">
                    <div class="modal-body">

                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <!-- <h6 class="m-0 font-weight-bold text-primary">Add Data Item</h6> -->
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th scope="col">Ticket</th>
                                <th scope="col">Cost Center</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Date</th>
                                <th scope="col">Requestor</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col" width="100px;">Action</th>

                              </tr>
                            </thead>
                            <tbody id="posTable" >
                            <?php
                            foreach ($get as $a) {
                            ?>
                              <tr>
                              <td scope="col"><?= $a->no_tiket?></td>
                              <td scope="col"><?= $a->cost_center?></td>
                              <td scope="col"><?= $a->quantity?></td>
                              <td scope="col"><?= $a->date?></td>
                              <td scope="col"><?= $a->requestor?></td>
                              <td scope="col"><?= $a->deskripsi?></td>
                              <td scope="col">
                                <?php
                                  if ($a->status == 0){
                                    echo "<label class='badge badge-warning'>Pending</label>";
                                  } elseif ($a->status == 1) {
                                    echo "<label class='badge badge-success'>Accept</label>";
                                  } elseif ($a->status == 2) {
                                    echo "<label class='badge badge-danger'>Decline</label>";
                                  }
                                ?>
                              </td>
                              <td scope="col">
                                <div class="text-center">
                                <button type="button" id="btnSave" class="btn btn-primary" value="<?= $a->no_tiket ?>" onClick="ticketing(this.value)"><i class="fas fa-check"></i></button>
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
                  </form>

                </div>
            </div>
        </div>

<script>
    // $('#btnSave').click(function() {
    // var value = $('#btnSave').val();
    // console.log(value);
    // $('#noTicket').val(value);
    // $('#extraLargeModal').modal('hide');
    function ticketing(val) {
      // console.log(val);
      $('#noTicket').val(val);
      $('#extraLargeModal').modal('hide');
    }
  // });
</script>

</body>

</html>
