
<!-- Touch Punch - Touch Event Support for jQuery UI -->
<script src="<?= site_url('assets/js/plugins/touchpunch/jquery.ui.touch-punch.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script> -->
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {

		var btn_act = '<button class="btn btn-primary" id="btn_add">Tambah Data</button>';
        $('.title-action').html(btn_act);

		get();
		$('.deskripsi').summernote({
			// codeviewFilter: false,
  			// codeviewIframeFilter: true
		});

		$("#list-tahapan").sortable({
			connectWith: ".connectList",
			update: function( event, ui ) {
				
			}
		}).disableSelection();

        function get() {
			var sect = $('#list-tahapan');

			$.ajax({
				type: "POST",
				url: "<?= base_url('tahapan/store') ?>",
				dataType: "HTML",
				success: function (data) {
					sect.html(data);
				}

			});

			return false;
		}

    // BTN Action Modal
        $('body').on('click', '#btn_add', function(event) {
            event.preventDefault();
            $('#modal-create').modal('show');

			$('[name="tahun_ajaran_id"]').val($('#_tahun').attr('data-tahun'));
        });

        $('#list-tahapan').on('click', '.btn-update', function(event) {
            event.preventDefault();
            $('#modal-update').modal('show');

            getID($(this).attr('data-id'));
        });

        $('#list-tahapan').on('click', '.btn-delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            notification('warning', 'Apakah anda yakin ingin menghapus data ini ? <br>'+
                '<form id="form-delete" role="form" method="POST" enctype="multipart/form-data">'+
                    '<input type="hidden" value="'+id+'" name="id_delete">'+
                    '<button class="btn btn-sm btn-danger m-r-sm" form="form-delete" type="submit">Yes</button>'+
                    '<button class="btn btn-sm btn-secondary" type="button">No</button>'+
                '</form>');
        });

        function send(formData, nameAction) {
            $.ajax({
                url: '<?= base_url("tahapan/") ?>'+nameAction+'',
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
                        if (response.judul) {
                            notification('error', response.judul);
                        }

						if (response.deskripsi) {
                            notification('error', response.deskripsi);
                        }

						if (response.sequence) {
                            notification('error', response.sequence);
                        }
                        
                    } else {
                        notification(response.type, response.message)

                        $('#modal-'+nameAction).modal('hide');
                        $('#form-'+nameAction)[0].reset();
                        get();
                    }

                    // $("#btn-"+nameAction).prop('disabled', false);
                }
            });
        }

		function getID(id) {
            $.ajax({
                url: '<?= base_url('tahapan/get/') ?>'+id,
                type: 'GET',
                dataType: 'JSON',
                success:function (response) {
                    $('[name="id_update"]').val(response.id);
                    $('[name="judul_update"]').val(response.judul);

					$('.deskripsi').summernote('destroy');
                    $('[name="deskripsi_update"]').summernote('code', $.parseHTML(response.deskripsi)[0].data);
                    // $('[name="deskripsi_update"]').summernote('pasteHTML', $.parseHTML(response.deskripsi));
                }
            });
            
            return false;
        }

    // Submit Form Tambah Jurusan
        $(document).on('submit', '#form-create', function() {
            var formData = new FormData(this);
            send(formData, 'create');

            return false;
        });

        $(document).on('submit', '#form-update', function() {
            var formData = new FormData(this);
            send(formData, 'update');

            return false;
        });

        $(document).on('submit', '#form-delete', function() {
            var formData = new FormData(this);
            send(formData, 'delete');

            return false;
        });
        
    });

</script>
