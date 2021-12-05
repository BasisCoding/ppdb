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
            "buttons": [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
            customize: function (win){
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
        "responsive": true,
        "order": [],
        "autoWidth" : true,

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

        $('body').on('click', '#btn_add', function(event) {
            event.preventDefault();
            $('#modal-create').modal('show');
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
                beforeSend: function()
                { 
                    // $("#btn-"+nameAction).prop('disabled', true);
                },
                success:function (response) {
                    if (response.type == 'val_error') {
                        if (response.username != "") {
                            notification('error', response.username);
                        }
                        if (response.nik != "") {
                            notification('error', response.nik);
                        }
                        if (response.password != "") {
                            notification('error', response.password);
                        }
                        if (response.nama_lengkap != "") {
                            notification('error', response.nama_lengkap);
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

        $(document).on('submit', '#form-create', function() {
            var formData = new FormData(this);
            send(formData, 'create');

            return false;
        });
        
    });

</script>