<?php
mysqli_connect("localhost", "root", "", "ictfacility");


?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
          <img class="img-responsive animated--grow-in" width="240px" height="70px" src="<?= base_url('assets/img/pdsibaru.jpg'); ?>">
        </div>
        </a>

        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Requisition</h1>

      <!-- search -->
      <form action="<?= base_url('Requisition/tambah_aksi'); ?>" method="post" name="my_form">

        <!-- ticket -->
        <div id="ticket_feedback" class="form-group">
          <label for="ticket">Ticket</label>
          <input type="text" class="form-control" id="ticket" name="ticket" maxlength="15" required>
        </div>

        <!-- item -->
        <div class="form-group">
          <label for="item">Item</label>
          <select class="form-control" name="item" id="item">
            <option>Choose</option>
            <option>Handphone</option>
            <option>Handy Talk</option>
            <option>PC Desktop</option>
            <option>Printer</option>
            <option>Proyektor</option>
            <option>Laptop</option>
          </select>
          <i class="form-control-feedback"></i>
          <span class="text-warning"></span>
        </div>


        <!-- cost center -->
        <div class="form-group">
          <label for="costcenter">Cost Center</label>
          <select class="form-control" name="costcenter" id="costcenter">
            <option>Choose</option>
            <option>sample 1</option>
            <option>sample 2</option>
          </select>
          <i class="form-control-feedback"></i>
          <span class="text-warning"></span>
        </div>

        <!-- requestor -->
        <div class="form-group">
          <label for="requestor">Requestor</label>
          <input type="text" class="form-control" name="requestor" id="requestor" required>
        </div>


        <!--date-->
        <div class="form-group">
          <label for="date">Date</label><br />
          <input type="date" name="date" id="date">
          <span class="text-warning"></span>
        </div>

        <!-- status -->
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <option>Choose</option>
            <option>Accept</option>
            <option>Decline</option>
          </select>
          <i class="form-control-feedback"></i>
          <span class="text-warning"></span>
        </div>

        <!-- description -->
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <!-- Quantity -->
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>

        <!-- button submit-->
        <!-- <a href="#" role="button"> -->
        <button type="submit" value="input" class="btn btn-primary">
          Submit
        </button>
        <!-- </a> -->

        <!-- button next-->
        <a href="<?= base_url('Requisition/index') ?>" role="button">
          <button type="button" value="" class="btn btn-danger">
            Cancel
          </button>
        </a>
      </form>

      <hr>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->




  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

  </body>

  </html>

  <script>
    $(document).ready(function() {
      $("#posSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#posTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      var text_max = 15;
      // $('#ticket_feedback').html(text_max + ' characters remaining');

      $('#ticket').keyup(function() {
        var text_length = $('#ticket').val().length;
        // var text_remaining = text_max - text_length;

        // $('#ticket_feedback').html(text_remaining + ' characters remaining');
      });
    });
  </script>