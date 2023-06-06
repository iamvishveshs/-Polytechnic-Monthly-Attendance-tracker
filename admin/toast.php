<?php
if (isset($_REQUEST['alert'])) {
  ?>

  <div class="toast" style="position: absolute; top: 5%; right: 0; ">
    <div class="toast-header">
      <strong class="mr-auto">Notification</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body bg-success text-white">
      <?php echo $_REQUEST['alert'] ?>

    </div>
  </div>


  <script>
    $(document).ready(function () {
      $('.toast').toast({ delay: 5000 });
      $('.toast').toast('show');
    });
  </script>
  <?php
}
?>