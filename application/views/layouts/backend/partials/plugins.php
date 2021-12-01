   
<!-- Mainly scripts -->
<script src="<?= site_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= site_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= site_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?= site_url('assets/js/inspinia.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

<!-- Toastr script -->
<script src="<?= site_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>

<script>
    var active = '<?= $this->uri->segment(1) ?>';
    $('[data-name="'+active+'"]').addClass('active');

    var sub = $('[data-name="'+active+'"]').attr('data-type');
    if (sub == 'sub') {
        $('[data-name="'+active+'"]').addClass('active in');
    }

    function notification(type, message) {

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "preventDuplicates": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      }

      toastr[type](message);
  }

</script>

<?php $this->load->view('pages/pluginJS/'.$js) ?>

</body>
</html>
