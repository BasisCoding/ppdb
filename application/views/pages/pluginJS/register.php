<!-- Ladda -->
<script src="<?= site_url('assets/js/plugins/ladda/spin.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/ladda/ladda.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/ladda/ladda.jquery.min.js') ?>"></script>

<script type="text/javascript">
    var loading = $( '.ladda-button' ).ladda();

    $(document).ready(function() {

        $('#form-register').on('submit', function() {

            $.ajax({
                url: '<?= base_url('register/process') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                beforeSend:function () {
                    loading.ladda('start');
                },
                success: function(response) {
                    loading.ladda('stop');

                    if (response.type == 'val_error') {
                        if (response.username != "") {
                            notification('error', response.username);
                        }
                        if (response.email != "") {
                            notification('error', response.email);
                        }
                        if (response.password != "") {
                            notification('error', response.password);
                        }
                        if (response.password_confirm != "") {
                            notification('error', response.password_confirm);
                        }
                    } else {
                        notification(response.type, response.message)

                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1500);
                    }
                }
            });

            return false;
        });
    });
    
</script>
