<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Dual Listbox -->
<script src="<?= site_url('assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') ?>"></script>

<script type="text/javascript">
    var table;

    $(document).ready(function() {
        $('.dual_select').bootstrapDualListbox({
            selectorMinimalHeight: 160
        });

        table = $('#table-pemuda').DataTable({
            "pageLength": 25,
            "dom": 'f',
        
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
        
    });
</script>