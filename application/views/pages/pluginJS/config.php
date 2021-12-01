<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<!-- Chosen -->
<script src="<?= site_url('assets/js/plugins/chosen/chosen.jquery.js') ?>"></script>
<script type="text/javascript">
    var btn_act = '<button class="btn btn-primary">Update Konfigurasi</button>';
    $('.title-action').html(btn_act);
    $('.chosen-select').chosen({width: "100%"});
    // Register any plugins

    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Wilayah 
    load_pro(0);
    function load_pro(id,op) {
      
        if(op){
            var $op = op;
        } else {
            var $op = $("#prov"); 
        }      
    

        $.getJSON("wilayah/"+id, function(data){      
            $.each(data, function(i,field){  
                
                $op.append('<option value="'+field.id+'">'+field.name+'</option>'); 

            });
            
        });
    }

    $(document).ready(function() {

        FilePond.create(document.querySelector('[name="logo"]'), {
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            
            fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // test if is xls file
                if (/\.xls$/.test(source.name)) return resolve('application/vnd.ms-excel');

                // accept detected type
                resolve(type);
            }),
        });

        FilePond.create(document.querySelector('[name="icon"]'), {
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            
            fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // test if is xls file
                if (/\.xls$/.test(source.name)) return resolve('application/vnd.ms-excel');

                // accept detected type
                resolve(type);
            }),
        });

        $("#prov").on("change", function(e){
            $('#kota option:gt(0)').remove();
            var op = $("#kota");
            e.preventDefault();
            var id = $('option:selected', this).val();  
            load_pro(id,op);
        });

        $("#kota").on("change", function(e){
            $('#kec option:gt(0)').remove();
            var op = $("#kec");
            e.preventDefault();
            var id = $('option:selected', this).val();  
            load_pro(id,op);
        });

        $("#kec").on("change", function(e){
            $('#kel option:gt(0)').remove();
            var op = $("#kel");
            e.preventDefault();
            var id = $('option:selected', this).val();  
            load_pro(id,op);
        });

    });

</script>