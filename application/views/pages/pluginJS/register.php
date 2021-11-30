<script>
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
                        if (response.nama_lengkap != "") {
                            notification('error', response.nama_lengkap);
                        }
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
