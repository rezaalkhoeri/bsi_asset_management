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
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
          </div>
          <?php 
          foreach ($get as $a) { ?>
          <div class="" id="edit<?php echo $a->id ?>">
          <form action="<?= base_url('Users/update/'.$a->id);?>" method="post" name="my_form">
            <!-- Modal body -->
            <div class="modal-body">
                <!-- name -->
                <div id="ticket_feedback" class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $a->name ?>" required>
                </div>

                <!-- email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <textarea class="form-control" name="email" id="email" rows="3"><?php echo $a->email ?></textarea>
                </div>

                <!-- button update -->
                <button type="add" value="input" class="btn btn-primary"> Update</button>

                <!-- button back -->
                <a href="<?= base_url('Users/index')?>" role="button">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button></a>
            </div>
        </form>
        </div>
        <?php } ?>
          <div class="card-body">
            <div class="table-responsive">
            </div>
          </div>
        </div>

        <!-- /.container-fluid -->

        </div>
      <!-- End of Main Content -->


      </div>

      <?php $this->load->view('partial/script');?>

      <?php $this->load->view('partial/footer'); ?>


    </div>

</body>

</html>