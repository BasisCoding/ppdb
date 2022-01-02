<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Input Mask-->
<script src="<?= site_url('assets/js/plugins/jasny/jasny-bootstrap.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/chosen/chosen.jquery.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/summernote/summernote-bs4.js') ?>"></script>

<!-- <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script> -->
<!-- Page-Level Scripts -->
<script>
    var table;
    $(document).ready(function() {
		$('.deskripsi').summernote({
			codeviewFilter: false,
  			codeviewIframeFilter: true
		});
        $('.chosen-select').chosen({width: "100%"});

        // $('[name="jenis_pekerjaan"]').chosen({no_results_text: 'Save as New'});
        
        // $('#input-pekerjaan > .chosen-container').on('click', '.no-results', function(){
        //    add_new_diagnosis($(this).find('span').text());
        //    $('[name="jenis_pekerjaan"]').val('').trigger('chosen:updated');
        // });
        
        // function add_new_diagnosis(val) {
        //     console.log(`New: ${val}`)
        // }

        var btn_act = '<button class="btn btn-primary" id="btn_add">Tambah Data</button>';
        $('.title-action').html(btn_act);
        table = $('#table-eskul').DataTable({
            "pageLength": 25,
            "dom": '<"html5buttons"B>lTfgtp',
            "buttons": [{
                extend: 'copy'
            },{
                extend: 'csv'
            },{
                extend: 'excel', title: 'ExampleFile'
            },{
                extend: 'pdf', title: 'ExampleFile'
            },{
                extend: 'print', 
                customize: function (win)
                {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ],
            "processing": true, 
            "serverSide": true,
            // "responsive": true,
            "order": [],
            "autoWidth" : true,
            // "scrollX": true,
            // "scrollY": "300px",
			"columnDefs":[
				{
					"targets": 0,
					"className":"text-center",
					"width": "5%"
				}
			],
            "ajax": {
                "url": "<?= base_url('data-eskul/store')?>",
                "type": "POST"
            },

            "language": {
                "search": "",
                "searchPlaceholder": "Search . . .",
                "lengthMenu":"_MENU_",
                "emptyTable":"Tidak ada data",
                "zeroRecords":"Tidak ada data yang sesuai"
            }
        });

        function reload_table() {
            table.ajax.reload(null, false);
        }

    // BTN Action Modal
        $('body').on('click', '#btn_add', function(event) {
            event.preventDefault();
            $('#modal-create').modal('show');
        });

        $('#table-eskul').on('click', '.btn-update', function(event) {
            event.preventDefault();
            $('#modal-update').modal('show');

            get($(this).attr('data-id'));
        });

		$('#table-eskul').on('click', '.btn-view', function(event) {
            event.preventDefault();
            $('#modal-view').modal('show');

            detail($(this).attr('data-id'));
        });

        $('#table-eskul').on('click', '.btn-delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            notification('warning', 'Apakah anda yakin ingin menghapus data ini ? <br>'+
                '<form id="form-delete" role="form" method="POST" enctype="multipart/form-data">'+
                    '<input type="hidden" value="'+id+'" name="id_delete">'+
                    '<button class="btn btn-sm btn-danger m-r-sm" form="form-delete" type="submit">Yes</button>'+
                    '<button class="btn btn-sm btn-secondary" type="button">No</button>'+
                '</form>');
        });

		$('.nama_eskul').on('keyup', function () {
			$('.slug_eskul').val(convertToSlug($(this).val()));
		});

		function convertToSlug(Text)
		{
			return Text
				.toLowerCase()
				.replace(/[^\w ]+/g,'')
				.replace(/ +/g,'-')
				;
		}

        function send(formData, nameAction) {
            $.ajax({
                url: '<?= base_url("data-eskul/") ?>'+nameAction+'',
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
                        if (response.nama_jurusan_update) {
                            notification('error', response.nama_jurusan_update);
                        }

                        if (response.slug_jurusan_update) {
                            notification('error', response.slug_jurusan_update);
                        }

						if (response.nama_jurusan) {
                            notification('error', response.nama_jurusan);
                        }

                        if (response.slug_jurusan) {
                            notification('error', response.slug_jurusan);
                        }
                        
                    } else {
                        notification(response.type, response.message)

                        $('#modal-'+nameAction).modal('hide');
                        $('#form-'+nameAction)[0].reset();
                        reload_table();
                    }

                    // $("#btn-"+nameAction).prop('disabled', false);
                }
            });
        }

		function detail(id) {
            $.ajax({
                url: '<?= base_url('data-eskul/get/') ?>'+id,
                type: 'GET',
                dataType: 'JSON',
                success:function (response) {
					$('#nama_eskul_detail').html(response.nama_eskul);
					$('#slug_eskul_detail').html(response.slug_eskul);
					$('#deskripsi_detail').html(response.deskripsi);
                }
            });
            
            return false;
        }

        function get(id) {
            $.ajax({
                url: '<?= base_url('data-eskul/get/') ?>'+id,
                type: 'GET',
                dataType: 'JSON',
                success:function (response) {
                    $('[name="id_update"]').val(response.id);
                    $('[name="nama_eskul_update"]').val(response.nama_eskul);
                    $('[name="slug_eskul_update"]').val(response.slug_eskul);
					
                    $('[name="deskripsi_update"]').summernote('pasteHTML', $.parseHTML(response.deskripsi));
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
