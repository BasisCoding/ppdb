<script src="<?= site_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page-Level Scripts -->
<script>
    var table;
    $(document).ready(function() {
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
            // "scrollX": true,
            // "fixedColumns": {
            //   "leftColumns": 1,
            //   "rightColumns": 2
            // },
            "responsive": true,
            // "lengthChange": false,
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
            }
        });

        function reload_table() {
            table.ajax.reload(null, false);
        }

    });

</script>