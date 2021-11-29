 <script src="<?= site_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
 <script src="<?= site_url('assets/js/popper.min.js') ?>"></script>
 <script src="<?= site_url('assets/js/bootstrap.js') ?>"></script>
 <!-- Toastr script -->
 <script src="<?= site_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>
 <!-- Ladda -->
 <script src="<?= site_url('assets/js/plugins/ladda/spin.min.js') ?>"></script>
 <script src="<?= site_url('assets/js/plugins/ladda/ladda.min.js') ?>"></script>
 <script src="<?= site_url('assets/js/plugins/ladda/ladda.jquery.min.js') ?>"></script>

 <script>
    $(function() {
        var loading = $( '.ladda-button' ).ladda();

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

    });
    

    
</script>
<?php $this->load->view('pages/pluginJS'.$js) ?>


