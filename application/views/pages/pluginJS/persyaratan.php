<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Input Mask-->
<script src="<?= site_url('assets/js/plugins/jasny/jasny-bootstrap.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/chosen/chosen.jquery.js') ?>"></script>
<!-- <script src="<?= site_url('assets/js/plugins/summernote/summernote-bs4.js') ?>"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script> -->
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
		get();
		$('.deskripsi').summernote({
			// codeviewFilter: false,
  			// codeviewIframeFilter: true
		});
		
		var btn_act = '<button class="btn btn-primary" id="btn_update" form="form-update">Update</button>';
        $('.title-action').html(btn_act);

        function send(formData, nameAction) {
            $.ajax({
                url: '<?= base_url("persyaratan/") ?>'+nameAction+'',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                processData: false,
                contentType: false,
                // beforeSend: function()
                // { 
                //     // $("#btn-"+nameAction).prop('disabled', true);
                // },
                success:function (response) {
                    if (response.type == 'val_error') {

                        if (response.deskripsi) {
                            notification('error', response.deskripsi);
                        }
                        
                    } else {
                        notification(response.type, response.message)
                    }

                    // $("#btn-"+nameAction).prop('disabled', false);
                }
            });
        }

        function get() {
            $.ajax({
                url: '<?= base_url('persyaratan/get/') ?>',
                type: 'POST',
                dataType: 'JSON',
                success:function (response) {
                    $('[name="id"]').val(response.id);
					// $('.deskripsi').summernote('destroy');
                    $('[name="deskripsi"]').summernote('code', $.parseHTML(response.deskripsi)[0].data);
                    // $('[name="deskripsi_update"]').summernote('pasteHTML', $.parseHTML(response.deskripsi));
					// console.log(response);
                }
            });
            return false;
        }


    // Submit Form Persyaratan
        $(document).on('submit', '#form-update', function() {
            var formData = new FormData(this);
            send(formData, 'update');

            return false;
        });
    });

</script>
