<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Input Mask-->
<script src="<?= site_url('assets/js/plugins/jasny/jasny-bootstrap.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/chosen/chosen.jquery.js') ?>"></script>
<!-- <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script> -->
<!-- Page-Level Scripts -->
<script>
    var table;
    $(document).ready(function() {
        jenis_pekerjaan();

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
        table = $('#table-penduduk').DataTable({
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
            "scrollX": true,
            // "scrollY": "300px",
            "ajax": {
                "url": "<?= base_url('data-penduduk/store')?>",
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

            $('[name="username"]').prop('readonly', false);
            $('[name="nik"]').prop('readonly', false);
            $('[name="password"]').prop('readonly', false);
        });

        $('#table-penduduk').on('click', '.btn-update', function(event) {
            event.preventDefault();
            $('#modal-update').modal('show');

            get($(this).attr('data-id'));
        });

        $('#table-penduduk').on('click', '.btn-delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            notification('warning', 'Apakah anda yakin ingin menghapus data ini ? <br>'+
                '<form id="form-delete" role="form" method="POST" enctype="multipart/form-data">'+
                    '<input type="hidden" value="'+id+'" name="user_id">'+
                    '<button class="btn btn-sm btn-danger m-r-sm" form="form-delete" type="submit">Yes</button>'+
                    '<button class="btn btn-sm btn-secondary" type="button">No</button>'+
                '</form>');
        });


        $('body').on('change', '[name="username_default"]', function(event) {
            event.preventDefault();
            if ($('[name="username_default"]').is(":checked")) {
                $('[name="username"]').prop('readonly', true);
            }else{
                $('[name="username"]').prop('readonly', false);
            }
        });

         $('body').on('change', '[name="password_default"]', function(event) {
            event.preventDefault();
            if ($('[name="password_default"]').is(":checked")) {
                $('[name="password"]').prop('readonly', true);
            }else{
                $('[name="password"]').prop('readonly', false);
            }
        });

        $('body').on('change', '[name="username_lama"]', function(event) {
            event.preventDefault();
            if ($('[name="username_lama"]').is(":checked")) {
                $('[name="username_update"]').prop('readonly', true);
            }else{
                $('[name="username_update"]').prop('readonly', false);
            }
        });

         $('body').on('change', '[name="nik_lama"]', function(event) {
            event.preventDefault();
            if ($('[name="nik_lama"]').is(":checked")) {
                $('[name="nik_update"]').prop('readonly', true);
            }else{
                $('[name="nik_update"]').prop('readonly', false);
            }
        });

        function send(formData, nameAction) {
            $.ajax({
                url: '<?= base_url("data-penduduk/") ?>'+nameAction+'',
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
                        if (response.nik_update) {
                            notification('error', response.nik_update);
                        }

                        if (response.nama_lengkap_update) {
                            notification('error', response.nama_lengkap_update);
                        }

                        if (response.username_update) {
                            notification('error', response.username_update);
                        }


                        if (response.username) {
                            notification('error', response.username);
                        }

                        if (response.nama_lengkap) {
                            notification('error', response.nama_lengkap);
                        }
                        
                        if (response.tanggal_lahir) {
                            notification('error', response.tanggal_lahir);
                        }

                        if (response.password) {
                            notification('error', response.password);
                        }

                        if (response.nik) {
                            notification('error', response.nik);
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

        function get(id) {
            $.ajax({
                url: '<?= base_url('data-penduduk/get/') ?>'+id,
                type: 'GET',
                dataType: 'JSON',
                success:function (response) {
                    $('[name="id"]').val(response.id);
                    $('[name="user_id"]').val(response.user_id);
                    $('[name="username_update"]').val(response.username);
                    $('[name="nik_update"]').val(response.nik);
                    $('[name="nama_lengkap_update"]').val(response.nama_lengkap);
                    $('[name="tempat_lahir_update"]').val(response.tempat_lahir);
                    $('[name="tanggal_lahir_update"]').val(response.tanggal_lahir);
                    $('[name="pekerjaan_update"]').val(response.pekerjaan_id).trigger('chosen:updated');
                    $('[name="pendidikan_update"]').val(response.pendidikan).trigger('chosen:updated');
                    $('[name="jenis_kelamin_update"]').val(response.jenis_kelamin).trigger('chosen:updated');
                    $('[name="agama_update"]').val(response.agama).trigger('chosen:updated');
                    $('[name="status_hidup_update"]').val(response.status_hidup).trigger('chosen:updated');
                    $('[name="status_perkawinan_update"]').val(response.status_perkawinan).trigger('chosen:updated');

                    $('[name="nik_lama"]').prop('checked', true).trigger('change');
                    $('[name="username_lama"]').prop('checked', true).trigger('change');
                }
            });
            
            return false;
        }

        function jenis_pekerjaan() {
            $.getJSON('<?= base_url('getPekerjaan/json') ?>', function(json, textStatus) {
                var jenis_pekerjaan = $('.chosen-select-pekerjaan');
                jenis_pekerjaan.empty();
                $.each(json, function(i, jp) {
                    var id = jp.id;
                    var name = jp.name;
                    jenis_pekerjaan.append('<option value="'+id+'">'+name+'</option>');
                });

                jenis_pekerjaan.trigger("chosen:updated"); 
            });
        }

        // Submit Form Tambah Penduduk
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