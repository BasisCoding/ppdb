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
        $('.chosen-select').chosen({width: "100%"});
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
        });

        $('#table-penduduk').on('click', '.btn-update', function(event) {
            event.preventDefault();
            $('#modal-update').modal('show');

            get($(this).attr('data-id'));

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
                        if (response.nik_update != "") {
                            notification('error', response.nik_update);
                        }
                        if (response.nama_lengkap_update != "") {
                            notification('error', response.nama_lengkap_update);
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
                    $('[name="username_update"]').val(response.username);
                    $('[name="nik_update"]').val(response.nik);
                    $('[name="nama_lengkap_update"]').val(response.nama_lengkap);
                    $('[name="tempat_lahir_update"]').val(response.tempat_lahir);
                    $('[name="tanggal_lahir_update"]').val(response.tanggal_lahir);
                    $('[name="jenis_kelamin_update"]').val(response.jenis_kelamin).trigger('chosen:updated');
                    $('[name="agama_update"]').val(response.agama).trigger('chosen:updated');
                    $('[name="status_hidup_update"]').val(response.status_hidup).trigger('chosen:updated');
                    $('[name="status_pernikahan_update"]').val(response.status_pernikahan).trigger('chosen:updated');
                }
            });
            
            return false;
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
        
    });

</script>