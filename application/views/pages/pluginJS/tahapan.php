
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

				var todo = $( "#todo" ).sortable( "toArray" );
				var inprogress = $( "#inprogress" ).sortable( "toArray" );
				var completed = $( "#completed" ).sortable( "toArray" );
				$('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
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

        $('#table-gelombang').on('click', '.btn-update', function(event) {
			event.preventDefault();
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            var start_date = $(this).attr('data-start');
            var end_date = $(this).attr('data-end');
			
			$('[name="id_update"]').val(id);
			$('[name="nama_gelombang_update"]').val(nama);
			$('[name="start_date_update"]').val(start_date);
			$('[name="end_date_update"]').val(end_date);
			$('#modal-update').modal('show');
        });

        $('#table-gelombang').on('click', '.btn-delete', function(event) {
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
