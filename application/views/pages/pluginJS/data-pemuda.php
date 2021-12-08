<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Dual Listbox -->
<script src="<?= site_url('assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') ?>"></script>

<script type="text/javascript">
    var table;

    $(document).ready(function() {
        getPenduduk();
        $('#daftar-penduduk').bootstrapDualListbox({
            selectorMinimalHeight: 160,
        });


        table = $('#table-pemuda').DataTable({
            "pageLength": 25,
            "dom": 'lTfgtp',
            // "buttons": [{
            //     extend: 'copy'
            // },{
            //     extend: 'csv'
            // },{
            //     extend: 'excel', title: 'ExampleFile'
            // },{
            //     extend: 'pdf', title: 'ExampleFile'
            // },{
            //     extend: 'print', 
            //     customize: function (win)
            //     {
            //         $(win.document.body).addClass('white-bg');
            //         $(win.document.body).css('font-size', '10px');
            //         $(win.document.body).find('table')
            //         .addClass('compact')
            //         .css('font-size', 'inherit');
            //     }
            // }
            // ],
            "processing": true, 
            "serverSide": true,
            // "responsive": true,
            "order": [],
            "autoWidth" : true,
            "scrollX": true,
            // "scrollY": "300px",
            "ajax": {
                "url": "<?= base_url('data-pemuda/store')?>",
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

        function getPenduduk() {
            var select = $('#daftar-penduduk');
            $.getJSON('<?= base_url('data-pemuda/show-penduduk') ?>', function(json, textStatus) {
                $.each(json, function(i, val) {
                    var id = val.id;
                    var nama = val.nama_lengkap;
                    select.append('<option class="h6" value="'+id+'">'+nama+'</option>');
                });
            });

            select.trigger('bootstrapduallistbox.refresh', true);
        }
        
    });
</script>