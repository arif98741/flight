
<div class="container-fluid">
  <div class="row mt-3">
    <div class="col-md-12">
      <p class="text-center">Copyright 2019</p>
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="<?php echo base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();

          setTimeout(function(){
            $('#message').slideUp(400);
          },4000);
        } );
      </script>
    </body>
    </html>
